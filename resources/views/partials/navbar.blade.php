@extends('partials.header')
<body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">CareerHub</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item dropdown">
                            <a class="nav-link h-link">
                            Home
                        </a>
                        <ul class="dropdown-content">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#portfolio">Our Customers</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#contact">Contact</a></li>
                    </ul>
                     </li>
                        <li class="nav-item "><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item dropdown">
                            <a class="nav-link">
                            Jobs
                        </a>
                        <ul class="dropdown-content">
                        <li class="nav-item "><a class="nav-link" href="{{route('job')}}"> View All Jobs</a></li>
                        @if(Auth::check())
                        <li class="nav-item "><a class="nav-link" href="{{route('create-job')}}">Post Jobs</a></li>
                        <li class="nav-item "><a class="nav-link" href="{{route('archives')}}">Archived Jobs</a></li>
                        <li class="nav-item "><a class="nav-link" href="{{route('closed')}}">Closed Jobs</a></li>
                        <li class="nav-item "><a class="nav-link" href="{{route('declined')}}">Declined Jobs</a></li>
                        <li class="nav-item "><a class="nav-link" href="{{route('myjobs')}}">My Job Posts</a></li>
                        @else
                        <li class="nav-item "><a class="nav-link" href="/#login">Post Job</a></li>
                        @endif
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                            <a class="nav-link">
                            Companies
                        </a>
                        <ul class="dropdown-content">
                        <li class="nav-item "><a class="nav-link" href="{{route('company')}}"> View All Companies</a></li>
                        @if(Auth::check())
                        <li class="nav-item "><a class="nav-link" href="{{route('create-company')}}">Register Company</a></li>
                        <li class="nav-item "><a class="nav-link" href="{{route('company-archives')}}">Archived Companies</a></li>
                        <li class="nav-item "><a class="nav-link" href="{{route('company-declined')}}">Declined Companies</a></li>
                        <li class="nav-item "><a class="nav-link" href="{{route('mycompanies')}}">My Companies</a></li>
                        @else
                        <li class="nav-item "><a class="nav-link" href="/#login">Register Company</a></li>
                        @endif
                    </ul>
                    </li>
                    @if(Auth::Check())
                    <li class="nav-item dropdown">
                            <a class="nav-link">
                            {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-content">
                        <li class="nav-item"><a class="nav-link" href="/#services">  Recommended Jobs</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#services"> Resumes</a></li>
                        @if(Auth::check() && Auth::user()->isProfile == 0)
                        <li class="nav-item"><a class="nav-link" href="{{route('create-profile')}}"> My Profile</a></li>
                        @else
                         <li class="nav-item"><a class="nav-link" href="{{route('users.show',Auth::user()->id)}}"> My Profile</a></li>
                         @endif
                        <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}"> Dashboard</a>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form></a>
                        </li>
                    </ul>
                    </li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="/#register">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#login">Login</a></li>
                        @endif
                        <li class="nav-item"><a href="{{route('create-job')}}"><div class="d-inline-block"><button class="btn btn-md" style="padding:0px 10px" id="submitButton" type="submit"><i class="bi bi-bell-fill"></i></button></div></a></li>
                        <li class="nav-item"><a href="{{route('create-job')}}"><div class="d-inline-block"><button class="btn btn-md" style="padding:0px 10px" id="submitButton" type="submit"><i class="bi bi-chat-left-dots-fill"></i></button></div></a></li>
                        @if(Auth::check() && Auth::user()->role === NULL)
                        <li class="nav-item"><a href="{{route('create-job')}}"><div class="d-inline-block"><button class="btn btn-danger btn-md" style="padding:0px 10px" id="submitButton" type="submit">Post Job</button></div></a></li>
                        @elseif(Auth::check() && Auth::user()->role == 1)
                        <li class="nav-item"><a href="{{route('admin-dashboard')}}"><div class="d-inline-block"><button class="btn btn-primary btn-md" style="padding:0px 10px" id="submitButton" type="submit">Admin Dashboard</button></div></a></li>
                        @else
                        <li class="nav-item"><a href="/#login"><div class="d-inline-block"><button class="btn btn-danger btn-md" style="padding:0px 10px" id="submitButton" type="submit">Post Job</button></div></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>


