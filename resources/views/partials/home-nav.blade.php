<body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-dark" href="#page-top">Career Portal</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item "><a class="nav-link text-dark" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="#services">Jobs</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="#portfolio">Resumes</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="#contact">Profile</a></li>
                        @if(Auth::check())
                        <li class="nav-item"><a class="nav-link text-primary" href="#">{{Auth::user()->name}}</a>
                        <li class="nav-item"> <a class="nav-link text-primary" href="{{ route('logout') }}"
                        
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                                 
                            </li> 
                           
                          @else
                        <li class="nav-item"><a class="nav-link text-primary" href="#register">Register</a></li>
                        <li class="nav-item"><a class="nav-link text-primary" href="#login">Login</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>