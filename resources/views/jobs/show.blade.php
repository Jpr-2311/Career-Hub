@include('partials.header')
@include('partials.navbar')

<style>
    .job-details-page {
        background: #f6f8fc;
        min-height: 100vh;
        padding: 90px 0 70px;
    }

    .job-header {
        background: linear-gradient(135deg, #0d47a1, #1565c0);
        color: #fff;
        padding: 60px 20px;
        margin-bottom: 35px;
    }

    .job-header h1 {
        font-size: 40px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .job-header p {
        font-size: 16px;
        opacity: .9;
        margin-bottom: 0;
    }

    .job-status {
        display: inline-block;
        background: rgba(255, 255, 255, .15);
        border: 1px solid rgba(255, 255, 255, .3);
        padding: 7px 14px;
        border-radius: 20px;
        font-size: 13px;
        margin-top: 18px;
    }

    .details-card {
        background: #fff;
        border: 1px solid #e5e9f2;
        border-radius: 14px;
        padding: 32px;
        margin-bottom: 24px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, .04);
    }

    .details-card h3 {
        color: #16213e;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .details-card p {
        color: #667085;
        line-height: 1.8;
        margin-bottom: 25px;
    }

    .company-name {
        color: #1565c0;
        font-weight: 600;
        text-decoration: none;
    }

    .company-name:hover {
        text-decoration: underline;
    }

    .job-info {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin-bottom: 25px;
    }

    .info-box {
        background: #f6f8fc;
        border-radius: 10px;
        padding: 18px;
    }

    .info-box span {
        display: block;
        color: #667085;
        font-size: 13px;
        margin-bottom: 5px;
    }

    .info-box strong {
        color: #16213e;
        font-size: 15px;
    }

    .action-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 30px;
    }

    .btn-career {
        border: none;
        border-radius: 7px;
        padding: 11px 20px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
    }

    .btn-apply {
        background: #1565c0;
        color: #fff;
    }

    .btn-apply:hover {
        background: #0d47a1;
        color: #fff;
    }

    .btn-save {
        background: #eef4ff;
        color: #1565c0;
    }

    .btn-save:hover {
        background: #dce9ff;
        color: #1565c0;
    }

    .btn-secondary-custom {
        background: #667085;
        color: #fff;
    }

    .btn-secondary-custom:hover {
        background: #475467;
        color: #fff;
    }

    .btn-danger-custom {
        background: #dc3545;
        color: #fff;
    }

    .btn-danger-custom:hover {
        background: #bb2d3b;
        color: #fff;
    }

    .btn-warning-custom {
        background: #f59e0b;
        color: #fff;
    }

    .btn-warning-custom:hover {
        background: #d97706;
        color: #fff;
    }

    .alert {
        border-radius: 8px;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .job-details-page {
            padding-top: 50px;
        }

        .job-header {
            padding: 45px 20px;
        }

        .job-header h1 {
            font-size: 30px;
        }

        .details-card {
            padding: 22px;
        }

        .job-info {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-career {
            width: 100%;
            text-align: center;
        }
    }
</style>


<div class="job-details-page">

    <!-- Job Header -->
    <section class="job-header">
        <div class="container">

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

            <h1>{{ $jobs->title }}</h1>

            <p>
                Explore this opportunity and learn more about the role,
                requirements and company.
            </p>

            @if($jobs->status)
            <span class="job-status">
                {{ $jobs->status }}
            </span>
            @endif

        </div>
    </section>


    <div class="container">

        <div class="row">

            <!-- Main Content -->
            <div class="col-lg-8">

                <div class="details-card">

                    <h3>Job Description</h3>

                    <p>
                        {{ $jobs->desc }}
                    </p>

                    @if($jobs->req)
                    <h3>Requirements</h3>

                    <p>
                        {{ $jobs->req }}
                    </p>
                    @endif

                    @if($jobs->qual)
                    <h3>Qualification</h3>

                    <p>
                        {{ $jobs->qual }}
                    </p>
                    @endif

                    @if($jobs->perk)
                    <h3>Perks & Benefits</h3>

                    <p>
                        {{ $jobs->perk }}
                    </p>
                    @endif

                </div>


                <!-- Company -->
                <div class="details-card">

                    <h3>About the Company</h3>

                    @php
                    $jobCompany = $companies->firstWhere('id', $jobs->company);
                    @endphp

                    @if($jobCompany)

                    <p>
                        <a
                            href="{{ route('companies.show', $jobCompany->id) }}"
                            class="company-name">
                            {{ $jobCompany->title }}
                        </a>
                    </p>

                    @if($jobCompany->about)
                    <p>
                        {{ $jobCompany->about }}
                    </p>
                    @endif

                    @else

                    <p>
                        Company information is currently unavailable.
                    </p>

                    @endif

                </div>

            </div>


            <!-- Sidebar -->
            <div class="col-lg-4">

                <div class="details-card">

                    <h3>Job Overview</h3>

                    <div class="job-info">

                        @if($jobs->salary)
                        <div class="info-box">
                            <span>Salary</span>
                            <strong>{{ $jobs->salary }}</strong>
                        </div>
                        @endif

                        @if($jobs->qual)
                        <div class="info-box">
                            <span>Qualification</span>
                            <strong>{{ $jobs->qual }}</strong>
                        </div>
                        @endif

                        <div class="info-box">
                            <span>Status</span>
                            <strong>{{ $jobs->status }}</strong>
                        </div>

                        <div class="info-box">
                            <span>Posted</span>
                            <strong>{{ $jobs->created_at->format('M d, Y') }}</strong>
                        </div>

                    </div>


                    @if(Auth::check() && $jobs->user_id == Auth::user()->id)

                    <!-- Archive / Retrieve -->
                    <div class="action-buttons">

                        @if($jobs->status === 'Active' || $jobs->status === 'Retrieved')

                        <form method="POST"
                            action="{{ action('JobsController@update', $jobs->id) }}">

                            @csrf
                            @method('patch')

                            <input type="hidden" name="reason" value="{{ $jobs->reason }}">
                            <input type="hidden" name="title" value="{{ $jobs->title }}">
                            <input type="hidden" name="desc" value="{{ $jobs->desc }}">
                            <input type="hidden" name="req" value="{{ $jobs->req }}">
                            <input type="hidden" name="qual" value="{{ $jobs->qual }}">
                            <input type="hidden" name="salary" value="{{ $jobs->salary }}">
                            <input type="hidden" name="perk" value="{{ $jobs->perk }}">
                            <input type="hidden" name="about" value="{{ $jobs->about }}">
                            <input type="hidden" name="company" value="{{ $jobs->company }}">
                            <input type="hidden" name="status" value="Archived">

                            <button class="btn-career btn-secondary-custom" type="submit">
                                Archive Job
                            </button>

                        </form>

                        @elseif($jobs->status === 'Archived')

                        <form method="POST"
                            action="{{ action('JobsController@update', $jobs->id) }}">

                            @csrf
                            @method('patch')

                            <input type="hidden" name="reason" value="{{ $jobs->reason }}">
                            <input type="hidden" name="title" value="{{ $jobs->title }}">
                            <input type="hidden" name="desc" value="{{ $jobs->desc }}">
                            <input type="hidden" name="req" value="{{ $jobs->req }}">
                            <input type="hidden" name="qual" value="{{ $jobs->qual }}">
                            <input type="hidden" name="salary" value="{{ $jobs->salary }}">
                            <input type="hidden" name="perk" value="{{ $jobs->perk }}">
                            <input type="hidden" name="about" value="{{ $jobs->about }}">
                            <input type="hidden" name="company" value="{{ $jobs->company }}">
                            <input type="hidden" name="status" value="Retrieved">

                            <button class="btn-career btn-secondary-custom" type="submit">
                                Retrieve Job
                            </button>

                        </form>

                        @endif


                        <!-- Edit -->
                        <a
                            class="btn-career btn-apply"
                            href="{{ route('jobs.edit', $jobs->id) }}">
                            Edit Job
                        </a>


                        <!-- Delete -->
                        <form
                            method="POST"
                            action="{{ action('JobsController@destroy', $jobs->id) }}">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Do you want to permanently delete this post?')"
                                class="btn-career btn-danger-custom"
                                type="submit">
                                Delete Job
                            </button>

                        </form>


                        <!-- Close / Reopen -->
                        @if($jobs->status === 'Active' || $jobs->status === 'Retrieved')

                        <form method="POST"
                            action="{{ action('JobsController@update', $jobs->id) }}">

                            @csrf
                            @method('patch')

                            <input type="hidden" name="reason" value="{{ $jobs->reason }}">
                            <input type="hidden" name="title" value="{{ $jobs->title }}">
                            <input type="hidden" name="desc" value="{{ $jobs->desc }}">
                            <input type="hidden" name="req" value="{{ $jobs->req }}">
                            <input type="hidden" name="qual" value="{{ $jobs->qual }}">
                            <input type="hidden" name="salary" value="{{ $jobs->salary }}">
                            <input type="hidden" name="perk" value="{{ $jobs->perk }}">
                            <input type="hidden" name="about" value="{{ $jobs->about }}">
                            <input type="hidden" name="company" value="{{ $jobs->company }}">
                            <input type="hidden" name="status" value="Closed">

                            <button class="btn-career btn-warning-custom" type="submit">
                                Close Job
                            </button>

                        </form>

                        @elseif($jobs->status === 'Closed')

                        <form method="POST"
                            action="{{ action('JobsController@update', $jobs->id) }}">

                            @csrf
                            @method('patch')

                            <input type="hidden" name="reason" value="{{ $jobs->reason }}">
                            <input type="hidden" name="title" value="{{ $jobs->title }}">
                            <input type="hidden" name="desc" value="{{ $jobs->desc }}">
                            <input type="hidden" name="req" value="{{ $jobs->req }}">
                            <input type="hidden" name="qual" value="{{ $jobs->qual }}">
                            <input type="hidden" name="salary" value="{{ $jobs->salary }}">
                            <input type="hidden" name="perk" value="{{ $jobs->perk }}">
                            <input type="hidden" name="about" value="{{ $jobs->about }}">
                            <input type="hidden" name="company" value="{{ $jobs->company }}">
                            <input type="hidden" name="status" value="Active">

                            <button class="btn-career btn-secondary-custom" type="submit">
                                Reopen Job
                            </button>

                        </form>

                        @endif

                    </div>


                    @else

                    <!-- Applicant Actions -->
                    <div class="action-buttons">

                        <a href="{{ url('/login') }}" class="btn-career btn-apply">
                            Apply Now
                        </a>

                        <a href="#save" class="btn-career btn-save">
                            Save Job
                        </a>

                    </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>


@include('partials.footer')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>

<script src="{{ asset('js/scripts.js') }}"></script>

<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>