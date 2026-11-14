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
     @if($companies->image == true)
     <img class="d-inline"style="width:80px; height:80px; border-radius:100%"src = "{{asset('/storage/images/' . $companies->image)}}">

            &nbsp;&nbsp;
            @else
            <img class="d-inline"style="width:80px; height:80px; border-radius:100%"src = "{{asset('/assets/User.png/')}}">
            &nbsp;&nbsp;
            @endif
             <h3 class="text-white font-weight-bold d-inline"><a style="text-decoration:none" href="#">{{$companies->title}}

</a></h3>
</h1>
<hr class="devider"/>
<p class="text-muted mb-2">{{$companies->about}}</p>
</div>
                        <hr class="devider"/>
                    </div>
                    <div class="col-lg-8 align-self-baseline">

                            <div class="shadow-lg p-3 mb-5 bg-white rounded" style="width:150%">


                    <h4 class="text-white font-weight-bold mt-4">Phone Number

</h4>
<p class="text-muted mb-2">{{$companies->contact_number}}</p>
<h4 class="text-white font-weight-bold mt-4">Email

</h4>
<p class="text-muted mb-2">{{$companies->email}}</p>
<h4 class="text-white font-weight-bold mt-4">Address
</h4>
<p class="text-muted mb-2">{{$companies->address}}</p>




                    <!-- </div> -->

                    @if($companies->status === 'Active' && Auth::check() && $companies->user_id == Auth::user()->id  || $companies->status === 'Retrieved' && Auth::check()  && $companies->user_id == Auth::user()->id )
                                       <!-- <form method="POST" action="{{action('JobsController@destroy', $companies->id)}}">
					@csrf
					@method('Delete') -->
                       <form class="d-inline-block" method="POST" action="{{action('CompanyController@update', $companies->id)}}">
					@csrf
					@method('patch')
                    <input type="hidden" name="status" value="Archived">
                    <input type="hidden" name="title" value="{{$companies->title}}">
                    <input type="hidden" name="about" value="{{$companies->about}}">
                    <input type="hidden" name="contact_number" value="{{$companies->contact_number}}">
                    <input type="hidden" name="email" value="{{$companies->email}}">
                    <input type="hidden" name="address" value="{{$companies->address}}">
                    <input type="hidden" name="image" value="{{$companies->image}}">
                    <button class="btn btn-secondary btn-lg ml-4 mt-4" type="submit">Archive Company&nbsp; <i class=" bi-heart-fill text-white-75"></i></button>
                    <a class="btn btn-primary btn-lg ml-4 mt-4 mt-4" href="{{route('companies.edit',$companies->id)}}">Edit Company Details&nbsp; <i class=" bi-pencil-square text-white-75"></i></a>
                    </form>
                    <form class="d-inline-block" method="POST" action="{{action('CompanyController@destroy', $companies->id)}}">
					@csrf
					@method('Delete')
                    <button onclick="return confirm('Do you want to permanently delete this post?')" class="btn btn-danger btn-lg ml-4 mt-4">Delete Company&nbsp; <i class=" bi-trash-fill text-white-75"></i></button>
                    </form>

                    @elseif($companies->status === 'Archived' && Auth::check() && $companies->user_id == Auth::user()->id )

                    <form class="d-inline-block" method="POST" action="{{action('CompanyController@update', $companies->id)}}">
					@csrf
					@method('patch')
                    <input type="hidden" name="status" value="Retrieved">
                    <input type="hidden" name="title" value="{{$companies->title}}">
                    <input type="hidden" name="about" value="{{$companies->about}}">
                    <input type="hidden" name="contact_number" value="{{$companies->contact_number}}">
                    <input type="hidden" name="email" value="{{$companies->email}}">
                    <input type="hidden" name="address" value="{{$companies->address}}">
                    <input type="hidden" name="image" value="{{$companies->image}}">
                    <button class="btn btn-success btn-lg ml-4 mt-4" type="submit">Retrieve Company&nbsp; <i class=" bi-arrow-repeat text-white-75 mt-4"></i></button>
                    </form>
                    <form class="d-inline-block" method="POST" action="{{action('CompanyController@destroy', $companies->id)}}">
					@csrf
					@method('Delete')
                    <button onclick="return confirm('Do you want to permanently delete this post?')" class="btn btn-danger btn-lg ml-4 mt-4">Delete Company&nbsp; <i class=" bi-trash-fill text-white-75"></i></button>
                    </form>
                   @endif

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
