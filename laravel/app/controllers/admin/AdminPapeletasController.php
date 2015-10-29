<?php

use Illuminate\Filesystem\Filesystem;

class AdminPapeletasController extends BaseController{

    protected $papeleta;
    private $_api_context;
    private $_ClientId='AQe9z3SXB_oTk2KwMI204QyZ7FZtaZKGP-l4V6z5zwYemBH5CHjskoRcwkuQnnWjdjS1VG_PLNvOAMIj';
    private $_ClientSecret='EN2swwMeiaj2HUr2Z6Fx8K0RoKRE4Du95xqqXhsWb3m1Bo0Zqvsu7rx6sFJcIbWURcd-Fz0M5snT2hpb';

    public function __construct(Papeleta $papeleta)
    {
        $this->papeleta = $papeleta;
    }

    public function cancelarPapeleta($papeleta_id)
    {
        $papeleta = Papeleta::find($papeleta_id);

        $papeleta->delete();

        return Redirect::to('gestionhdad/listado-papeletas')->with('success', 'Papeleta eliminada correctamente');
    }

    public function marcarPapeletaRecogida($papeleta_id)
    {
        $papeleta = Papeleta::find($papeleta_id);

        $papeleta->recogida = 1;

        if($papeleta->save())
        {
            return Redirect::to('gestionhdad/listado-papeletas')->with('success', 'Marcada como recogida corregida correctamente');
        }
    }

    public function desmarcarPapeletaRecogida($papeleta_id)
    {
        $papeleta = Papeleta::find($papeleta_id);

        $papeleta->recogida = 0;

        if($papeleta->save())
        {
            return Redirect::to('gestionhdad/listado-papeletas')->with('success', 'Marcada como recogida corregida correctamente');
        }
    }

    public function papeletaCreate()
    {
        $fecha_inicio_papeletas = Confighdad::first()->fecha_inicio_papeletas;
        $fecha_fin_papeletas = Confighdad::first()->fecha_fin_papeletas;
        $hoy = date('Y-m-d');
        if($hoy >= $fecha_inicio_papeletas and $fecha_fin_papeletas >= $hoy){
            if(Auth::user()->hasRole('admin')){
                $hermanos = Hermano::where('activo','=',1)->get();
                $papeleta = new Papeleta();
                return View::make('site/papeleta', compact('hermanos','papeleta'));
            }
            if(Auth::user()->hasRole('user')){

                $hermano = Hermano::where('user_id','=',Auth::user()->id)->first();
                $papeleta = Papeleta::where('fecha_solicitud','>=',$fecha_inicio_papeletas)->where('fecha_solicitud','<=',$fecha_fin_papeletas)->where('hermano_id','=',$hermano->id)->first();
                if(!isset($papeleta)){
                    $papeleta = new Papeleta();
                    return View::make('site/papeleta', compact('papeleta'));
                }else{
                    if($papeleta->tipo->descripcion == 'Cirio'){
                        $mensaje = ' portando cirio.';
                    }
                    elseif($papeleta->tipo->descripcion == 'Insignia'){
                        $mensaje = ' portando '. $papeleta->insignia->nombre. '.' ;
                    }
                    else{
                        $mensaje = 'como '.$papeleta->tipo->descripcion. '.';
                    }
                    return Redirect::to('/gestionhdad/inicio')->with('info','D/Dña. '.$hermano->nombre.' '.$hermano->apellidos.' solicitó su papeleta de sitio el '.date('d-m-Y',strtotime($papeleta->fecha_solicitud)).$mensaje);

                }

            }
        }else{
            return Redirect::to('/gestionhdad/inicio')->with('error', 'No está permitido solicitar papelestas de sitio hasta el '.date('d-m-Y',strtotime($fecha_inicio_papeletas)));
        }

    }

    public function postCreate()

    {

        // Declare the rules for the form validation

        $rules = array(

            'tipos_papeleta'   => 'exists:tipos_papeleta,id',
            'paso' => 'exists:pasos,id',


        );



        // Validate the inputs

        $validator = Validator::make(Input::all(), $rules);



        // Check if the form validates with success

        if ($validator->passes())

        {

            // Create a new entrada post
            $fecha_inicio_papeletas = Confighdad::first()->fecha_inicio_papeletas;
            $fecha_fin_papeletas = Confighdad::first()->fecha_fin_papeletas;
            $hermano = Hermano::where('user_id','=',Auth::user()->id)->first();
            $papeleta = Papeleta::where('fecha_solicitud','>=',$fecha_inicio_papeletas)->where('fecha_solicitud','<=',$fecha_fin_papeletas)->where('hermano_id','=',$hermano->id)->first();
            if(!isset($papeleta)){
                $papeleta = new Papeleta();
            }

            if(is_numeric(Input::get('donativo')) and Input::get('donativo') != 0){
                $papeleta->donativo           = Input::get('donativo');
                $payer = new Payer();
                $payer->setPaymentMethod("paypal");

                $item1 = new Item();
                $item1->setName('Donativo')
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

            // Update the entrada post data
            $papeleta->hermano_id         = Hermano::where('user_id','=',Auth::user()->id)->first()->id;
            $papeleta->paso_id            = Input::get('paso');
            $papeleta->tipo_id            = Input::get('tipos_papeleta');

            $papeleta->fecha_solicitud    = date('Y-m-d');
            $papeleta->observaciones      = Input::get('observaciones');
            if(Input::get('simbolica') == "true"){
                $papeleta->simbolica = true;
            }



            // Was the entrada post created?

            if( $papeleta->save())

            {

                // Redirect to the new entrada post page

                return Redirect::to('gestionhdad/papeleta')->with('success', 'Papeleta reservada correctamente');

            }



            // Redirect to the entrada post create page

            return Redirect::to('gestionhdad/papeleta')->with('error', 'Ocurrio un problema al reservar la papeleta de sitio, intentelo de nuevo');

        }



        // Form validation failed

        return Redirect::to('gestionhdad/papeleta')->withInput()->withErrors($validator);

    }

}