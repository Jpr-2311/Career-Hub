@include('partials.header')
@include('partials.navbar')

<style>
    .declined-page {
        background: #f6f8fc;
        min-height: 100vh;
        padding: 90px 0 70px;
    }

    .declined-header {
        background: linear-gradient(135deg, #0d47a1, #1565c0);
        color: white;
        padding: 60px 20px;
        margin-bottom: 40px;
    }

    .declined-header h1 {
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .declined-header p {
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
    }

    .job-card h3 {
        margin-bottom: 8px;
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

    .declined-message {
        background: #fff4f4;
        border-left: 4px solid #dc3545;
        padding: 16px 18px;
        border-radius: 8px;
        margin-top: 18px;
        color: #842029;
    }

    .edit-btn {
        display: inline-block;
        margin-top: 12px;
        background: #1565c0;
        color: white;
        padding: 9px 18px;
        border-radius: 7px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
    }

    .edit-btn:hover {
        background: #0d47a1;
        color: white;
    }

    .status-badge {
        display: inline-block;
        background: #fdecec;
        color: #c62828;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        margin-top: 12px;
    }

    .empty-jobs {
        background: #fff;
        border: 1px solid #e5e9f2;
        border-radius: 14px;
        padding: 50px 25px;
        text-align: center;
        color: #667085;
    }

    .empty-jobs h3 {
        color: #16213e;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .alert {
        border-radius: 8px;
    }

    @media (max-width: 768px) {
        .declined-page {
            padding-top: 50px;
        }

        .declined-header {
            padding: 45px 20px;
        }

        .declined-header h1 {
            font-size: 30px;
        }

        .job-card {
            padding: 22px;
        }
    }
</style>


<div class="declined-page">

    <!-- Header -->
    <section class="declined-header">
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


            <h1>Declined Job Posts</h1>

            <p>
                Review declined job posts, make the required changes,
                and submit them again.
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

                            <h3>
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
                            Declined
                        </span>

                    </div>


                    @if($job->status === 'Rejected')

                    <div class="declined-message">

                        <strong>Job post declined by admin</strong>

                        <p class="mb-1 mt-2">
                            This job post was declined by the administrator.
                            Please review the post, make the required changes,
                            and submit it again.
                        </p>

                        <a
                            href="{{ route('jobs.edit', $job->id) }}"
                            class="edit-btn">
                            Edit Post
                        </a>

                    </div>

                    @endif


                    @if($job->desc)

                    <p class="job-description mb-0">
                        {{ $job->desc }}
                    </p>

                    @endif

                </div>

                @endforeach

            </div>

        </div>

        @else

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="empty-jobs">

                    <h3>No Declined Jobs</h3>

                    <p class="mb-0">
                        You don't have any declined job posts.
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