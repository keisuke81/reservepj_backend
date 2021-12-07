<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;


class StripeController extends Controller
{
    public function charge(Request $request)
    {
        Stripe::setApiKey(env('sk_test_51K41DVBu5VS2H4M7Gn8qbMsIM12NldMYxVx63kuG9BmZQliLjE4ANjUVGyd6AuavsXtyGoHqOGb7m1jIHenVASiP00KY83GF1Z')); //シークレットキー

        $charge = Charge::create(array(
            'amount' => 100,
            'currency' => 'jpy',
            'source' => request()->stripeToken,
        ));
        return back();
    }
}
