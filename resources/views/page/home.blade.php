@extends('layout.index')
@section('content')
<section id="slider" data-aos="fade-up">
    <div class="container-fluid padding-side">
        <div class="d-flex rounded-5"
            style="background-image: url({{ Vite::asset('resources/images/slider-image.jpg') }}); background-size: cover; background-repeat: no-repeat; height: 85vh; background-position: center;">
            <div class="row align-items-center m-auto pt-5 px-4 px-lg-0">
                <div class="text-start col-md-6 col-lg-5 col-xl-6 offset-lg-1">
                    <h2 class="display-1 fw-normal">Hotel mellow Your Gateway to Serenity.</h2>
                </div>
                <div class="col-md-6 col-lg-5 col-xl-4 mt-5 mt-md-0">
                    <form id="form" method="POST" action="{{ route('home.payment') }}" class="form-group flex-wrap bg-white p-5 rounded-4 ms-md-5">
                        @csrf
                        <h3 class="display-5">Test Payment</h3>
                        <div class="col-lg-12 my-4">
                            <label class="form-label text-uppercase">Name</label>
                            <input type="text" value="" name="name" placeholder="Your Name" class="form-control text-black-50 ps-3">
                            @error('name')
                            <label for="" class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-lg-12 my-4">
                            <label class="form-label text-uppercase">Phone Number</label>
                            <input type="number" value="" name="phone" placeholder="Phone Number" class="form-control text-black-50 ps-3">
                            @error('phone')
                            <label for="" class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-lg-12 my-4">
                            <label class="form-label text-uppercase">Price</label>
                            <input type="number" value="150000" readonly name="price" class="form-control text-black-50 ps-3">
                            @error('price')
                            <label for="" class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-lg-12 my-4">
                            <label class="form-label text-uppercase">Payment</label>
                            <select name="payment" class="form-control text-black-50 ps-3" id="">
                                <option value="" disabled selected>-- Please Select --</option>
                                @foreach ($payment_channels as $channel)
                                <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                                @endforeach
                            </select>
                            @error('payment')
                            <label for="" class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-arrow btn-primary mt-3">
                                <span>Pay Now<svg width="18" height="18">
                                    <use xlink:href="#arrow-right"></use>
                                </svg></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    window.addEventListener('load', function () {
        $('input[name=phone]').on('keyup', function() {
            this.value = this.value.replace(/\D/g, '');
        })
    });
</script>
@endpush