<div class="slider-con">
    <div id="carouselId" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox" style="width:100%">
            <div class="carousel-item active min-vh-100" style="background:url({{ asset('images/slider/1.jpg') }}) no-repeat;background-size:cover">
                <!-- <img src="{{ asset('images/slider/1.jpg')}}" width="100%" alt="First slide"> -->
                <div class="carousel-caption animated bounceInLeft" style="animation-delay:0.5s;">
                    <h3 class="animated bounceInLeft" style="animation-delay:0.8s">Leadership</h3>
                    <p>He who walk must learn how to fly, you cannot <span>fly</span> into fly</p>
                    <button class="btn btn-primary animated zoomIn" style="animation-delay:1s">Learn more</button>
                </div>
            </div>
            <div class="carousel-item min-vh-100" style="background:url({{ asset('images/slider/2.jpg') }}) no-repeat;background-size:cover">
                <div class="carousel-caption animated bounceInRight" style="animation-delay:0.5s">
                    <h3 class="animated bounceInLeft" style="animation-delay:0.8s">Let's go global</h3>
                    <p>Description</p>
                    <button class="btn btn-primary animated zoomInUp" style="animation-delay:1s">Learn more</button>
                </div>
            </div>
            <div class="carousel-item min-vh-100"  style="background:url({{ asset('images/slider/3.jpg')  }}) no-repeat;background-size:cover">
                <div class="carousel-caption animated bounceInLeft" style="animation-delay:0.5s">
                    <h3 class="animated bounceInDown" style="animation-delay:0.8s">Arise Room</h3>
                    <p  class="animated bounceInLeft"  style="animation-delay:1s">A thousand <span>mile</span> begings </p>
                    <button class="btn btn-primary animated bounceInUp" style="animation-delay:1.2s">Learn more</button>
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

    <svg width="0" height="0" viewBox="0 0 600 400">
        <defs>
            <clipPath id="myClipSlider">
                <path class=" d-none d-sm-block d-md-block"
                    d="M680.531 577H-1V151.784V-100H719.75H1441V504.81H741.463C738.199 504.81 735.141 506.403 733.27 509.077L688.724 572.733C686.853 575.407 683.794 577 680.531 577Z"
                    stroke="black" />
                        <path class="d-sm-none" d="M478 1H0V571.5H189.728C192.457 571.5 195.067 572.615 196.953 574.586L248.023 627.957C248.967 628.943 250.272 629.5 251.636 629.5H478V322V1Z" stroke="black"/>
                                    

            </clipPath>
        </defs>
    </svg>

</div>
