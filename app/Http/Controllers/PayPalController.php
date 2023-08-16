<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Validator;
use URL;
use Illuminate\Support\Facades\Session;
use Redirect;
use Input;


class PayPalController extends Controller
{


    public function __construct()
    {

        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function payWithPaypal()
    {
        return view('auth/paywithpaypal');
    }

    public function postPaymentWithPayPal(Request $request)
    {
        $membership = Membership::where('active', '=', 1)->orderBy('id', 'DESC')
            ->first();


        return ['success' => false, 'data' => "an error occurred"];
    }
}
