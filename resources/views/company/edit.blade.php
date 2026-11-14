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
                        <h2 class="mt-0">Job Posting</h2>
                        <hr/>
                        <!-- <p class="contactuired">Fields marked with * are contact_numberuired</p> -->
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
                        @if($companies->image == true)
                         <div class="profile-pic">
                         <button style="background:transparent; border:none"type="button"data-toggle="modal" data-target="#exampleModal"> <img class="d-inline mb-4"data-toggle="tooltip" title="Click on image to edit"style="width:120px; height:120px; border-radius:100%"src = "{{asset('/storage/images/' . $companies->image)}}">
</button> </div>
@else
                         <div class="profile-pic">
                         <button style="background:transparent; border:none"type="button"data-toggle="modal" data-target="#exampleModal"> <img class="d-inline mb-4"data-toggle="tooltip" title="Click on image to edit"style="width:120px; height:120px; border-radius:100%"src="{{asset('/assets/User.png')}}">
</button></div>
                        
            @endif
   
          
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Company Image</h5>
   
      </div>
      <div class="modal-body">
      <form id="contactForm" method="POST" action="{{ action('CompanyController@update',$companies->id) }}" enctype="multipart/form-data">
          @csrf  
          {{ method_field('PUT') }}
      <input class="form-control" id="title" type="hidden" name="title" value="{{$companies->title}}" />
      <input class="form-control" id="title" type="hidden" name="about" value="{{$companies->about}}" />
      <input class="form-control" id="contact_number" type="hidden" name="contact_number" style="height: 10rem" value="{{$companies->contact_number}}">
      <input class="form-control" id="email" type="hidden" name="email" style="height: 10rem" value="{{$companies->email}}">
      <input class="form-control" id="address" type="hidden" name="address" value="{{$companies->address}}"/>
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
               
            <form id="contactForm" method="POST" action="{{ action('CompanyController@update',$companies->id) }}" enctype="multipart/form-data">
                        @csrf  
                        {{ method_field('PUT') }}
                      
                            <div class="form-floating mb-3">
                                <input class="form-control" id="title" type="text" name="title" value="{{$companies->title}}" />
                                <label  for="title">Title</label>
                                </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="about" type="text" name="about"  style="height: 10rem" value="{{$companies->about}}">{{$companies->about}}</textarea>
                                <label for="about">About Company</label>
                               </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="contact_number" type="text" name="contact_number" style="height: 10rem" value="{{$companies->contact_number}}">
                                <label for="contact_number">Phone Number</label>
                               </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" name="email" style="height: 10rem" value="{{$companies->email}}">
                                <label for="qual">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="address" type="text" name="address" value="{{$companies->address}}"/>
                                <label for="address">Address</label>
                          </div>
                          <!-- <div class="mb-3">
                          <label for="address">Company Logo</label>
                                <input class="form-control mt-4" id="image" type="file" name="image" value="{{$companies->image}}"/>
                                
                          </div> -->
                          <input type="hidden" name="status" value="{{$companies->status}}">
                            <div class="d-inline-block"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Update&nbsp; <i class=" bi-cursor-fill text-white-75"></i></button></div>
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
