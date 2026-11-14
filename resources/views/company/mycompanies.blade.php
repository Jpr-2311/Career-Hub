@include('partials.header')
@include('partials.navbar')

<style>
    .profile-pic {
	position: relative;
	display: inline-block;
}
img:hover {
	opacity: 0.1;
}
.profile-pic:hover .edit {
	display: block;
    
}


.edit {
	padding-top: 7px;	
	padding-right: 7px;
	position: absolute;
	right: 0;
	top: 0;
	display: none;
}

.edit a {
	color: #000;
}
    </style>
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
    
                        <h1 class="text-white font-weight-bold">My Companies

</h1>
                        <hr class="align-items-left justify-content-left text-left" />
                    </div>





<div class="col-lg-8 align-self-baseline">
                     @if($companies == true)
                     @foreach($companies as $company)
                     <div class="shadow-lg p-3 mb-5 bg-white rounded">
                       
                     @if($company->image == true)
                         <div class="profile-pic">
                         <button style="background:transparent; border:none"type="button"data-toggle="modal" data-target="#exampleModal"> <img class="d-inline mb-4"style="width:120px; height:120px; border-radius:100%"src = "{{asset('/storage/images/' . $company->image)}}"> </div>
          
                     <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Company Image</h5>
   
      </div>
      <div class="modal-body">
      <form id="contactForm" method="POST" action="{{ action('CompanyController@update',$company->id) }}" enctype="multipart/form-data">
          @csrf  
          {{ method_field('PUT') }}
      <input class="form-control" id="title" type="hidden" name="title" value="{{$company->title}}" />
      <input class="form-control" id="title" type="hidden" name="about" value="{{$company->about}}" />
      <input class="form-control" id="contact_number" type="hidden" name="contact_number" style="height: 10rem" value="{{$company->contact_number}}">
      <input class="form-control" id="email" type="hidden" name="email" style="height: 10rem" value="{{$company->email}}">
      <input class="form-control" id="address" type="hidden" name="address" value="{{$company->address}}"/>
      <input type="hidden" name="status" value="Active">
      <input class="form-control" type="file" name="image" />
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
            @else
            <div class="profile-pic">
                <img class="d-inline mb-4"style="width:120px; height:120px; border-radius:100%"src = "assets/User.png">
 </div>
@endif
            &nbsp;&nbsp; <h3 class="text-white font-weight-bold d-inline"><a style="text-decoration:none" href="{{route('companies.show',$company->id)}}">{{$company->title}}

</a></h3>
                 <p class="text-muted mb-2 mt-4">J{{$company->about}}</p>
                 <a class="text-white" style="text-decoration:none"href="#">Vacancies Available</a>              
             </div>
             @endforeach
             @else
             <h3 class="text-white font-weight-bold">No companies found!

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
            <!--Tooltip-->
            <script>
        $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
        </script>

      <!--Modal-->
      <script>
      $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
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
