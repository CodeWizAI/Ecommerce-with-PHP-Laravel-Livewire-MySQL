<div class="container-fluid">
    <div class="row">

        <div class="slider-section">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner slider">
                    @foreach ($sliders as $slider)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img class="slider-image" src="{{ asset('images/sliders') }}/{{ $slider->image }}"
                                alt="First slide">
                            <div class="slider-info">
                                <p><span class="slider-title">{{ $slider->title }}</span><br>
                                <span class="slider-subtititle">{{ $slider->subtitle }}</span><br>
                                <span class="slider-price">Only At Price: <b>$ {{ $slider->price }}</b></span></p>
                                <a href="{{ $slider->link }}" class="btn slider-btn">Shop Now</a>
                            </div>
                        </div>

                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span><i class="fas fa-chevron-left prev-btn"></i></span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span><i class="fas fa-chevron-right next-btn"></i></span>
                </a>
            </div>
        </div>

    </div>
</div>