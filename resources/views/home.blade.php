@extends('layouts.app')

@section('content')

<style>
    .career-dashboard {
        background: #f7f8fc;
        min-height: calc(100vh - 70px);
        padding: 40px 0;
    }

    .welcome-section {
        margin-bottom: 30px;
    }

    .welcome-section h1 {
        font-size: 32px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 8px;
    }

    .welcome-section p {
        color: #6b7280;
        font-size: 16px;
        margin: 0;
    }

    .dashboard-card {
        background: #ffffff;
        border: none;
        border-radius: 14px;
        padding: 25px;
        height: 100%;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .stat-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stat-info h3 {
        font-size: 28px;
        font-weight: 700;
        color: #1f2937;
        margin: 0 0 5px;
    }

    .stat-info p {
        color: #6b7280;
        margin: 0;
        font-size: 14px;
    }

    .stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        background: #eef2ff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4f46e5;
        font-size: 21px;
        font-weight: 700;
    }

    .section-title {
        font-size: 20px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 20px;
    }

    .quick-action {
        display: block;
        padding: 20px;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        color: #1f2937;
        text-decoration: none;
        transition: all 0.2s ease;
        height: 100%;
    }

    .quick-action:hover {
        text-decoration: none;
        color: #4f46e5;
        border-color: #c7d2fe;
        transform: translateY(-2px);
    }

    .quick-action h5 {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 7px;
    }

    .quick-action p {
        font-size: 13px;
        color: #6b7280;
        margin: 0;
    }

    .profile-box {
        display: flex;
        align-items: center;
        padding: 18px;
        background: #f9fafb;
        border-radius: 12px;
    }

    .profile-avatar {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: #4f46e5;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: 700;
        margin-right: 15px;
    }

    .profile-box h5 {
        margin: 0 0 4px;
        font-weight: 700;
        color: #1f2937;
    }

    .profile-box p {
        margin: 0;
        color: #6b7280;
        font-size: 13px;
    }

    .status-box {
        padding: 18px;
        border-radius: 12px;
        background: #f9fafb;
        margin-bottom: 12px;
    }

    .status-box:last-child {
        margin-bottom: 0;
    }

    .status-box strong {
        display: block;
        color: #1f2937;
        margin-bottom: 5px;
    }

    .status-box span {
        color: #6b7280;
        font-size: 13px;
    }

    @media (max-width: 768px) {
        .career-dashboard {
            padding: 25px 0;
        }

        .welcome-section h1 {
            font-size: 26px;
        }
    }
</style>

<div class="career-dashboard">

    <div class="container">

        <!-- Welcome -->
        <div class="welcome-section">
            <h1>
                Welcome back, {{ Auth::user()->name }}
            </h1>

            <p>
                Manage your job search and keep track of your career opportunities.
            </p>
        </div>

        <!-- Statistics -->
        <div class="row mb-4">

            <div class="col-md-4 mb-4">
                <div class="dashboard-card stat-card">

                    <div class="stat-info">
                        <h3>0</h3>
                        <p>Applications</p>
                    </div>

                    <div class="stat-icon">
                        A
                    </div>

                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="dashboard-card stat-card">

                    <div class="stat-info">
                        <h3>0</h3>
                        <p>Saved Jobs</p>
                    </div>

                    <div class="stat-icon">
                        S
                    </div>

                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="dashboard-card stat-card">

                    <div class="stat-info">
                        <h3>0</h3>
                        <p>Profile Views</p>
                    </div>

                    <div class="stat-icon">
                        V
                    </div>

                </div>
            </div>

        </div>

        <div class="row">

            <!-- Quick Actions -->
            <div class="col-lg-8 mb-4">

                <div class="dashboard-card">

                    <h2 class="section-title">
                        Quick Actions
                    </h2>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <a href="{{ url('/') }}" class="quick-action">

                                <h5>Browse Jobs</h5>

                                <p>
                                    Explore available job opportunities and find your next role.
                                </p>

                            </a>
                        </div>

                        <div class="col-md-6 mb-3">
                            <a href="{{ url('/') }}" class="quick-action">

                                <h5>Explore Opportunities</h5>

                                <p>
                                    Discover new career opportunities that match your interests.
                                </p>

                            </a>
                        </div>

                        <div class="col-md-6 mb-3">
                            <a href="{{ url('/') }}" class="quick-action">

                                <h5>Update Profile</h5>

                                <p>
                                    Keep your professional information up to date.
                                </p>

                            </a>
                        </div>

                        <div class="col-md-6 mb-3">
                            <a href="{{ url('/') }}" class="quick-action">

                                <h5>My Applications</h5>

                                <p>
                                    Track the status of your submitted job applications.
                                </p>

                            </a>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Profile -->
            <div class="col-lg-4 mb-4">

                <div class="dashboard-card">

                    <h2 class="section-title">
                        My Profile
                    </h2>

                    <div class="profile-box">

                        <div class="profile-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <div>
                            <h5>{{ Auth::user()->name }}</h5>
                            <p>{{ Auth::user()->email }}</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Application Status -->
        <div class="row">

            <div class="col-12">

                <div class="dashboard-card">

                    <h2 class="section-title">
                        Application Overview
                    </h2>

                    <div class="row">

                        <div class="col-md-4 mb-3 mb-md-0">

                            <div class="status-box">

                                <strong>Pending Applications</strong>

                                <span>
                                    Applications waiting for review
                                </span>

                            </div>

                        </div>

                        <div class="col-md-4 mb-3 mb-md-0">

                            <div class="status-box">

                                <strong>Shortlisted</strong>

                                <span>
                                    Applications selected for the next stage
                                </span>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="status-box">

                                <strong>Completed</strong>

                                <span>
                                    Track your completed applications
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection