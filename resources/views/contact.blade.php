@extends('layouts.app')
@section( 'content')
<form action="{{ route('contact_add') }}" method="POST">
    @csrf
    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14679.78049542868!2d91.4270084!3d23.0991046!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1604842322524!5m2!1sen!2sbd" width="1200" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Information</span>
                            <h2>Contact Us</h2>
                            <p>As you might expect of a company that began as a high-end interiors contractor, we pay
                                strict attention.</p>
                        </div>
                        <ul>
                            <li>
                                <h4>Feni</h4>
                                <p>Munshirhut,Fulgazy <br />8801835488471 <br>imteajsajid1@gmail.com</p>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name" name="name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email" name="email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Message" name="messege"></textarea>
                                    <button type="submit" class="site-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
@include('proted.futter')
    <!-- Contact Section End -->

    @endsection
