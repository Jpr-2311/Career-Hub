@include('partials.header')
@include('partials.navbar')

<style>
    .careerhub-job-create {
        background: #f5f7fb;
        min-height: calc(100vh - 70px);
        padding: 60px 20px 80px;
    }

    .job-create-wrapper {
        max-width: 1000px;
        margin: 0 auto;
    }

    .job-create-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .job-create-header .eyebrow {
        color: #2563eb;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 10px;
    }

    .job-create-header h1 {
        color: #111827;
        font-size: 38px;
        font-weight: 800;
        margin: 0 0 12px;
    }

    .job-create-header p {
        color: #6b7280;
        font-size: 16px;
        margin: 0;
    }

    .job-form-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        box-shadow: 0 10px 35px rgba(15, 23, 42, 0.07);
        overflow: hidden;
    }

    .form-card-top {
        padding: 28px 35px;
        border-bottom: 1px solid #e5e7eb;
        background: #ffffff;
    }

    .form-card-top h2 {
        margin: 0 0 7px;
        color: #111827;
        font-size: 22px;
        font-weight: 750;
    }

    .form-card-top p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    .required-note {
        color: #6b7280;
        font-size: 13px;
        margin-top: 12px !important;
    }

    .required-note span {
        color: #ef4444;
    }

    .job-form {
        padding: 35px;
    }

    .form-section-title {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 0 0 22px;
        color: #111827;
        font-size: 18px;
        font-weight: 750;
    }

    .form-section-title .section-number {
        width: 32px;
        height: 32px;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eff6ff;
        color: #2563eb;
        font-size: 14px;
        font-weight: 800;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #374151;
        font-size: 14px;
        font-weight: 650;
    }

    .form-label .required {
        color: #ef4444;
    }

    .careerhub-input,
    .careerhub-select,
    .careerhub-textarea {
        width: 100%;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        background: #ffffff;
        color: #111827;
        font-size: 15px;
        padding: 13px 15px;
        outline: none;
        transition: 0.2s ease;
        box-sizing: border-box;
    }

    .careerhub-input,
    .careerhub-select {
        height: 48px;
    }

    .careerhub-textarea {
        min-height: 130px;
        resize: vertical;
        line-height: 1.6;
    }

    .careerhub-input:focus,
    .careerhub-select:focus,
    .careerhub-textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
    }

    .careerhub-input::placeholder,
    .careerhub-textarea::placeholder {
        color: #9ca3af;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-divider {
        height: 1px;
        background: #e5e7eb;
        margin: 32px 0;
    }

    .field-help {
        display: block;
        margin-top: 6px;
        color: #9ca3af;
        font-size: 12px;
    }

    .alert-box {
        margin-bottom: 25px;
        padding: 15px 18px;
        border-radius: 10px;
        font-size: 14px;
    }

    .alert-error {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #b91c1c;
    }

    .alert-success {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #166534;
    }

    .alert-box ul {
        margin: 0;
        padding-left: 20px;
    }

    .submit-area {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding-top: 10px;
    }

    .submit-info {
        color: #6b7280;
        font-size: 13px;
    }

    .submit-info strong {
        color: #374151;
    }

    .post-job-btn {
        border: none;
        border-radius: 10px;
        background: #2563eb;
        color: #ffffff;
        padding: 14px 28px;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.2s ease;
        box-shadow: 0 6px 18px rgba(37, 99, 235, 0.20);
    }

    .post-job-btn:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
    }

    .post-job-btn i {
        margin-left: 7px;
    }

    @media (max-width: 768px) {
        .careerhub-job-create {
            padding: 40px 15px 60px;
        }

        .job-create-header h1 {
            font-size: 30px;
        }

        .form-card-top,
        .job-form {
            padding: 25px 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .submit-area {
            flex-direction: column;
            align-items: stretch;
        }

        .post-job-btn {
            width: 100%;
        }
    }
</style>

<section class="careerhub-job-create">

    <div class="job-create-wrapper">

        <!-- Page Header -->
        <div class="job-create-header">
            <div class="eyebrow">CareerHub Employer</div>

            <h1>Post a New Job</h1>

            <p>
                Find the right candidate by creating a clear and detailed job listing.
            </p>
        </div>

        <!-- Form Card -->
        <div class="job-form-card">

            <div class="form-card-top">
                <h2>Job Information</h2>

                <p>
                    Provide the details candidates need to understand this opportunity.
                </p>

                <p class="required-note">
                    <span>*</span> Fields marked with an asterisk are required.
                </p>
            </div>

            <div class="job-form">

                <!-- Validation Errors -->
                @if(count($errors) > 0)
                <div class="alert-box alert-error">
                    <strong>Please check the following:</strong>

                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Success Message -->
                @if(\Session::has('success'))
                <div class="alert-box alert-success">
                    {{ \Session::get('success') }}
                </div>
                @endif

                <form
                    id="jobPostForm"
                    method="POST"
                    action="{{ action('JobsController@store') }}">
                    @csrf

                    <!-- Basic Information -->
                    <h3 class="form-section-title">
                        <span class="section-number">01</span>
                        Basic Information
                    </h3>

                    <div class="form-grid">

                        <!-- Company -->
                        <div class="form-group">
                            <label class="form-label" for="company">
                                Company <span class="required">*</span>
                            </label>

                            <select
                                class="careerhub-select"
                                id="company"
                                name="company"
                                required>
                                <option value="">Select your company</option>

                                @foreach($companies as $company)
                                <option
                                    value="{{ $company->id }}"
                                    {{ old('company') == $company->id ? 'selected' : '' }}>
                                    {{ $company->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Job Title -->
                        <div class="form-group">
                            <label class="form-label" for="title">
                                Job Title <span class="required">*</span>
                            </label>

                            <input
                                class="careerhub-input"
                                id="title"
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                placeholder="e.g. Frontend Developer"
                                required>
                        </div>

                    </div>

                    <div class="form-divider"></div>

                    <!-- Job Description -->
                    <h3 class="form-section-title">
                        <span class="section-number">02</span>
                        Job Details
                    </h3>

                    <div class="form-group">
                        <label class="form-label" for="desc">
                            Job Description <span class="required">*</span>
                        </label>

                        <textarea
                            class="careerhub-textarea"
                            id="desc"
                            name="desc"
                            placeholder="Describe the role, responsibilities and day-to-day work..."
                            required>{{ old('desc') }}</textarea>

                        <span class="field-help">
                            Give candidates a clear overview of the position.
                        </span>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="req">
                            Job Requirements
                        </label>

                        <textarea
                            class="careerhub-textarea"
                            id="req"
                            name="req"
                            placeholder="List the skills, experience and responsibilities required for this position...">{{ old('req') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="qual">
                            Required Qualification <span class="required">*</span>
                        </label>

                        <textarea
                            class="careerhub-textarea"
                            id="qual"
                            name="qual"
                            placeholder="e.g. Bachelor's degree in Computer Science or related field..."
                            required>{{ old('qual') }}</textarea>
                    </div>

                    <div class="form-divider"></div>

                    <!-- Compensation -->
                    <h3 class="form-section-title">
                        <span class="section-number">03</span>
                        Compensation & Benefits
                    </h3>

                    <div class="form-grid">

                        <!-- Salary -->
                        <div class="form-group">
                            <label class="form-label" for="salary">
                                Salary
                            </label>

                            <input
                                class="careerhub-input"
                                id="salary"
                                type="text"
                                name="salary"
                                value="{{ old('salary') }}"
                                placeholder="e.g. PKR 50,000 - 80,000">
                        </div>

                        <!-- Perks -->
                        <div class="form-group">
                            <label class="form-label" for="perk">
                                Perks & Benefits
                            </label>

                            <input
                                class="careerhub-input"
                                id="perk"
                                type="text"
                                name="perk"
                                value="{{ old('perk') }}"
                                placeholder="e.g. Remote work, health insurance">
                        </div>

                    </div>

                    <div class="form-divider"></div>

                    <!-- Submit -->
                    <div class="submit-area">

                        <div class="submit-info">
                            <strong>Ready to hire?</strong><br>
                            Review your information before publishing.
                        </div>

                        <button
                            class="post-job-btn"
                            id="submitButton2"
                            type="submit">
                            Post Job
                            <i class="fas fa-arrow-right"></i>
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>

</section>

@include('partials.footer')

<!-- Back to Top -->
<button
    type="button"
    class="btn btn-floating btn-lg"
    id="btn-back-to-top">
    <i class="bi-arrow-up-circle fs-1 text-primary"></i>
</button>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- SimpleLightbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>

<!-- Core JS -->
<script src="{{ asset('js/scripts.js') }}"></script>

</body>

</html>