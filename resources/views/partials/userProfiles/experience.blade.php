<div id="step3" class="form-section">
                        <h3 class="mt-0" style="  display: inline-block;">Professional experience

                        </h3>
                        <hr />
                        <p class="required">Fields marked with * are required</p>
                        <div id="experience_group_input_row" class="p-3">
                            <div class="row g-2">

                                <div class="form-floating form-group mb-3 col-6">
                                    <input class="form-control" id="Company_name" type="text" name="Company_name"
                                        required />
                                    <label for="title">Company Name <small style="color: red">*</small></label>
                                </div>
                                <div class="form-floating form-group mb-3 col-6">
                                    <input class="form-control" id="Designation" type="text" name="Designation"
                                        required />
                                    <label for="title">Designation <small style="color: red">*</small></label>
                                </div>

                            </div>
                            <div id="is_working_div" class="row g-2">
                                <div class="form-floating form-group mb-3 col-md-6">
                                    <input class="form-control" id="experience_start_date" type="date"
                                        name="experience_start_date" required />
                                    <label for="title">Start Date <small style="color: red">*</small></label>
                                </div>
                                <div  id="experience_end_date_div" class="form-floating form-group mb-3 col-md-6">
                                    <input class="form-control" id="experience_end_date" type="date" name="experience_end_date"
                                        required />
                                    <label for="title">End Date <small style="color: red">*</small></label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-check form-switch">
                                        <input  value="1" name="is_working" class="form-check-input is_working" type="checkbox" id="is_working">
                                        <label class="form-check-label" for="is_working" id="is_working_label">Are you presently working</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <button class="btn btn-danger" id="DeleteRow_experience" type="button">
                                        <i class="bi bi-trash"></i>
                                        Remove
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div id="experience_group_dynamic_row"></div>
                        <div class="row form-group p-3">
                            <div class="col-6">
                                <button
                                    id="rowAdder_experience" type="button"
                                    class="btn btn-md btn-icon btn-outline-info addButton" style="position: relative;">
                                    Add more
                                </button>
                            </div>
                        </div>
                    </div>







                    <br>
                    <div class="d-inline-block form-section d-flex">

                        <div class="d-flex align-items-center">

                            <button class="btn btn-primary btn-lg " id="previousBtn" type="button" onclick="previous()">
                                Previous&nbsp;
                                <i class="bi-arrow-left-circle-fill"></i>
                            </button>

                        </div>
                        <div class="flex-grow-1 d-flex justify-content-end">
                            <button class="btn btn-primary btn-lg" id="submitButton2" type="submit">Save and continue to
                                next
                                step&nbsp;<i class="bi bi-arrow-right-circle-fill"></i>
                            </button>
                            <button class="btn btn-primary btn-lg" id="nextBtn" onclick="next()"
                                type="button">Next&nbsp;
                                <i class="bi-arrow-right-circle-fill"></i>
                            </button>
                        </div>
                    </div>
                    <!-- <div class="d-inline-block"><button class="btn btn-success btn-lg" id="submitButton" type="submit">Save for Later&nbsp; <i class=" bi-heart-fill text-white-75"></i></button></div> -->

                </form>