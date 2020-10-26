<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

use Auth;
use Illuminate\Http\Response;

class UserController extends Controller
{
      public function dashboard()
      {

        $invoices=Auth::user()->invoice;

        foreach ($invoices as $invoice) {
          $product=Product::find($invoice->product_id);

          $invoice->product_id=$product;
        }
        return view('pages.dashboard')->with([
            'page'=>'Dashboard',
            'invoices'=>$invoices
        ]);
      }

      public function sendMail(){

        $product=Product::first();
        Auth::user()->sendBooking($product);
        return "Message sent";

      }


      public function downloadPuchased(Request $request)
      {
         $file=storage_path('/uploads/books/'.$request->input('filename'));

        //  return $file;

         $headers=array(
           'Content-Type'=>'application/pdf'
         );

         return response()->download($file,$request->input('filename'), $headers);
      }
}

