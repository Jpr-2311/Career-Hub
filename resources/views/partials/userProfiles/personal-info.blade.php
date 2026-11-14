<form id="contactForm" class="form-floating" method="POST" action="{{ route('users.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- <div id="step1"> -->
                        <h2 class="mt-0">Personal Information</h2>
                        <hr />
                        <p class="required">Fields marked with * are required</p>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="first_name" type="text" name="first_name" required />
                            <label for="title">First Name*</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="last_name" type="text" name="last_name">
                            <label for="about">Last Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="about" type="text" name="about" style="height: 10rem" required></textarea>
                            <label for="about">About Yourself*</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="contact" type="number" name="contact_number">
                            <label for="about">Contact Number</label>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" value="1" name="contact_show">&nbsp;
                            <label for="address">Make Contact Number Visible To Public</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" name="email" required>
                            <label for="email">Email*</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="address" type="text" name="address">
                            <label for="address">Address</label>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" value="1" name="address_show">&nbsp;
                            <label for="address">Make Address Visible To Public</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="country" type="text" name="country" required>
                            <label for="about">Country*</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="city" type="text" name="city" required>
                            <label for="about">City*</label>
                        </div>
                        <div class="mb-3">
                            <select name="gender" class="form-control">
                                <option selected>Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" value="1" name="gender_show">&nbsp;
                            <label for="address">Make Gender Visible To Public</label>
                        </div>
                        <div class="mb-3">
                            <select name="marital_status" class="form-control">
                                <option selected>Marital Status</option>
                                <option>Married</option>
                                <option>Unmarried</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" value="1" name="marital_show">&nbsp;
                            <label for="address">Make Marital Status Visible To Public</label>
                        </div>
                        <div class="mb-3">
                            <input class="form-control mt-4" id="image" type="file" name="image">
                        </div>
                        <div class="flex-grow-1 d-flex justify-content-end">
                            <button class="btn btn-primary btn-lg" type="submit">Save and continue to
                                next
                                step&nbsp;<i class="bi bi-arrow-right-circle-fill"></i>
                            </button>
                    </div>
                </form>