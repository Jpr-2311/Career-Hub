@include('partials.header')
@include('partials.navbar')

<style>
    .jobs-page {
        background: #f6f8fc;
        min-height: 100vh;
        padding: 90px 0 70px;
    }

    .jobs-hero {
        background: linear-gradient(135deg, #0d47a1, #1565c0);
        color: #fff;
        padding: 70px 20px;
        margin-bottom: 45px;
    }

    .jobs-hero h1 {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .jobs-hero p {
        font-size: 17px;
        opacity: .9;
        margin-bottom: 0;
    }

    .job-card {
        background: #fff;
        border: 1px solid #e5e9f2;
        border-radius: 14px;
        padding: 28px;
        margin-bottom: 22px;
        transition: .25s ease;
        box-shadow: 0 5px 18px rgba(0, 0, 0, .04);
    }

    .job-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, .08);
        border-color: #cdd9ee;
    }

    .job-title {
        color: #16213e;
        font-size: 23px;
        font-weight: 700;
        text-decoration: none;
    }

    .job-title:hover {
        color: #1565c0;
    }

    .company-name {
        color: #1565c0;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
    }

    .company-name:hover {
        text-decoration: underline;
    }

    .job-description {
        color: #667085;
        line-height: 1.7;
        margin: 18px 0;
    }

    .job-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 15px;
    }

    .job-tag {
        display: inline-block;
        background: #eef4ff;
        color: #2457a6;
        padding: 7px 13px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .view-job-btn {
        display: inline-block;
        background: #1565c0;
        color: #fff;
        padding: 10px 20px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: .2s ease;
    }

    .view-job-btn:hover {
        background: #0d47a1;
        color: #fff;
    }

    .empty-jobs {
        background: #fff;
        border: 1px solid #e5e9f2;
        border-radius: 14px;
        padding: 55px 25px;
        text-align: center;
        box-shadow: 0 5px 18px rgba(0, 0, 0, .04);
    }

    .empty-jobs h3 {
        color: #16213e;
        font-weight: 700;
    }

    .empty-jobs p {
        color: #667085;
        margin-bottom: 0;
    }

    .alert {
        border-radius: 8px;
    }

    @media (max-width: 768px) {
        .jobs-page {
            padding-top: 50px;
        }

        .jobs-hero {
            padding: 50px 20px;
        }

        .jobs-hero h1 {
            font-size: 32px;
        }

        .job-card {
            padding: 22px;
        }

        .job-title {
            font-size: 20px;
        }
    }
</style>


<div class="jobs-page">

    <!-- Hero -->
    <section class="jobs-hero">
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

            <div class="text-center">
                <h1>Find Your Next Opportunity</h1>
                <p>
                    Explore job opportunities and take the next step in your career.
                </p>
            </div>

        </div>
    </section>


    <!-- Jobs -->
    <section>
        <div class="container">

            @if($jobs && count($jobs) > 0)

            <div class="row justify-content-center">
                <div class="col-lg-9">

                    @foreach($jobs as $job)

                    @php
                    $jobCompany = $companies->firstWhere('id', $job->company);
                    @endphp

                    <div class="job-card">

                        <div class="d-flex justify-content-between align-items-start gap-3 flex-wrap">

                            <div>

                                <a
                                    href="{{ route('jobs.show', $job->id) }}"
                                    class="job-title">
                                    {{ $job->title }}
                                </a>

                                @if($jobCompany)
                                <div class="mt-2">
                                    <a
                                        href="{{ route('companies.show', $jobCompany->id) }}"
                                        class="company-name">
                                        {{ $jobCompany->title }}
                                    </a>
                                </div>
                                @endif

                            </div>

                            <span class="job-tag">
                                {{ $job->status }}
                            </span>

                        </div>


                        <p class="job-description">
                            {{ $job->desc }}
                        </p>


                        <div class="job-meta">

                            @if($job->salary)
                            <span class="job-tag">
                                Salary: {{ $job->salary }}
                            </span>
                            @endif

                            @if($job->qual)
                            <span class="job-tag">
                                Qualification: {{ $job->qual }}
                            </span>
                            @endif

                        </div>


                        <div class="mt-4">
                            <a
                                href="{{ route('jobs.show', $job->id) }}"
                                class="view-job-btn">
                                View Job Details
                            </a>
                        </div>

                    </div>

                    @endforeach

                </div>
            </div>

            @else

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="empty-jobs">
                        <h3>No Jobs Available</h3>
                        <p>
                            There are currently no active job opportunities.
                            Please check back later.
                        </p>
                    </div>

                </div>
            </div>

            @endif

        </div>
    </section>

</div>


@include('partials.footer')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>

<script src="{{ asset('js/scripts.js') }}"></script>

<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>