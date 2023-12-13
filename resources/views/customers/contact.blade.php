@extends('customers.layouts.app')
@section('title', 'contact')
@section('content')
<main id="main" class="mt-5">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Contact</h2>
            <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="mb-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1385.1671869052363!2d106.79366408032477!3d10.899424183134197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d9618435c705%3A0x1429b433291e5bf8!2sChung%20C%C6%B0%20Bcons%20Bee!5e0!3m2!1svi!2s!4v1702477476534!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

            <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
                <i class="icon bi bi-map flex-shrink-0"></i>
                <div>
                    <h3>Our Address</h3>
                    <p>Bcons Bee, hẻm 522 Trần Đại Nghĩa, phường Bình An, Dĩ An, Bình Dương</p>
                </div>
            </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
                <i class="icon bi bi-envelope flex-shrink-0"></i>
                <div>
                    <h3>Email Us</h3>
                    <p>hau.nguyenbk8786@gmail.com</p>
                </div>
            </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
                <i class="icon bi bi-telephone flex-shrink-0"></i>
                <div>
                    <h3>Call Us</h3>
                    <p>+84 09090909</p>
                </div>
            </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
                <i class="icon bi bi-share flex-shrink-0"></i>
                <div>
                <h3>Opening Hours</h3>
                <div><strong>Mon-Sat:</strong> 8AM - 20PM;
                    <strong>Sunday:</strong> Closed
                </div>
                </div>
            </div>
            </div><!-- End Info Item -->

        </div>

        <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
            <div class="row">
            <div class="col-xl-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-xl-6 form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
        </form><!--End Contact Form -->

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection
