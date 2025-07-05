<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonateRequest;
use App\Models\Donate;
use App\Models\User;
use App\Notifications\Admin\ContactNotification;
use App\PaymentGateways\PaymentGatewaysFactory;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function store(DonateRequest $request)
    {
        $data = $request->all();

        $confirmation = $request->has('confirmation') ? 1 : 0;
        $data['confirmation'] = $confirmation;

        $donate = Donate::create($data);

        // $admins = User::all();
        // foreach ($admins as $admin) {
        //     $admin->notify(new ContactNotification($donate));
        // }

        // Gateways 
        $gateway = PaymentGatewaysFactory::create($request->input('payment_method'));
        return $gateway->create($donate);
    }

    public function callback(Request $request, $slug)
    {
        $gateway = PaymentGatewaysFactory::create($slug);
        return $gateway->verify($request->id);
    }

    public function cancel()
    {
        return redirect()->route('/');
    }
}
