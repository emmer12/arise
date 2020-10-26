<div class="f-p-s">
    <div class="container">
        <div class="header-1">
            <h4>Featured Product</h4>
           </div>
           <br>
           <div class="row">
               
               @foreach ($products as $product)
                   <div class="col-md-4">
                         <a href="{{ route('p.details',[$product->slug]) }}" class="book-link">
                                <div class="book-card">
                                <img src="/uploads/covers/{{$product->display_image}}" width="100%" alt= />
                                    <div class="details">
                                        <h4> {{ $product->title }}</h4>
                                    <span>&#8358; {{ $product->price }}</span>
                                        <button type="button" class="btn btn-outline-primary">Buy</button>
                                </div>    
                            </div>
                         </a>
                </div>
                @endforeach
               
           </div>
    </div>
</div>