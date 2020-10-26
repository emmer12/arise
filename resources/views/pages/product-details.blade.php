@extends('layouts.app')

@section('content')
<div>

    <div class="container">
       <div class="details-con">
        <div class="row">
            <div class="col-md-6">
                <div class="img-con">
                    <img src="/uploads/covers/{{$product->display_image}}" alt= />
                </div>
            </div>

            <div class="col-md-6">
               <h1>{{ $product->title }}</h1>
               <h4>&#8358; {{$product->price}}</h4>
               <p>Product description</p>
               <strong>Book By::</strong> <i>{{$product->author}}</i> <br>
               <form action="{{ route('check') }}" method="post">
                   {{ csrf_field() }}

                  <input type="hidden" name="id" value='{{$product->id}}'>
                  <button type="submit" href="{{route('check')}}" class="btn btn-outline-primary">Buy Now</button>
               </form>
            </div>
        </div>
       </div>
    </div>

    <div style="height:300px"></div>
  </div>
@endsection
