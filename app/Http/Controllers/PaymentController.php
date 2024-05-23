<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;

use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Refferal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class PaymentController extends Controller
{

    public function paynow(Request $request)
    {

        $product = Product::find($request->product_id);

        $total = str_replace([',', '.'], '', $product->product_price);

        $paystackAmount = $total . '00';

        $order = new Order();
        $order->product_id = $product->id;
        $order->user_id = Auth::id();
        $order->payment_method = 'Card';
        $order->status =  'pending';
        $order->currency =  '₦';
        $order->amount = $total;
        $order->transaction_id = null;
        $order->refferalcode = Cookie::get('ref_code');
        $order->save();

        $url = "https://api.paystack.co/transaction/initialize";
        $fields = [
            // Auth::user->whatever function ie email .. is used to grab a specific data from the logged in user
            'email' => auth()->user()->email,
            'amount' => $paystackAmount,
            'metadata' => [
                'order_id' => $order->id,
            ],
            'callback_url' => route('redirectpay')
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            //"Authorization: Bearer sk_live_1280945fa901f4adf3a5e456f07c036ee933a8bb",
            "Authorization: Bearer sk_live_1280945fa901f4adf3a5e456f07c036ee933a8bb",
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);

        //dd($result);

        $data = json_decode($result, true);

        if ($data['status'] == true) {
            $order->transaction_id = $data['data']['reference'];
            $order->save();
            return redirect()->away($data['data']['authorization_url']);
        }
    }

    public function redirectpay(Request $request)
    {
        if (auth()->check()) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $request->trxref,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    //"Authorization: Bearer sk_live_1280945fa901f4adf3a5e456f07c036ee933a8bb",
                    "Authorization: Bearer sk_live_1280945fa901f4adf3a5e456f07c036ee933a8bb",
                    "Cache-Control: no-cache",
                ),
            ));

            $response = curl_exec($curl);

            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {

                echo "cURL Error #:" . $err;
            } else {

                $data = json_decode($response, true);

                //dd($data);
                if ($data['status'] == true) {

                    $order = Order::find($data['data']['metadata']['order_id']);
                    $order->status = 'successful';
                    $order->save();

                    if (Cookie::has('ref_code')) {

                        $ref = Cookie::get('ref_code');

                        $referrer = User::where('affiliate_code', $ref)->first();

                        $rp = 50;

                        $profit = $order->amount * $rp / 100;

                        $refferal = new Refferal;
                        $refferal->user_id =  $referrer->id;
                        $refferal->order_id = $order->id;
                        $refferal->refferal_percentage = $rp;
                        $refferal->refferal_profit = $profit;
                        $refferal->save();
                    }
                }

                return redirect()->route('order_list');

            }
        }
    }
}
