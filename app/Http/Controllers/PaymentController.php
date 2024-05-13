<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;

use App\Models\Product;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }



    public function paynow(Request $request)
    {
      $product = Product::all()->first();

      $amount = 5000;

      $total = str_replace([',', '.'], '', $amount);

      //dd($amount);

      // dd($amount);

      $url = "https://api.paystack.co/transaction/initialize";
      $fields = [
        // Auth::user->whatever function ie email .. is used to grab a specific data from the logged in user
        'email' => auth()->user()->email,
        'amount' => $total .'00',
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



            $transaction_id = $data['data']['reference'];
            $amount = $data['data']['amount'];


            $length = strlen($amount);

            $amount_whole = substr($amount, 0, $length - 2);

            $amount_decimal = substr($amount, -2);

            //dd($amount_whole, $amount_decimal);

            $userId = auth()->id();

            $orderAmount = $amount_whole . '.' . $amount_decimal;

            $order = new Order();
            
             $ref = '';

            if (Cookie::has('ref_code')) 
            {

              $ref = Cookie::get('ref_code');
              $order->refferalcode = $ref;
              
              
              
            }



            $order->user_id = $userId;
            $order->payment_method = 'Card';
            $order->status =  'Pending';
            $order->currency =  '₦';
            $order->amount = $orderAmount;
            $order->transaction_id = $transaction_id;
            $order->save();

            $product = Product::all()->first();
            
            
            



              $order_detail = new Orderdetail;

              $order_detail->order_id = $order->id;
              $order_detail->productname = $product->productname;
              $order_detail->quantity = 1;
              $order_detail->price = $product->productprice;
              $order_detail->image = $product->image;

              $order_detail->save();


            $ref = '';

            if (Cookie::has('ref_code')) {

              $ref = Cookie::get('ref_code');



              $referrer = User::where('affiliate_code', $ref)->first();

              $rp = 50;

              $profit = $orderAmount * $rp / 100;

              $refferal = new Refferal;
              $refferal->user_id =  $referrer->id;
              $refferal->order_id = $order->id;
              $refferal->refferal_percentage = $rp;
              $refferal->refferal_profit = $profit;
              $refferal->save();
            }
          }

          return redirect()->route('orderdetails');
        }
      }
    }

}