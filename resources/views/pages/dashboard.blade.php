@extends('layouts.app')

@section('content')
  {{-- <div id="app">
    <dashboard></dashboard>
  </div> --}}

  <div class="dashboard">
   

      <div class=" container">
        <div class="header">
          <h2>Hello, {{ Auth::user()->fullname }} You are welcome</h2>
        </div>
        <div style="margin:20px 0px;" class="header-1" >
          <h4>Invoice</h4>
        </div>
        
        @if (count($invoices))
        <div class="invoice" >
          @foreach ($invoices as $invoice)
             <div style="height:150px;width:120px" >
                 <img src="/images/cover/cover.jpg" width="100%" height="100%" />
             </div>
 
             <div>
                 <h4> {{$invoice->product_id->title}}</h4>
             </div>
 
             <div>
               {{$invoice->amount}}
             </div>
 
             
             <div>
               {{$invoice->status}}
             </div>
 
             <form method="POST" action="/download-puchased" id="download_form">
               @csrf
               <div class="download">
                   <input type="hidden" name="filename" value="{{$invoice->product_id->filename}}" />
                 <a href="javascript:{}" onclick="document.getElementById('download_form').submit()"><i class="fa fa-download" aria-hidden="true"></i></a>
               </div>
             </form>


                 
             
          @endforeach
          
          
        </div>


        @else

        <div class="invoice" >
          <div>
            <i class="fa fa-warning" aria-hidden="true"></i>
            You have no active purchase
          </div>
        </div>
            
        @endif
      
      
      
      
      </div>


  </div> 
@endsection

