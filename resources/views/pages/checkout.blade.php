@extends('layouts.app')

@section('content')
<div>

    <div class="container" >
       <div class="checkout-con">
        <div class="justify-content-center">
              <div class="header-1">
                <h4>Purchase Details</h4>
               </div>
              <br>

              <div class="img-con">
                <img src="/uploads/covers/{{$product->display_image}}" width="100%" height="100%" alt= />
              </div>

              


            <div class="details"><strong>Ebook Title</strong> <span>{{ $product->title }}</span></div>
              <div class="details"><strong>Price</strong> <span>&#8358; {{ $product->price }}</span> </div>
              <div class="details"><strong>By</strong><span> {{ $product->author }}</span></div>
             <br>
              <div class="header-1">
                <h4>Users Infomation </h4>
              </div>
              <br>
              <div class="details"><strong>Fullname</strong> <span> {{ Auth::user()->name }}</span> </div>
              <div class="details"><strong>Email Address</strong> <span> {{ Auth::user()->email }}</span> </div>
              <div class="details"><strong>Phone Number</strong> <span> 09069684848</span> </div>


              </div>
               <button class="btn btn-success " id="makePayment">Make Payment </button>
        </div>
       </div>
    </div>

    <div style="height:300px"></div>
  </div>
  <script src="https://js.paystack.co/v1/inline.js"></script> 
  <script>
   const makePayment = document.getElementById('makePayment');
      makePayment.addEventListener("click", payWithPaystack, false);
      function payWithPaystack(e) {
        e.preventDefault();
        let handler = PaystackPop.setup({
          key: 'pk_test_9a79054f46776dddee3854e7f2d75fc3dc341353', // Replace with your public key
          email: "{{ Auth::user()->email }}",
          amount: "{{ $product->price }}" * 100,
          firstname: "{{ Auth::user()->name }}",
          lastname: "{{ Auth::user()->name }}",
          ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
          // label: "Optional string that replaces customer email"
          onClose: function(){
            alert('Window closed.');
          },
          callback: function(response){
            let message = 'Payment complete! Reference: ' + response.reference;
            console.log(response);
            if(response.status=='success'){
              $.ajax({
                url: 'payment/verify_transaction?reference='+ response.reference+'&product_id='+"{{$product->id }}" ,
                method: 'get',
                success: function (response) {
                  alert('success')
                }
              });

            }

          }
        });
        handler.openIframe();
      }

  </script>
@endsection