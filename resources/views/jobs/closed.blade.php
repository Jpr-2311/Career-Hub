@include('partials.header')
@include('partials.navbar')

<style>
    .closed-page {
        background: #f6f8fc;
        min-height: 100vh;
        padding: 90px 0 70px;
    }

    .closed-header {
        background: linear-gradient(135deg, #0d47a1, #1565c0);
        color: #fff;
        padding: 60px 20px;
        margin-bottom: 40px;
    }

    .closed-header h1 {
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .closed-header p {
        margin: 0;
        opacity: .9;
    }

    .job-card {
        background: #fff;
        border: 1px solid #e5e9f2;
        border-radius: 14px;
        padding: 28px;
        margin-bottom: 22px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, .04);
        transition: .25s ease;
    }

    .job-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, .07);
    }

    .job-title {
        color: #16213e;
        font-size: 22px;
        font-weight: 700;
        text-decoration: none;
    }

    .job-title:hover {
        color: #1565c0;
    }

    .company-name {
        color: #1565c0;
        font-weight: 600;
        text-decoration: none;
    }

    .company-name:hover {
        text-decoration: underline;
    }

    .job-description {
        color: #667085;
        line-height: 1.7;
        margin-top: 18px;
    }

    .status-badge {
        display: inline-block;
        background: #fff4e5;
        color: #b54708;
        padding: 6px 13px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .view-btn {
        display: inline-block;
        margin-top: 16px;
        background: #1565c0;
        color: #fff;
        padding: 9px 18px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .view-btn:hover {
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
        margin: 0;
    }

    .alert {
        border-radius: 8px;
    }

    @media (max-width: 768px) {

        .closed-page {
            padding-top: 50px;
        }

        .closed-header {
            padding: 45px 20px;
        }

        .closed-header h1 {
            font-size: 30px;
        }

        .job-card {
            padding: 22px;
        }

        .job-title {
            font-size: 20px;
        }
    }
</style>


<div class="closed-page">

    <!-- Header -->
    <section class="closed-header">
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


            <h1>Closed Job Posts</h1>

            <p>
                View job posts that are currently closed and no longer accepting applications.
            </p>

        </div>
    </section>


    <!-- Jobs -->
    <div class="container">

        @if($jobs && $jobs->count() > 0)

        <div class="row justify-content-center">

            <div class="col-lg-9">

                @foreach($jobs as $job)

                @php
                $jobCompany = $companies->firstWhere('id', $job->company);
                @endphp


                <div class="job-card">

                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">

                        <div>

                            <h3 class="mb-2">

                                <a
                                    class="job-title"
                                    href="{{ route('jobs.show', $job->id) }}">
                                    {{ $job->title }}
                                </a>

                            </h3>


                            @if($jobCompany)

                            <a
                                class="company-name"
                                href="{{ route('companies.show', $jobCompany->id) }}">
                                {{ $jobCompany->title }}
                            </a>

                            @endif

                        </div>


                        <span class="status-badge">
                            Closed
                        </span>

                    </div>


                    @if($job->desc)

                    <p class="job-description mb-0">
                        {{ $job->desc }}
                    </p>

                    @endif


                    <a
                        href="{{ route('jobs.show', $job->id) }}"
                        class="view-btn">
                        View Job Details
                    </a>

                </div>

                @endforeach

            </div>

        </div>

        @else

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="empty-jobs">

                    <h3>No Closed Jobs</h3>

                    <p>
                        You don't have any closed job posts at the moment.
                    </p>

                </div>

            </div>

        </div>

        @endif

    </div>

</div>


@include('partials.footer')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>

<script src="{{ asset('js/scripts.js') }}"></script>

<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>