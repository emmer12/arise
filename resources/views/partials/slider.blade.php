<div class="slider-con">
    <div id="carouselId" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox" style="width:100%">
            <div class="carousel-item active " >
                <img src="{{ asset('images/slider/1.jpg')}}" width="100%" alt="First slide">
                <div class="carousel-caption animated bounceInLeft" style="animation-delay:0.5s">
                    <h3 class="animated bounceInLeft"  style="animation-delay:0.8s">Leadership</h3>
                    <p>He who walk must learn how to fly, you cannot <span>fly</span> into fly</p>
                    <button class="btn btn-primary animated zoomIn" style="animation-delay:1s">Learn more</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/slider/2.jpg')}}" width="100%" alt="Second slide">
                <div class="carousel-caption animated bounceInRight" style="animation-delay:0.5s">
                    <h3 class="animated bounceInLeft" style="animation-delay:0.8s">Let's go global</h3>
                    <p>Description</p>
                    <button class="btn btn-primary animated zoomInUp" style="animation-delay:1s">Learn more</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/slider/3.jpg')}}" width="100%" alt="Third slide">
                <div class="carousel-caption animated bounceInLeft" style="animation-delay:0.5s">
                    <h3 class="animated bounceInRight" style="animation-delay:0.8s">Arise Room</h3>
                    <p>A thousand <span>mile</span> begings  </p>
                    <button class="btn btn-primary animated bounceInLeft" style="animation-delay:1s" >Learn more</button>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="flase"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="flase"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>


