@include('partials.header')
@include('partials.navbar')


<!-- Masthead-->
<header class="page-section">

    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-left justify-content-left text-left">
            <div class="col-lg-7 align-self-end">
                <h1 class="text-white font-weight-bold">About

                </h1>
                <hr class="align-items-left justify-content-left text-left"/>
            </div>

            <div class="col-lg-7 align-self-baseline text-center pt-5">
                <h2>We've got what you need!</h2>
                <p>
                    We are a bridge between Companies and Job seekers. You can search for a suitabke job here and send
                    your resumes to tell more about youself, or you can search for suitable persons to fill in your
                    company's available positions. We aim to provide high quality service to our customers and our
                    support team is always there to solve any disputes or answer any querries, just leave your message
                    through our contact form and we will get back to you.
                </p>
                <h4>
                    Hope you have a great journey with us!
                </h4>
            </div>
            <div class="col-lg-5 pt-5">
                <img src="{{asset('assets/img/about.jpg')}}" class="img-fluid">
            </div>

        </div>
    </div>
</header>


<!-- Footer-->

@include('partials.footer')
<!-- Back to top button -->
<button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top">
    <i class="bi-arrow-up-circle fs-1 text-primary"></i>
</button>
<!-- <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - KashEza</div></div> -->

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- SimpleLightbox plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
