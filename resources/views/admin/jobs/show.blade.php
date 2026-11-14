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
                            
                        <h1 class="text-white font-weight-bold">{{$jobs->title}}

</h1>
<hr class="devider"/>
<p class="text-muted mb-2">{{$jobs->desc}}</p>
</div>
                        <hr class="devider"/>
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                     
                            <div class="shadow-lg p-3 mb-5 bg-white rounded" style="width:150%">
                            
                           
                    <h4 class="text-white font-weight-bold mt-4">Requirements

</h4>
<p class="text-muted mb-2">{{$jobs->req}}</p>
<h4 class="text-white font-weight-bold mt-4">Qualification

</h4>
<p class="text-muted mb-2">{{$jobs->qual}}</p>
<h4 class="text-white font-weight-bold mt-4">Salary
</h4>
<p class="text-muted mb-2">{{$jobs->salary}}</p>

<h4 class="text-white font-weight-bold mt-4">Perks & Benifits

</h4>
<p class="text-muted mb-2">{{$jobs->perk}}</p>
<h4 class="text-white font-weight-bold mt-4">About Company

</h4>
<p class="text-muted mb-2">{{$jobs->about}}</p>



                    <!-- </div> -->
                                  
                    @if($jobs->status === 'Active')
                                       <!-- <form method="POST" action="{{action('JobsController@destroy', $jobs->id)}}">
					@csrf
					@method('Delete') -->
                       <form class="d-inline-block" method="POST" action="{{action('JobsController@update', $jobs->id)}}">
					@csrf
					@method('patch')
                    <input type="hidden" name="status" value="Archived">
                    <input type="hidden" name="reason" value="{{$jobs->reason}}">
                    <input type="hidden" name="title" value="{{$jobs->title}}">
                    <input type="hidden" name="desc" value="{{$jobs->desc}}">
                    <input type="hidden" name="req" value="{{$jobs->req}}">
                    <input type="hidden" name="qual" value="{{$jobs->qual}}">
                    <input type="hidden" name="salary" value="{{$jobs->salary}}">
                    <input type="hidden" name="perk" value="{{$jobs->perk}}">
                    <input type="hidden" name="about" value="{{$jobs->about}}">
                    <button class="btn btn-secondary btn-lg ml-4" type="submit">Archive Job Post&nbsp; <i class=" bi-heart-fill text-white-75"></i></button>
                    <a class="btn btn-primary btn-lg ml-4" href="{{route('jobs.edit',$jobs->id)}}">Edit Job Details&nbsp; <i class=" bi-pencil-square text-white-75"></i></a>
                    </form>
                    <form class="d-inline-block" method="POST" action="{{action('JobsController@destroy', $jobs->id)}}">
					@csrf
					@method('Delete')
                    <button onclick="return confirm('Do you want to permanently delete this post?')" class="btn btn-danger btn-lg ml-4">Delete Job Post&nbsp; <i class=" bi-trash-fill text-white-75"></i></button>
                    </form>
        
                    @elseif($jobs->status === 'Archived')
                      
                    <form class="d-inline-block" method="POST" action="{{action('JobsController@update', $jobs->id)}}">
					@csrf
					@method('patch')
                    <input type="hidden" name="status" value="Active">
                    <input type="hidden" name="reason" value="{{$jobs->reason}}">
                    <input type="hidden" name="title" value="{{$jobs->title}}">
                    <input type="hidden" name="desc" value="{{$jobs->desc}}">
                    <input type="hidden" name="req" value="{{$jobs->req}}">
                    <input type="hidden" name="qual" value="{{$jobs->qual}}">
                    <input type="hidden" name="salary" value="{{$jobs->salary}}">
                    <input type="hidden" name="perk" value="{{$jobs->perk}}">
                    <input type="hidden" name="about" value="{{$jobs->about}}">
                    <button class="btn btn-success btn-lg ml-4" type="submit">Retrieve Job Post&nbsp; <i class=" bi-arrow-repeat text-white-75"></i></button>
                    </form>
                    <form class="d-inline-block" method="POST" action="{{action('JobsController@destroy', $jobs->id)}}">
					@csrf
					@method('Delete')
                    <button onclick="return confirm('Do you want to permanently delete this post?')" class="btn btn-danger btn-lg ml-4">Delete Job Post&nbsp; <i class=" bi-trash-fill text-white-75"></i></button>
                    </form>
                    @else
                    <a class="btn btn-danger btn-lg ml-4" href="#about">Apply Now&nbsp; <i class=" bi-cursor-fill text-white-75"></i></a>
<a class="btn btn-success btn-lg" href="#about">Save Job&nbsp; <i class=" bi-heart-fill text-white-75"></i></a>
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
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
