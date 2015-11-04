<?php

use Illuminate\Filesystem\Filesystem;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class DonativoController extends BaseController{


    private $_api_context;
    private $_ClientId='AQe9z3SXB_oTk2KwMI204QyZ7FZtaZKGP-l4V6z5zwYemBH5CHjskoRcwkuQnnWjdjS1VG_PLNvOAMIj';
    private $_ClientSecret='EN2swwMeiaj2HUr2Z6Fx8K0RoKRE4Du95xqqXhsWb3m1Bo0Zqvsu7rx6sFJcIbWURcd-Fz0M5snT2hpb';

    public function __construct()
    {
        $this->_api_context = new ApiContext(new OAuthTokenCredential($this->_ClientId, $this->_ClientSecret));
        $this->_api_context->setConfig(array(
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => __DIR__.'/../PayPal.log',
            'log.LogLevel' => 'FINE'
        ));

    }



    public function dontativoCreate()
    {
        // Declare the rules for the form validation
        $rules = array(
            'cantidad'   => 'required',

        );
        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success

        if ($validator->passes())
        {
            $donativo = new Donativo();
            $user = Auth::user();
            $hermano = Hermano::where('user_id','=',$user->id)->first();

            $donativo->cantidad            = substr(Input::get('cantidad'),0,-4);
            $donativo->observaciones       = Input::get('observaciones');
            $donativo->hermano_id          = $hermano->id;

            $concepto = "Donativo de parte de ".$hermano->nombre." ".$hermano->apellidos;
            $cuota = $donativo->cantidad;

            // ### Payer
            // A resource representing a Payer that funds a payment
            // Use the List of `FundingInstrument` and the Payment Method
            // as 'credit_card'

            $payer = new Payer();
            $payer->setPaymentMethod("paypal");

            $item1 = new Item();
            $item1->setName('Pago donativo Hermano')
                ->setDescription($concepto)
                ->setCurrency('EUR')
                ->setQuantity(1)
                ->setPrice($cuota);


            $itemList = new ItemList();
            $itemList->setItems(array($item1));


            $details = new Details();
            $details->setShipping("0")
                //total of items prices
                ->setSubtotal(''.$cuota);

            //Payment Amount
            $amount = new Amount();
            $amount->setCurrency("EUR")
                // the total is $17.8 = (16 + 0.6) * 1 ( of quantity) + 1.2 ( of Shipping).
                ->setTotal($cuota)
                ->setDetails($details);

            // ### Transaction
            // A transaction defines the contract of a
            // payment - what is the payment for and who
            // is fulfilling it. Transaction is created with
            // a `Payee` and `Amount` types

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription("Pago donativo Hermano")
                ->setInvoiceNumber(uniqid());


            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl(URL::to('gestionhdad/donativo/pagarDonativo'))
                ->setCancelUrl(URL::to('gestionhdad/donativo'));

            // ### Payment
            // A Payment Resource; create one using
            // the above types and intent as 'sale'

            $payment = new Payment();

            $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));

            try {
                $payment->create($this->_api_context);
            } catch (\PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    echo "Exception: " . $ex->getMessage() . PHP_EOL;
                    $err_data = json_decode($ex->getData(), true);
                    exit;
                } else {
                    die('Some error occur, sorry for inconvenient');
                }
            }

            foreach($payment->getLinks() as $link) {
                if($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }

            // add payment ID to session
            Session::put('paypal_payment_id', $payment->getId());
            Session::put('donativo', $donativo);

            if(isset($redirect_url)) {
                // redirect to paypal
                return Redirect::away($redirect_url);
            }

            return View::make('site/donativo')->with('error', 'Error desconocido, perdone las molestias.');


            // Was the entrada post created?

        }

        // Form validation failed
        return Redirect::to('gestionhdad/donativo')->withInput()->withErrors($validator);
    }



    public function pagarDonativo()
    {

        $payment_id = Session::get('paypal_payment_id');
        $donativo = Session::get('donativo');

        // clear the session payment ID
        Session::forget('paypal_payment_id');
        Session::forget('donativo');

        $payerId=Input::get('PayerID');
        $token=Input::get('token');
        if (empty($payerId) || empty($token)) {
            return View::make('site/donativo')
                ->with('error', 'Error en el pago');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        // PaymentExecution object includes information necessary
        // to execute a PayPal account payment.
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);

        //echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

        if ($result->getState() == 'approved') { // payment made


           $donativo->save();

            return View::make('site/donativo')
                ->with('success', 'Donativo realizado correctamente');


        }
        return View::make('site/donativo')->with('error', 'Error en el pago');

    }




}