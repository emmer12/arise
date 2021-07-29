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


    public function upload(Request $request)
    {
        $validate=$request->validate([
            'file' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048'
        ]);
        // 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        if ($request->file()) {
            $fileName = $request->input('field').'-'.time().'.'.$request->file->extension();  
            if($request->input('field')=='display'){
                $request->file->move(public_path('uploads/covers'), $fileName);
            }elseif($request->input('field')=='file'){
                $request->file->move(storage_path('uploads/books'), $fileName);
            }
            return response()->json(['success'=>'Uploaded',"filename"=>$fileName,'filetype'=>$request->input('field')],200);
        }
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


