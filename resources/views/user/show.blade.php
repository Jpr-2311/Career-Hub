@include('partials.header')
@include('partials.navbar')


<!-- Masthead-->
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


                <div class="shadow-lg p-3 mb-5 bg-white rounded" style="width:150%">
                    @foreach($profiles as $profile)
                        <div style="display: flex">
                            <div class="img">
                                @if($profile->image == true)
                                <img class="d-inline"style="width:100px; height:100px; border-radius:50%"src = "{{asset('storage/images/' . $profile->image)}}">
                                &nbsp;&nbsp;
                                <!-- <p style="font-size:10px;">Edit Image</p> -->
                                @else
                                <img class="d-inline"style="width:80px; height:80px; border-radius:100%"src = "{{asset('/assets/User.png/')}}">                                &nbsp;&nbsp;
                                @endif
                            </div>
                            <div class="info" style="display: flex;flex-direction: column;flex-grow: 1">
                                <div class="d-flex">
                                    <div>
                                        <h3 class="text-white font-weight-bold d-inline">
                                            <a style="text-decoration:none"
                                               href="#"><p class="text-secondary">{{$profile->first_name}} {{$profile->last_name}}</p>
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="flex-grow-1 d-flex justify-content-end" >
                                        <a href="{{route('users.edit',$profile->id)}}"><i class="bi bi-pencil-square"></i></a>
                                    </div>
                                </div>
                                
                                @if($profile->contact_show == 1)
                                <p class="text-white" style="margin: 0px;">
                                    <a class="text-secondary"style="text-decoration:none"
                                       href="#">{{$profile->contact_number}}
                                    </a>
                                </p>
                                @endif
                                <p class="text-white" style="margin: 0px;">
                                    <a class="text-secondary"style="text-decoration:none"
                                       href="#">{{$profile->email}}
                                    </a>
                                </p>
                                <p class="text-white">
                                    <a class="text-secondary"style="text-decoration:none"
                                       href="#">{{$profile->address}}
                                    </a>
                                </p>
                            </div>
                        </div>



                        <hr class="devider"/>
                        <p class="text-muted mb-2">{{$profile->about}}</p>

                </div>
                <hr class="devider"/>
            </div>
            <div class="col-lg-8 align-self-baseline">

                <div class="shadow-lg p-3 mb-5 bg-white rounded" style="width:150%">
                    @if($profile->contact_show == 1)

                        <h4 class="text-white font-weight-bold mt-4">Phone Number

                        </h4>
                        <p class="text-muted mb-2">{{$profile->contact_number}}</p>
                    @endif
                    <h4 class="text-white font-weight-bold mt-4">Email

                    </h4>
                    <p class="text-muted mb-2">{{$profile->email}}</p>
                    @if($profile->address_show == 1)
                        <h4 class="text-white font-weight-bold mt-4">Address
                        </h4>
                        <p class="text-muted mb-2">{{$profile->address}}</p>
                @endif
                @if($profile->gender_show == 1)
                        <h4 class="text-white font-weight-bold mt-4">Gender
                        </h4>
                        <p class="text-muted mb-2">{{$profile->gender}}</p>
                @endif
                @if($profile->marital_show == 1)
                        <h4 class="text-white font-weight-bold mt-4">Marital Status
                        </h4>
                        <p class="text-muted mb-2">{{$profile->marital_status}}</p>
                @endif
                @endforeach

                <!-- </div> -->


                </div>


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
<script src="/js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
