<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Product as ProductRequests;
use App\Product;
use App\Payment;
use Auth;

use Str;
class ProductController extends Controller
{
    public function create(ProductRequests $request)
    {
        $valid=$request->validated();

        $slug=Str::slug($valid['title']);

    
        Product::create([
            'title'=>$valid['title'],
            'author'=>$valid['author'],
            'price'=>$valid['price'],
            'description'=>$valid['description'],
            'slug'=>$slug,
        ]);
         
        return response()->json($valid, 200);



    }

    public function show($slug)
    {

        $product=Product::where('slug',$slug)->firstOrFail();
        return view('pages.product-details')->with([
            'product'=>$product
        ]);
    }


    public function checkout(Request $request)
    {   
        $id=$request->session()->get('bookId');

        $product=Product::findOrFail($id);
        return view('pages.checkout')->with([
            'product'=>$product
        ]);
    }



    
    public function check(Request $request)
    {   
        $request->session()->put('bookId', $request->input('id'));
        return redirect()->route('checkout');
    }

    public function verify(Request $request){
        $curl = curl_init();
  
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$request->query('reference'),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer sk_test_f95cf6515fb76187eb141a0777fd476eb987b76e",
            "Cache-Control: no-cache",
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
          $payment=new Payment();

          $payment->user_id=Auth::user()->id;
          $payment->product_id=$request->query('product_id');
          $payment->reference=$request->query('reference');
          $payment->amount=$request->query('amount');
          $payment->payment_type="book";
          $payment->status='success';

          Auth::user()->sendBooking();

          $payment->save();

          return response()->json(['data'=>json_decode($response)],200);
        }
    }
}


