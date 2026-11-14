@include('partials.header')
@include('partials.navbar')

<style>
    :root {
        --career-primary: #2563eb;
        --career-primary-dark: #1d4ed8;
        --career-dark: #0f172a;
        --career-text: #1e293b;
        --career-muted: #64748b;
        --career-light: #f8fafc;
        --career-border: #e2e8f0;
    }

    body {
        font-family: 'Nunito', sans-serif;
        color: var(--career-text);
        background: #ffffff;
    }

    .career-hero {
        min-height: 650px;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        background: linear-gradient(120deg, rgba(15, 23, 42, 0.97), rgba(30, 64, 175, 0.90)),
        url("{{ asset('assets/img/bg-masthead.jpg') }}") center/cover;
    }

    .career-hero::before {
        content: "";
        position: absolute;
        width: 420px;
        height: 420px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.06);
        top: -160px;
        right: -100px;
    }

    .career-hero::after {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        bottom: -150px;
        left: -80px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        padding: 90px 0;
    }

    .hero-badge {
        display: inline-block;
        padding: 8px 16px;
        border: 1px solid rgba(255, 255, 255, 0.25);
        border-radius: 50px;
        color: #ffffff;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 22px;
        background: rgba(255, 255, 255, 0.08);
    }

    .hero-title {
        color: #ffffff;
        font-size: 56px;
        line-height: 1.12;
        font-weight: 800;
        margin-bottom: 22px;
        letter-spacing: -1.5px;
    }

    .hero-title span {
        color: #93c5fd;
    }

    .hero-description {
        max-width: 650px;
        color: #dbeafe;
        font-size: 18px;
        line-height: 1.7;
        margin-bottom: 35px;
    }

    .hero-buttons {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }

    .hero-btn {
        padding: 13px 26px;
        border-radius: 8px;
        font-weight: 700;
        text-decoration: none;
        transition: 0.2s ease;
    }

    .hero-btn-primary {
        background: #ffffff;
        color: var(--career-primary);
    }

    .hero-btn-primary:hover {
        color: var(--career-primary-dark);
        transform: translateY(-2px);
        text-decoration: none;
    }

    .hero-btn-outline {
        border: 1px solid rgba(255, 255, 255, 0.5);
        color: #ffffff;
    }

    .hero-btn-outline:hover {
        color: #ffffff;
        background: rgba(255, 255, 255, 0.1);
        text-decoration: none;
    }

    .search-section {
        margin-top: -55px;
        position: relative;
        z-index: 5;
    }

    .search-card {
        background: #ffffff;
        border-radius: 14px;
        padding: 25px;
        box-shadow: 0 15px 45px rgba(15, 23, 42, 0.12);
        border: 1px solid var(--career-border);
    }

    .search-card-title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 18px;
        color: var(--career-dark);
    }

    .search-input {
        height: 52px;
        border: 1px solid var(--career-border);
        border-radius: 8px;
        padding: 0 16px;
        box-shadow: none !important;
    }

    .search-input:focus {
        border-color: var(--career-primary);
    }

    .search-btn {
        height: 52px;
        border: none;
        border-radius: 8px;
        background: var(--career-primary);
        color: #ffffff;
        font-weight: 700;
        padding: 0 25px;
    }

    .search-btn:hover {
        background: var(--career-primary-dark);
    }

    .section {
        padding: 90px 0;
    }

    .section-light {
        background: var(--career-light);
    }

    .section-heading {
        max-width: 650px;
        margin: 0 auto 50px;
        text-align: center;
    }

    .section-heading h2 {
        color: var(--career-dark);
        font-size: 34px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .section-heading p {
        color: var(--career-muted);
        font-size: 16px;
        line-height: 1.7;
        margin: 0;
    }

    .feature-card {
        height: 100%;
        background: #ffffff;
        border: 1px solid var(--career-border);
        border-radius: 14px;
        padding: 30px 25px;
        transition: 0.25s ease;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(15, 23, 42, 0.08);
        border-color: #bfdbfe;
    }

    .feature-icon {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        background: #eff6ff;
        color: var(--career-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
        font-weight: 800;
        margin-bottom: 20px;
    }

    .feature-card h3 {
        font-size: 19px;
        font-weight: 700;
        color: var(--career-dark);
        margin-bottom: 10px;
    }

    .feature-card p {
        color: var(--career-muted);
        font-size: 14px;
        line-height: 1.7;
        margin: 0;
    }

    .steps-card {
        text-align: center;
        padding: 20px;
    }

    .step-number {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: var(--career-primary);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px;
        font-size: 18px;
        font-weight: 800;
    }

    .steps-card h3 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .steps-card p {
        color: var(--career-muted);
        font-size: 14px;
        line-height: 1.6;
    }

    .about-box {
        background: var(--career-dark);
        border-radius: 18px;
        padding: 55px;
        color: #ffffff;
    }

    .about-box h2 {
        font-size: 34px;
        font-weight: 800;
        margin-bottom: 18px;
    }

    .about-box p {
        color: #cbd5e1;
        line-height: 1.8;
        margin-bottom: 25px;
    }

    .about-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .about-list li {
        margin-bottom: 12px;
        color: #e2e8f0;
    }

    .about-list li::before {
        content: "✓";
        color: #93c5fd;
        font-weight: 800;
        margin-right: 10px;
    }

    .cta-section {
        background: #eff6ff;
        padding: 75px 0;
        text-align: center;
    }

    .cta-section h2 {
        font-size: 34px;
        font-weight: 800;
        color: var(--career-dark);
        margin-bottom: 14px;
    }

    .cta-section p {
        color: var(--career-muted);
        max-width: 600px;
        margin: 0 auto 25px;
        line-height: 1.7;
    }

    .cta-btn {
        display: inline-block;
        padding: 13px 28px;
        border-radius: 8px;
        background: var(--career-primary);
        color: #ffffff;
        font-weight: 700;
        text-decoration: none;
    }

    .cta-btn:hover {
        background: var(--career-primary-dark);
        color: #ffffff;
        text-decoration: none;
    }

    .alert {
        border-radius: 8px;
        margin-bottom: 20px;
    }

    @media (max-width: 991px) {
        .hero-title {
            font-size: 44px;
        }

        .career-hero {
            min-height: 600px;
        }
    }

    @media (max-width: 767px) {
        .hero-content {
            padding: 70px 0;
        }

        .hero-title {
            font-size: 36px;
        }

        .hero-description {
            font-size: 16px;
        }

        .section {
            padding: 65px 0;
        }

        .section-heading h2,
        .about-box h2,
        .cta-section h2 {
            font-size: 28px;
        }

        .about-box {
            padding: 35px 25px;
        }

        .search-section {
            margin-top: -35px;
        }
    }
</style>

<!-- Hero Section -->
<header class="career-hero">

    <div class="container">
        <div class="hero-content">

            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(\Session::has('success'))
            <div class="alert alert-success">
                {{ \Session::get('success') }}
            </div>
            @endif

            <div class="hero-badge">
                Your Career Starts Here
            </div>

            <h1 class="hero-title">
                Find the right job.<br>
                Build your <span>future.</span>
            </h1>

            <p class="hero-description">
                CareerHub connects talented professionals with companies looking
                for the right people. Discover opportunities, apply for jobs,
                and take the next step in your career.
            </p>

            <div class="hero-buttons">

                <a href="#search" class="hero-btn hero-btn-primary">
                    Find Jobs
                </a>

                @guest
                <a href="#register" class="hero-btn hero-btn-outline">
                    Create Account
                </a>
                @else
                <a href="{{ url('/home') }}" class="hero-btn hero-btn-outline">
                    Go to Dashboard
                </a>
                @endguest

            </div>

        </div>
    </div>

</header>


<!-- Search Section -->
<section class="search-section" id="search">

    <div class="container">

        <div class="search-card">

            <div class="search-card-title">
                Search for your next opportunity
            </div>

            <form method="GET" action="{{ route('job') }}">

                <div class="row">

                    <div class="col-lg-5 mb-3 mb-lg-0">

                        <input
                            type="text"
                            name="search"
                            class="form-control search-input"
                            placeholder="Job title, keyword or company"
                            value="{{ request('search') }}">

                    </div>

                    <div class="col-lg-4 mb-3 mb-lg-0">

                        <input
                            type="text"
                            name="location"
                            class="form-control search-input"
                            placeholder="Location"
                            value="{{ request('location') }}">

                    </div>

                    <div class="col-lg-3">

                        <button type="submit" class="search-btn w-100">
                            Search Jobs
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</section>


<!-- Features Section -->
<section class="section" id="services">

    <div class="container">

        <div class="section-heading">

            <h2>Everything you need for your job search</h2>

            <p>
                CareerHub makes it easier to discover opportunities,
                connect with employers, and manage your career journey.
            </p>

        </div>

        <div class="row">

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        J
                    </div>

                    <h3>Find Jobs</h3>

                    <p>
                        Search and explore job opportunities based on
                        your skills, interests, and career goals.
                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        P
                    </div>

                    <h3>Build Your Profile</h3>

                    <p>
                        Create a professional profile that helps
                        employers understand your skills and experience.
                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        A
                    </div>

                    <h3>Apply Easily</h3>

                    <p>
                        Find suitable positions and submit your
                        applications through a simple process.
                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        C
                    </div>

                    <h3>Connect with Employers</h3>

                    <p>
                        Help companies discover talented candidates
                        for their available positions.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- How It Works -->
<section class="section section-light">

    <div class="container">

        <div class="section-heading">

            <h2>How CareerHub Works</h2>

            <p>
                A simple process for candidates and employers.
            </p>

        </div>

        <div class="row">

            <div class="col-md-4 mb-4">

                <div class="steps-card">

                    <div class="step-number">
                        01
                    </div>

                    <h3>Create Your Account</h3>

                    <p>
                        Register on CareerHub and create your professional profile.
                    </p>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="steps-card">

                    <div class="step-number">
                        02
                    </div>

                    <h3>Explore Opportunities</h3>

                    <p>
                        Browse available positions and find opportunities
                        that match your skills.
                    </p>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="steps-card">

                    <div class="step-number">
                        03
                    </div>

                    <h3>Apply & Connect</h3>

                    <p>
                        Submit applications and connect with potential employers.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- About Section -->
<section class="section">

    <div class="container">

        <div class="about-box">

            <div class="row align-items-center">

                <div class="col-lg-7 mb-4 mb-lg-0">

                    <h2>
                        Connecting talent with opportunity
                    </h2>

                    <p>
                        CareerHub is designed to make recruitment simpler
                        for both job seekers and employers. Candidates can
                        discover relevant opportunities while companies can
                        find people with the skills they need.
                    </p>

                    <ul class="about-list">

                        <li>
                            Simple and user-friendly job search
                        </li>

                        <li>
                            Professional candidate profiles
                        </li>

                        <li>
                            Easy application process
                        </li>

                        <li>
                            Employer and candidate focused experience
                        </li>

                    </ul>

                </div>

                <div class="col-lg-5">

                    <div class="bg-white text-dark rounded p-4">

                        <h4 class="font-weight-bold mb-3">
                            Looking for your next opportunity?
                        </h4>

                        <p class="text-muted mb-4">
                            Create your account and start exploring
                            opportunities today.
                        </p>

                        @guest

                        <a href="#register" class="cta-btn">
                            Get Started
                        </a>

                        @else

                        <a href="{{ url('/home') }}" class="cta-btn">
                            Open Dashboard
                        </a>

                        @endguest

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- Register Section -->
@guest

<section class="section section-light" id="register">

    <div class="container">

        <div class="section-heading">

            <h2>Create Your CareerHub Account</h2>

            <p>
                Join CareerHub and start exploring career opportunities.
            </p>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-7">

                <form method="POST" action="{{ route('register') }}">

                    @csrf

                    <div class="form-group">

                        <label for="register-name">
                            Full Name
                        </label>

                        <input
                            type="text"
                            id="register-name"
                            class="form-control form-control-lg"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name">

                    </div>

                    <div class="form-group">

                        <label for="register-email">
                            Email Address
                        </label>

                        <input
                            type="email"
                            id="register-email"
                            class="form-control form-control-lg"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email">

                    </div>

                    <div class="form-group">

                        <label for="register-password">
                            Password
                        </label>

                        <input
                            type="password"
                            id="register-password"
                            class="form-control form-control-lg"
                            name="password"
                            required
                            autocomplete="new-password">

                    </div>

                    <div class="form-group">

                        <label for="register-password-confirm">
                            Confirm Password
                        </label>

                        <input
                            type="password"
                            id="register-password-confirm"
                            class="form-control form-control-lg"
                            name="password_confirmation"
                            required
                            autocomplete="new-password">

                    </div>

                    <button type="submit" class="search-btn w-100">
                        Create Account
                    </button>

                    <p class="text-center text-muted mt-3 mb-0">
                        Already have an account?
                        <a href="#login">
                            Login here
                        </a>
                    </p>

                </form>

            </div>

        </div>

    </div>

</section>

@endguest


<!-- Login Section -->
@guest

<section class="section" id="login">

    <div class="container">

        <div class="section-heading">

            <h2>Welcome Back</h2>

            <p>
                Login to continue exploring CareerHub.
            </p>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-6">

                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    <div class="form-group">

                        <label for="login-email">
                            Email Address
                        </label>

                        <input
                            type="email"
                            id="login-email"
                            class="form-control form-control-lg"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email">

                    </div>

                    <div class="form-group">

                        <label for="login-password">
                            Password
                        </label>

                        <input
                            type="password"
                            id="login-password"
                            class="form-control form-control-lg"
                            name="password"
                            required
                            autocomplete="current-password">

                    </div>

                    <button type="submit" class="search-btn w-100">
                        Login
                    </button>

                    <p class="text-center text-muted mt-3 mb-0">
                        Don't have an account?
                        <a href="#register">
                            Register here
                        </a>
                    </p>

                </form>

            </div>

        </div>

    </div>

</section>

@endguest


<!-- CTA -->
<section class="cta-section">

    <div class="container">

        <h2>Ready to take the next step?</h2>

        <p>
            Discover opportunities, showcase your skills, and connect
            with employers through CareerHub.
        </p>

        @guest

        <a href="#register" class="cta-btn">
            Create Your Account
        </a>

        @else

        <a href="{{ url('/home') }}" class="cta-btn">
            Go to Dashboard
        </a>

        @endguest

    </div>

</section>


<!-- Footer -->
@include('partials.footer')


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- SimpleLightbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>

<!-- Core Theme JS -->
<script src="{{ asset('js/scripts.js') }}"></script>

</body>

</html>