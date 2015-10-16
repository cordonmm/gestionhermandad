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

class AdminRecibosController extends BaseController{

    private $_api_context;
    private $_ClientId='Aa0BtroJLEGpokG2qdAlvgYATyKXBnqrNKoCzKQtlAYJalzuHLvYu0EV4Uh_a0iDBop5gCK3fsg4L2_u';
    private $_ClientSecret='EENTy6-RE7R_c3_JNKGx-nUuPc2IqWedG4Nu0Awc_6tzrDXyrUk8OKyembHQsmTwxB3NjM3IhyhQgnTN';

    protected $recibo;


    public function __construct(Recibo $recibo)
    {
        $this->recibo = $recibo;
        $this->_api_context = new ApiContext(new OAuthTokenCredential($this->_ClientId, $this->_ClientSecret));
        $this->_api_context->setConfig(array(
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => __DIR__.'/../PayPal.log',
            'log.LogLevel' => 'FINE'
        ));
    }


    public function getPayRecibo()
    {



            $user = Auth::user();
            $hermano = Hermano::where('user_id','=',$user->id)->first();
            $fechapago = $hermano->pagado_hasta;


            if((date('Y') - date('Y',strtotime($hermano->fecha_nacimiento))) > 18){
                $cuota = Confighdad::first()->cuota;

            }else{
                $cuota = Confighdad::first()->cuota_menor;
            }
            $concepto = "";

            switch($hermano->tipo_pago){
                case "anual":

                    $concepto = 'Cuota año '.(date('Y')+1-$hermano->recibospendientes());

                    break;
                case "semestral":
                    $concepto =  (($hermano->recibospendientes()%2) + 1) .'º semestre del año '. (date('Y')+1-($hermano->recibospendientes()/2));
                    $cuota = number_format($cuota/2,2,'.',',');
                    break;
                case "trimestral":
                    $concepto =  ($hermano->recibospendientes()%4) + 1 .'º trimestre del año '. date('Y')+1-($hermano->recibospendientes()/4);
                    $cuota = number_format($cuota/4,2,'.',',');
                    break;
                case "mensual":
                    $concepto =  ($hermano->recibospendientes()%12) + 1 .'º mes del año '. date('Y')+1-($hermano->recibospendientes()/12);
                    $cuota = number_format($cuota/12,2,'.',',');
                    break;
            }
            // ### Payer
            // A resource representing a Payer that funds a payment
            // Use the List of `FundingInstrument` and the Payment Method
            // as 'credit_card'

            $payer = new Payer();
            $payer->setPaymentMethod("paypal");

            $item1 = new Item();
            $item1->setName('Pago cuota Hermano')
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
                ->setDescription("Pago cuota Hermano")
                ->setInvoiceNumber(uniqid());


            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl(URL::to('gestionhdad/hermano/crearRecibo'))
                ->setCancelUrl(URL::to('gestionhdad/misrecibos'));

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

            if(isset($redirect_url)) {
                // redirect to paypal
                return Redirect::away($redirect_url);
            }

            return View::make('site/misrecibos')->with('error', 'Unknown error occurred');


    }

    public function crearRecibo()
    {
        // Get the payment ID before session clear
        $payment_id = Session::get('paypal_payment_id');

        // clear the session payment ID
        Session::forget('paypal_payment_id');

        $payerId=Input::get('PayerID');
        $token=Input::get('token');
        if (empty($payerId) || empty($token)) {
            return View::make('site/misrecibos')
                ->with('error', 'Payment failed');
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


           $recibo = new Recibo();

            $user = Auth::user();
            $hermano = Hermano::where('user_id','=',$user->id)->first();



            if((date('Y') - date('Y',strtotime($hermano->fecha_nacimiento))) > 18){
                $cuota = Confighdad::first()->cuota;

            }else{
                $cuota = Confighdad::first()->cuota_menor;
            }
            $concepto = "";

            switch($hermano->tipo_pago){
                case "anual":

                    $año = date('Y')+1-ceil($hermano->recibospendientes());
                    $pagado = date('Y-m-d',strtotime($año.'-12-31'));
                    $concepto = 'Cuota año '.(date('Y')+1-$hermano->recibospendientes());

                    break;
                case "semestral":
                    $semestre= ($hermano->recibospendientes()%2) + 1;
                    $año = date('Y')+1-ceil($hermano->recibospendientes()/2);
                    $aux = $año.'-'.($semestre*6).'-28';

                    $pagado = date('Y-m-d', strtotime($aux));
                    $concepto =  $semestre.'º semestre del año '.$año;
                    $cuota = number_format($cuota/2,2,'.',',');
                    break;
                case "trimestral":
                    $trimestre = ($hermano->recibospendientes()%4) + 1;
                    $año = date('Y')+1-ceil($hermano->recibospendientes()/4);
                    $pagado = date('Y-m-d',strtotime($año.'-'.($trimestre*3).'-28'));
                    $concepto =  $trimestre.'º trimestre del año '. $año;
                    $cuota = number_format($cuota/4,2,'.',',');
                    break;
                case "mensual":
                    $mes = ($hermano->recibospendientes()%12) + 1;
                    $año = date('Y')+1-ceil($hermano->recibospendientes()/12);
                    $pagado = date('Y-m-d',strtotime($año.'-'.$mes.'-28'));
                    $concepto =  $mes .'º mes del año '. $año;
                    $cuota = number_format($cuota/12,2,'.',',');
                    break;
            }
                $recibo->concepto= $concepto;
                $recibo->fecha_cobro = date('Y-m-d');
                $recibo->total = $cuota;
                $recibo->hermano_id = $hermano->id;
                $recibo->save();
                $hermano->pagado_hasta = $pagado;
                $hermano->save();

                return View::make('site/misrecibos')
                    ->with('success', 'Email sent successfully');


        }
        return View::make('site/misrecibos')->with('error', 'Payment failed');

    }
    /*public function getFicha($hermano)
    {
        return View::make('site/admin/ficha', compact('hermano'));
    }

    public function hermanoEdit($hermano)
    {
        $rules = array(
            'nombre'             => 'required|min:3',
            'apellidos'          => 'required|min:3',
            'fecha_nacimiento'   => 'required|min:3',
            'ccc'                => 'max:20',
            'tlf_fijo'           => 'numeric|max:999999999',
            'tlf_movil'          => 'numeric|max:999999999',
            'email'              => 'required|email',
            'direccion'          => 'required|min:3',
            'poblacion'          => 'required|min:3',
            'cp'                 => 'required|numeric|max:99999',
            'provincia'          => 'required|min:3',
            'password'           => 'required|min:3',
        );
        // Validate the inputs

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {
            $user = User::find($hermano->user_id);
            // Update the entrada post data

            $hermano->nombre            = Input::get('nombre');
            $hermano->apellidos         = Input::get('apellidos');
            $hermano->fecha_nacimiento  = Input::get('fecha_nacimiento');
            $hermano->ccc               = Input::get('ccc');
            $hermano->tlf_fijo          = Input::get('tlf_fijo');
            $hermano->tlf_movil         = Input::get('tlf_movil');
            $user->email                = Input::get('email');
            $hermano->direccion         = Input::get('direccion');
            $hermano->poblacion         = Input::get('poblacion');
            $hermano->cp                = Input::get('cp');
            $hermano->provincia         = Input::get('provincia');
            $user->password             = Input::get('password');
            $hermano->observaciones     = Input::get('observaciones');


            // Was the entrada post updated?
            DB::beginTransaction();

            if($hermano->save())
            {
                if($user->save())
                {
                    DB::commit();
                    return Redirect::to('gestionhdad/hermanos/' . $hermano->id . '/ficha')->with('success', 'Datos modificados correctamente');
                }else{
                    DB::rollback();
                }
            }

            // Redirect to the entradas post management page
            return Redirect::to('gestionhdad/hermanos/' . $hermano->id . '/ficha')->with('error', 'Error');
        }

        // Form validation failed
        return Redirect::to('gestionhdad/hermanos/' . $hermano->id . '/ficha')->withInput()->withErrors($validator);

    }*/

}