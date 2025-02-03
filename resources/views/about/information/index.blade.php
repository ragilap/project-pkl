@extends('layouts.about-craft')

{{-- @section('image-header')
    <div class="mbr-overlay" style="opacity: 5.2; background-color: rgb(182, 161, 136);">
        <img src="{{ asset('storage/' . $image->image) }}"
            style="width:100%; height:900px; object-fit:cover; object-position:top; opacity: 0.7; background-color: rgb(182, 161, 136);">
    </div>
    <div class="container align-left text-overlay" data-aos="fade-right">
        <div class="row">
            <div class="mbr-black col-md-12 col-lg-12" style="transform: skewY(-5deg);  letter-spacing: 4px;">
                <h3 class="mbr-section-subtitle mbr-fonts-style mbr-white display-5" style="margin-bottom: 3%">
                    {{ $image->kalimat1 }}, </h3>
                <h1 class="mbr-section-title mbr-bold mbr-white pb-2 mbr-fonts-style display-1"
                    style="margin-left: 10%;  font-family: Quicksand, sans-serif;">{{ $image->kalimat2 }}
                </h1>


            </div>
        </div>
    </div>
    <div class="text-overlay-bottom" data-aos="fade-up">
        <h2 class="bottom-title mbr-fonts-style mbr-primary display-1"
            style="font-family:'Permanent Marker', cursive, sans-serif; ">
            {{ $image->kalimat3 }}</h2>
    </div>
@endsection --}}

{{-- <div class="image-container">
            <img src="{{ asset('') }}" alt="Your Image">
            <div class="text-overlay">
                Your Text Here
            </div>
        </div> --}}

{{-- @section('about-us')
    <div class="container">
        @foreach ($infos as $info)
            <div class="row content-row">
                <div class="col-md-12 col-lg-6 text-block">
                    <div class="media-content mt-5" data-aos="fade-right">

                        <h2 class="mbr-section-title align-left  mbr-fonts-style display-2">{{ $info->judul }}
                        </h2>

                        <div class="mbr-section-text ">
                            <p class="mbr-text align-left mbr-fonts-style display-7">{{ $info->isi }}</p>
                        </div>
                        <div class="mbr-section-btn align-left"></div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 img-block">
                    <div class="mbr-figure" data-aos="zoom-out">
                        <img src="{{ asset('storage/' . $info->image) }}"
                            style="width: 600px; height:500px; object-fit:cover; margin-left:90px;" alt="Mobirise">
                    </div>
                </div>

            </div>
        @endforeach

    </div>
@endsection
@section('head-value')
    <div class="container align-center">
        <div class="row justify-content-md-start justify-content-md-center">
            <div class="mbr-white col-sm-12 col-md-10 col-lg-7" data-aos="fade-down-left">
                <h2 class="mbr-section-title mbr-info mbr-fonts-style display-2" style="text-align:center;">
                    Information</h2>

                <p>Our Values</p>
            </div>
        </div>
    </div>
@endsection --}}
{{-- @section('value')
    <div class="container ">
        <div class="media-container row">
            @foreach ($values as $index => $value)
                <!-- Tentukan efek berdasarkan indeks -->
                @php
                    $dataAosEffect = $index % 2 === 0 ? 'fade-up' : 'fade-down';
                @endphp

                <div style="border: none;" class="card col-12 col-md-6 col-lg-3" data-aos="{{ $dataAosEffect }}"
                    data-aos-delay="100">
                    <div class="card-inner">
                        <div class="card-img ">
                            <span class="mbri-{{ $value->icon }} mbr-iconfont"></span>
                        </div>
                        <div class="card-box">
                            <h4 class="card-title mbr-white align-left mbr-bold mbr-fonts-style display-9">
                                {{ $value->judul }}</h4>
                            <p class="mbr-text mbr-white align-left mbr-fonts-style mbr-light display-7"
                                style="margin-bottom:1.5rem">
                                {{ $value->deskripsi }} </p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection --}}


<!-- End Recent Blog Posts Section -->
<!-- ======= Contact Section ======= -->
@section('contact')
    <div class="container" data-aos-delay="160">

        <header class="section-header" data-aos="fade-up-right">
            <h2>About-us</h2>
            <p>Contact</p>
        </header>
        @if (session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif

        <div class="row gy-4">
            <div class="col-lg-6">

                <div class="row gy-4" data-aos="fade-right">
                    @foreach ($contacts as $contact)
                        <div class="col-md-6">
                            <div class="info-box" style="height: 100%;">
                                <i class="bi bi-{{ $contact->type }}"></i>
                                <h3>{{ $contactTypes[$contact->type] }}</h3>
                                <p>{{ $contact->value }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @include('sweetalert::alert')
            {{-- @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) --}}

            <div class="col-lg-6 col-12 tabel-email" data-aos="fade-left">
                <form action="/message/store" method="post" class="php-email-form">
                    @csrf
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>

                        <div class="col-md-6 ">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>

                            <button type="submit">Send Message</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <header class="section-header" style="margin-top: 10%;" data-aos="fade-up-right">
            <h2>About-us</h2>
            <p>Find-us</p>
        </header>
        <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne"
            aria-expanded="true" aria-controls="accordionOne">
        </button>
        <div class="accordion mt-3" id="accordionExample">
            <div class="accordion-item active">
                <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div id="test"></div>
                    <div id="map" class="map"></div>
                </div>
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
                    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
                <script
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqWp5TCF0h2sx_nHdtAv0OUegAGIQQznU&libraries=places&callback=initMap">
                </script>
                <script>
                    const dataLatLong = "{{ $map->latitude }}";

                    const [latitude, longitude] = dataLatLong.split(',').map(parseFloat);


                    const map = L.map('map').setView([latitude, longitude], 15);

                    const streetLayer = L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                        attribution: '&copy; Google Maps'
                    }).addTo(map);

                    const satelliteLayer = L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                        attribution: '&copy; Google Maps'
                    });



                    const baseLayers = {
                        "Street Map": streetLayer,
                        "Satellite": satelliteLayer
                    };


                    streetLayer.addTo(map);

                    const marker = L.marker([latitude, longitude]).addTo(map)
                        .bindPopup('{{ $map->marker }}').openPopup();

                    function initMap() {
                        const googleMap = new google.maps.Map(document.getElementById('map'), {
                            center: {
                                lat: latitude,
                                lng: longitude
                            },
                            zoom: 15
                        });

                        const streetView = new google.maps.StreetViewPanorama(
                            document.getElementById('map'), {
                                position: {
                                    lat: latitude,
                                    lng: longitude
                                },
                                pov: {
                                    heading: 165,
                                    pitch: 0
                                },
                                zoom: 1
                            }
                        );
                        googleMap.setStreetView(streetView);
                    }
                </script>
            </div>
        </div>
    </div>
    <link href="{{ asset('dist/css/_accordion.scss') }}" rel="stylesheet">
@endsection
