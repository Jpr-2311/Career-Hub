@include('partials.header')
@include('partials.navbar')

<style>

.imagecont {
  position: relative;
  width: 100%;
  max-width: 400px;
}

.image {
  display: block;
  width: 100%;
  height: auto;
  
}
.img:hover{
    opacity: 0.5;
  transition: .3s ease;
}


    .overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 120px;
  width: 120px;
  opacity: 0;
  transition: .3s ease;
  background-color: transparent;
}

.imagecont:hover .overlay {
  opacity: 1;
}
.icon {
  color: white;
  font-size: 30px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.fa-edit:hover {
  color: white;
}
    </style>


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
                <h2 class="mt-0">Edit Personal Information</h2>
                <hr/>
                <!-- <p class="required">Fields marked with * are required</p> -->
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
                <form id="contactForm" method="Post" action="{{ action('UserController@update',$profile->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                
                
                    <div class="img imagecont">
                                @if($profile->image == true)
                                <img class="d-inline"style="width:120px; height:120px; border-radius:50%"class="image"src = "{{asset('storage/images/' . $profile->image)}}">
                                <div class="overlay">
  <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"class="icon" title="Edit Image">
    <i class="fa fa-edit"></i>
  </a>

  </div>
                                &nbsp;&nbsp;
                                
                                <!-- <p style="font-size:10px;">Edit Image</p> -->
                                @else
                                    <img></img>
                                    &nbsp;&nbsp;
                                @endif
        </div>
        
                            <p class="mt-4 required">Fields marked with * are required</p>       
    <div class="form-floating mb-3">
        <input class="form-control" id="first_name" type="text" name="first_name" required
               value="{{$profile->first_name}}"/>
        <label for="title">First Name*</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="last_name" type="text" name="last_name"
               value="{{$profile->last_name}}">
        <label for="about">Last Name</label>
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" id="about" type="text" name="about" style="height: 10rem"
                  required>{{$profile->about}}</textarea>
        <label for="about">About Yourself*</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="contact" type="number" name="contact_number"
               value="{{$profile->contact_number}}">
        <label for="about">Contact Number</label>
    </div>
    @if($profile->contact_show == 1)
    <div class="mb-3">
        <input type="checkbox" name="contact_show"
               value="0"
        >&nbsp;
        <label for="address">Hide Contact Number</label>
    </div>
    @else
    <div class="mb-3">
        <input type="checkbox" name="contact_show"
               value="1"
        >&nbsp;
        <label for="address">Show Contact Number</label>
    </div>
    @endif
    <div class="form-floating mb-3">
        <input class="form-control" id="email" type="email"
               name="email" value="{{$profile->email}}" required>
        <label for="email">Email*</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="address" type="text"
               name="address" value="{{$profile->address}}">
        <label for="address">Address</label>
    </div>
    @if($profile->address_show == 1)
    <div class="mb-3">
        <input type="checkbox" name="address_show"
               value="0"
        >&nbsp;
        <label for="address">Hide Address</label>
    </div>
    @else
    <div class="mb-3">
        <input type="checkbox" name="address_show"
               value="1"
        >&nbsp;
        <label for="address">Show Address</label>
    </div>
    @endif
    <div class="form-floating mb-3">
        <input class="form-control" id="country" type="text"
               name="country" value="{{$profile->country}}" required>
        <label for="about">Country*</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="city" type="text"
               name="city" value="{{$profile->city}}" required>
        <label for="about">City*</label>
    </div>
    <div class="mb-3">
        <select name="gender" class="form-control">
            <option value="{{$profile->gender?$profile->gender:''}}"
                    selected>{{$profile->gender?$profile->gender:'Select Gender'}}</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    </div>
   @if($profile->gender_show == 1)
    <div class="mb-3">
        <input type="checkbox" name="gender_show"
               value="0"
        >&nbsp;
        <label for="address">Hide Gender</label>
    </div>
    @else
    <div class="mb-3">
        <input type="checkbox" name="gender_show"
               value="1"
        >&nbsp;
        <label for="address">Show Gender</label>
    </div>
    @endif
    <div class="mb-3">
        <select name="marital_status" value="{{$profile->marital_status}}" class="form-control">
            <option value="{{$profile->marital_status?$profile->marital_status:''}}"
                    selected>{{$profile->marital_status?$profile->marital_status:'Marital Status'}}</option>
            <option>Married</option>
            <option>Unmarried</option>
            <option>Other</option>
        </select>
    </div>
    @if($profile->marital_show == 1)
    <div class="mb-3">
        <input type="checkbox" name="marital_show"
               value="0"
        >&nbsp;
        <label for="address">Hide Marital Status</label>
    </div>
    @else
    <div class="mb-3">
        <input type="checkbox" name="marital_show"
               value="1"
        >&nbsp;
        <label for="address">Show Marital Status</label>
    </div>
    @endif
    <div class="mb-3">
        <input class="form-control mt-4" id="image" type="file" name="image" value="{{$profile->image}}">
    </div>
    <div class="flex-grow-1 d-flex justify-content-end">

<button class="btn btn-primary btn-lg" type="submit">Update
 
</button>
</div>
</div>
                    
               
                </form>
            </div>
        </div>
    </div>
    <!-- <script type="text/javascript">
        document.getElementById('previousBtn').style.display = 'none';
        document.getElementById('submitButton2').style.display = 'none';
        document.getElementById('step2').style.display = 'none';

        function previous() {
            document.getElementById('previousBtn').style.display = 'none';
            document.getElementById('nextBtn').style.display = 'block';
            document.getElementById('submitButton2').style.display = 'none';

            document.getElementById('step1').style.display = 'block';
            document.getElementById('step2').style.display = 'none';
        }

        function next() {
            document.getElementById('previousBtn').style.display = 'block';
            document.getElementById('nextBtn').style.display = 'none';
            document.getElementById('submitButton2').style.display = 'block';

            document.getElementById('step1').style.display = 'none';
            document.getElementById('step2').style.display = 'block';
        }
    </script> -->
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
