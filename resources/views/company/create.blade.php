@include('partials.header')
@include('partials.navbar')

<!--Register-->
<header class="page-section">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-left">
            <div class="col-lg-8 col-xl-6 text-left">
                @if(count($errors) > 0)
                    <div class="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li style="list-style:none"><i class="fas fa-exclamation-circle"></i>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div>
                @endif
                <h2 class="mt-0">Register Your Company</h2>
                <hr/>
                <p class="required">Fields marked with * are required</p>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-left mb-5">
            <div class="col-lg-12">

                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" method="POST" action="{{ action('CompanyController@store') }}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-floating mb-3">
                        <input class="form-control" id="title" type="text" name="title" required/>
                        <label for="title">Title*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="category" type="text" name="category" required/>
                        <label for="title">Category*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="city" type="text" name="city" required/>
                        <label for="title">City*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="country" type="text" name="country" required/>
                        <label for="title">Country*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="about" type="text" name="about" style="height: 10rem"
                                  required></textarea>
                        <label for="about">About Company*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="contact" type="text" name="contact_number">
                        <label for="about">Contact Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" name="email">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="address" type="text" name="address">
                        <label for="address">Address*</label>
                    </div>
                    <!-- <div class="mb-3">

                        <input class="form-control mt-4" id="image" type="file" name="image">

                    </div> -->
                    <div class="d-inline-block">
                        <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Post Now&nbsp; <i
                                class=" bi-cursor-fill text-white-75"></i></button>
                    </div>
                    <!-- <div class="d-inline-block"><button class="btn btn-success btn-lg" id="submitButton" type="submit">Save for Later&nbsp; <i class=" bi-heart-fill text-white-75"></i></button></div> -->

                </form>
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
