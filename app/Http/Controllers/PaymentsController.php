<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree_Transaction;

class PaymentsController extends Controller
{
	
	public function infaq(Request $request)
	{

		//dd($request->all());
		session()->put('money', $request->money);
		return view('/welcome');
		

	}

	public function process(Request $request)
	{

    $payload = $request->input('payload', false);
    $nonce = $payload['nonce'];
   // $money = $money;
    $status = Braintree_Transaction::sale([
	'amount' => session()->get('money'),
	'paymentMethodNonce' => $nonce,
	'options' => [
	    'submitForSettlement' => True
	]
    ]);

    return response()->json($status);
	}

	public function payComplete()
	{
			    session()->forget('money');
			  //  dd(session()->get('money'));
			    return redirect(route('homepage'));

	}

}
