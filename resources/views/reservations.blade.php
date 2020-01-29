@extends('master')
@section('main-content')

<section class="caviar-reservation-area d-md-flex align-items-center" id="reservation">
        <div class="reservation-form-area d-flex justify-content-end">
            <div class="reservation-form">
                <div class="section-heading">
                    <h2>Reservation</h2>
                </div>
                <form action="#">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" class="form-control" placeholder="Select Persons">
                        </div>
                         <div class="col-12 col-lg-6">
                            <input type="text" class="form-control" placeholder="First name">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" class="form-control" placeholder="Last name">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" class="form-control" placeholder="phone number">
                        </div>
                        <div class="col-12">
                            <textarea name="reservation-message" class="form-control" id="reservationMessage" cols="30" rows="10" placeholder="Your Message"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn caviar-btn" style="border: 1px solid ;"><span></span> Reserve Your Desk</button>
                            <br><br><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="reservation-side-thumb wow fadeInRightBig" data-wow-delay="0.5s">
            <img src="{{asset('img')}}/bg-img/hero-3.jpg" alt="">
        </div>
    </section>
    @endsection
