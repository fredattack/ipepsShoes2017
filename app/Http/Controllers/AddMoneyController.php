<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
/** All Paypal Details class **/
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

class AddMoneyController extends HomeController
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function payWithPaypal()
    {
        $user=\Auth::user();
        $user=\App\User::with(array('adress'))->findOrFail($user->id);
        $productTempList=\App\TempCartItem::with('shoe')->where('idUser',$user->id)->orderBy('idShoe')->get();
        $step=3;

//        return view('shop.checkOut',compact(['productTempList','user','step']));
        return view('shop.paywithpaypal',compact(['productTempList','user','step']));
//        return view('shop.paywithpaypal');
    }
    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {
        $user=\Auth::user();
//        dd($user->idShipAdress1);
        $productTempList=\App\TempCartItem::with('shoe')->where('idUser',$user->id)->orderBy('idShoe')->get();
        $deliveryCost=$user->adress
            ->where('id', '=', $user->idShipAdress1)
            ->first()->deliveryCost;

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

//////////////////////////////////////////
///
//        Par Default
//
//////////////////////////////////////////
//
//
//        $item_list = new ItemList();
//
//        $deliveryCost = new Item();
//        $deliveryCost ->setName('ScarpeFine') /** item name **/
//                ->setCurrency('EUR')
//                ->setQuantity(1)
//                ->setPrice(62.5); /** unit price **/
//
//        $item_list->addItem($deliveryCost);
//
//        $item_2 = new Item();
//        $item_2 ->setName('ScarpeFine') /** item name **/
//        ->setCurrency('EUR')
//            ->setQuantity(1)
//            ->setPrice(62.5); /** unit price **/
//
//        $item_list->addItem($item_2);

///////////////////////////////////////////////////////////
//
//              Apres Modif
//
//////////////////////////////////////////////////////////


        $item_list = new ItemList();
        $total=0;
        foreach($productTempList as $productTemp)
        {

                            if($productTemp->Shoe->Modele->idReduction==1)
                                $prixUnit= $productTemp->Shoe->Modele->price;
                            else
                                $prixUnit=$productTemp->Shoe->Modele->price-$productTemp->Shoe->Modele->price*$productTemp->Shoe->Modele->reduction->value/100;

            $count=1;
            $nom="item".$count;
            $count=$count+1;
            $var= new Item();
            $var ->setName($productTemp->Shoe->Modele->name.' '.$productTemp->Shoe->Modele->gender->name.' T:'.$productTemp->Shoe->size) /** item name **/
                ->setCurrency('EUR')
                ->setQuantity($productTemp->quantity)
                ->setPrice($prixUnit*$productTemp->quantity); /** unit price **/
            $total+=$prixUnit*$productTemp->quantity;
            $item_list->addItem($var);
        }
        $delivery = new Item();
        $delivery->setName('Frais de livraison') /** item name **/
                ->setCurrency('EUR')
                ->setQuantity(1)
                ->setPrice($deliveryCost); /** unit price **/

        $item_list->addItem($delivery);
        $total+=$deliveryCost;
//        dd($item_list);
        \Session::put('total',$total);
//dd($deliveryCost);
//        dd($request);
//dd($total);
//

        $amount = new Amount();
        $amount->setCurrency('EUR')
//                ->setTotal(125);
            ->setTotal($total);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Vos achats sur ScarpeFine:');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status')) /** Specify return URL **/
        ->setCancelUrl(URL::route('payment.status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('addmoney.paywithpaypal');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('addmoney.paywithpaypal');
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        Session::put('error','Unknown error occurred');
        return Redirect::route('addmoney.paywithpaypal');
    }
    public function getPaymentStatus()
    {
        $total=Session::get('total');
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            Session::put('error','Payment failed');
            return Redirect::route('addmoney.paywithpaypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {

            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/
            Session::put('success','Payment success');
//            return Redirect::route('addmoney.paywithpaypal');
            return Redirect::route('payOut',$total);

        }
        Session::put('error','Payment failed');
        return Redirect::route('addmoney.paywithpaypal');
    }
}
