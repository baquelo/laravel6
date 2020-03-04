<?php

namespace App\Http\Controllers;


use App\Events\ProductPurchased;
use App\Notifications\PaymentReceived;

class PaymentsController extends Controller
{
    public function create() {
        return view('payments.create');
    }

    public function store() {
        // process the payment
        // unlock the purchase

         ProductPurchased::dispatch('toy');

        // listeners
        // notify the user about the payment
        //request()->user()->notify(new PaymentReceived(900));
        // award achievements
        // shared shareable coupon to user
    }
}
