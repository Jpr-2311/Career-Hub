@include('partials.header')
@include('partials.navbar')

<style>
    .careerhub-job-edit {
        background: #f5f7fb;
        min-height: calc(100vh - 70px);
        padding: 60px 20px 80px;
    }

    .edit-wrapper {
        max-width: 1000px;
        margin: 0 auto;
    }

    .edit-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .edit-header .eyebrow {
        color: #2563eb;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 10px;
    }

    .edit-header h1 {
        color: #111827;
        font-size: 38px;
        font-weight: 800;
        margin: 0 0 12px;
    }

    .edit-header p {
        color: #6b7280;
        font-size: 16px;
        margin: 0;
    }

    .edit-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        box-shadow: 0 10px 35px rgba(15, 23, 42, 0.07);
        overflow: hidden;
    }

    .edit-card-top {
        padding: 28px 35px;
        border-bottom: 1px solid #e5e7eb;
    }

    .edit-card-top h2 {
        margin: 0 0 7px;
        color: #111827;
        font-size: 22px;
        font-weight: 750;
    }

    .edit-card-top p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    .job-status {
        display: inline-flex;
        align-items: center;
        margin-top: 15px;
        padding: 6px 12px;
        border-radius: 20px;
        background: #eff6ff;
        color: #2563eb;
        font-size: 12px;
        font-weight: 700;
    }

    .edit-form {
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

    .section-number {
        width: 32px;
        height: 32px;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eff6ff;
        color: #2563eb;
        font-size: 13px;
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

    .careerhub-input,
    .careerhub-textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        background: #ffffff;
        color: #111827;
        font-size: 15px;
        padding: 13px 15px;
        outline: none;
        transition: 0.2s ease;
    }

    .careerhub-input {
        height: 48px;
    }

    .careerhub-textarea {
        min-height: 130px;
        resize: vertical;
        line-height: 1.6;
    }

    .careerhub-input:focus,
    .careerhub-textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
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
        margin: 8px 0 0;
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

    .update-job-btn {
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

    .update-job-btn:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
    }

    .update-job-btn i {
        margin-left: 7px;
    }

    @media (max-width: 768px) {
        .careerhub-job-edit {
            padding: 40px 15px 60px;
        }

        .edit-header h1 {
            font-size: 30px;
        }

        .edit-card-top,
        .edit-form {
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

        .update-job-btn {
            width: 100%;
        }
    }
</style>

<section class="careerhub-job-edit">

    <div class="edit-wrapper">

        <!-- Header -->
        <div class="edit-header">
            <div class="eyebrow">CareerHub Employer</div>

            <h1>Edit Job Post</h1>

            <p>
                Update your job information and keep your listing accurate.
            </p>
        </div>

        <!-- Edit Card -->
        <div class="edit-card">

            <div class="edit-card-top">

                <h2>{{ $jobs->title }}</h2>

                <p>
                    Make changes to the information below and save your updated job post.
                </p>

                @if($jobs->status)
                <span class="job-status">
                    {{ ucfirst($jobs->status) }}
                </span>
                @endif

            </div>

            <div class="edit-form">

                <!-- Errors -->
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

                <!-- Success -->
                @if(\Session::has('success'))
                <div class="alert-box alert-success">
                    {{ \Session::get('success') }}
                </div>
                @endif

                <form
                    id="jobEditForm"
                    method="POST"
                    action="{{ action('JobsController@update', $jobs->id) }}">

                    @csrf

                    {{ method_field('PUT') }}

                    <!-- Basic Information -->
                    <h3 class="form-section-title">
                        <span class="section-number">01</span>
                        Basic Information
                    </h3>

                    <div class="form-group">

                        <label class="form-label" for="title">
                            Job Title
                        </label>

                        <input
                            class="careerhub-input"
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title', $jobs->title) }}"
                            placeholder="e.g. Frontend Developer"
                            required>

                    </div>

                    <div class="form-divider"></div>

                    <!-- Job Details -->
                    <h3 class="form-section-title">
                        <span class="section-number">02</span>
                        Job Details
                    </h3>

                    <div class="form-group">

                        <label class="form-label" for="desc">
                            Job Description
                        </label>

                        <textarea
                            class="careerhub-textarea"
                            id="desc"
                            name="desc"
                            placeholder="Describe the role and responsibilities..."
                            required>{{ old('desc', $jobs->desc) }}</textarea>

                    </div>

                    <div class="form-group">

                        <label class="form-label" for="req">
                            Job Requirements
                        </label>

                        <textarea
                            class="careerhub-textarea"
                            id="req"
                            name="req"
                            placeholder="List required skills, experience and responsibilities...">{{ old('req', $jobs->req) }}</textarea>

                    </div>

                    <div class="form-group">

                        <label class="form-label" for="qual">
                            Required Qualification
                        </label>

                        <textarea
                            class="careerhub-textarea"
                            id="qual"
                            name="qual"
                            placeholder="e.g. Bachelor's degree in Computer Science..."
                            required>{{ old('qual', $jobs->qual) }}</textarea>

                    </div>

                    <div class="form-divider"></div>

                    <!-- Compensation -->
                    <h3 class="form-section-title">
                        <span class="section-number">03</span>
                        Compensation & Benefits
                    </h3>

                    <div class="form-grid">

                        <div class="form-group">

                            <label class="form-label" for="salary">
                                Salary
                            </label>

                            <input
                                class="careerhub-input"
                                id="salary"
                                type="text"
                                name="salary"
                                value="{{ old('salary', $jobs->salary) }}"
                                placeholder="e.g. PKR 50,000 - 80,000">

                        </div>

                        <div class="form-group">

                            <label class="form-label" for="perk">
                                Perks & Benefits
                            </label>

                            <input
                                class="careerhub-input"
                                id="perk"
                                type="text"
                                name="perk"
                                value="{{ old('perk', $jobs->perk) }}"
                                placeholder="e.g. Remote work, health insurance">

                        </div>

                    </div>

                    <div class="form-divider"></div>

                    <!-- Company -->
                    <h3 class="form-section-title">
                        <span class="section-number">04</span>
                        Company Information
                    </h3>

                    <div class="form-group">

                        <label class="form-label" for="about">
                            About Company
                        </label>

                        <textarea
                            class="careerhub-textarea"
                            id="about"
                            name="about"
                            placeholder="Provide a short introduction about the company...">{{ old('about', $jobs->about) }}</textarea>

                    </div>

                    <!-- Existing Values -->
                    <input
                        type="hidden"
                        name="reason"
                        value="{{ $jobs->reason }}">

                    <input
                        type="hidden"
                        name="status"
                        value="{{ $jobs->status }}">

                    <input
                        type="hidden"
                        name="company"
                        value="{{ $jobs->company }}">

                    <!-- Submit -->
                    <div class="submit-area">

                        <div class="submit-info">
                            <strong>Ready to save changes?</strong><br>
                            Your updated information will be saved to this job post.
                        </div>

                        <button
                            class="update-job-btn"
                            id="submitButton"
                            type="submit">
                            Save Changes
                            <i class="fas fa-check"></i>
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