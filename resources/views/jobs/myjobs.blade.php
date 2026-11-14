@include('partials.header')
@include('partials.navbar')


        <!-- Masthead-->
        <header class="page-section">
   
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-left justify-content-left text-left">
                    <div class="col-lg-8 align-self-end">
                    @if(count($errors) > 0)
     <div class="alert">
      <ul>
      @foreach($errors->all() as $error)
       <li style="color:white; list-style:none"><i class="fas fa-exclamation-circle"></i>{{$error}}</li>
       @endforeach
   
       <li class="mt-2" style="color:white; list-style:none"><a>Try Again!</a></li>
       <hr class="mb-4 divider" />
      
        
       
      </ul>
     </div>
     @endif
     @if(\Session::has('success'))
     <div class="alert alert-success">
      <p>{{ \Session::get('success') }}</p>
     </div>
     @endif
    
                        <h1 class="text-white font-weight-bold">My Jobs

</h1>
                        <hr class="align-items-left justify-content-left text-left" />
                    </div>

<div class="col-lg-8 align-self-baseline">
                     @if($jobs == true)
                     @foreach($jobs as $job)
                     <div class="shadow-lg p-3 mb-5 bg-white rounded">
                  
             <h3 class="text-white font-weight-bold"><a style="text-decoration:none" href="{{route('jobs.show',$job->id)}}">{{$job->title}}

</a></h3>
                 <p class="text-muted mb-2">J{{$job->desc}}</p>
                 <a class="text-white" style="text-decoration:none"href="#">COMPANY NAME</a>              
             </div>
             @endforeach
             @else
             <h3 class="text-white font-weight-bold">No jobs found!

</h3>
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
