@include('partials.header')
@include('partials.navbar')


        <!-- Masthead-->
        <header class="masthead">
   
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
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
    
                        <h3 class="text-white font-weight-bold mb-0">Dear {{Auth::user()->name}}!

</h3>
                        <hr class="divider" style="margin-bottom:-30px;" />
                    </div>
                    <div class="row gx-4 gx-lg-5 mt-0">
                        <h5>You are not Authorized to view this page.</h5>
         
       </div>
                    
                    <div class="col-lg-8 align-self-baseline">
                      <form class="navbar-form navbar-right hidden-xs" role="search">
            <div  class="form-floating mb-3">
            <input style="background:transparent; border:4px solid white" class="form-control" id="search" type="text" name="search"  required  />
                                <label style="color:#093348; font-size:20px; font-weight:bold" class="mt-2"  for="search">Search For Employers Or Employees.....</label>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
                        <a class="btn btn-primary btn-xl" href="#about">Find IT Out  &nbsp;&nbsp; <img  src="https://img.icons8.com/material-outlined/20/FFFFFF/search--v1.png"/></a>
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
