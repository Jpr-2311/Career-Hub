<div id="step2" class="form-section" >
                        <div class="row">
                            <h3 class="mt-0" style="  display: inline-block;">Education </h3>
                        <hr />
                        </div>
                        <form id="contactForm" class="form-floating" method="POST" action="{{ action('UserController@storeEduInfo') }}}">
                    @csrf
                        <p class="required">Fields marked with * are required</p>
                        <div id="education_group_input_row" class="row form-group p-3" >
                            <div class="col-md-12 col-12" >

                                <div class="row g-2">
                                    <div class="form-floating mb-3 col-md">
                                        <input class="form-control" id="institute" type="text" name="school"
                                            required />
                                        <label for="title">institution Name <small style="color: red">*</small></label>
                                    </div>
                                    <div class="form-floating mb-3 col-md">
                                        <select  name="degree" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            @foreach ($education_levels as $education_level)
                                                <option value="{{ $education_level->id }}">{{ $education_level->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect" class="ml-1">Select a degree <small style="color: red">*</small></label>

                                    </div>
                                </div>
                                <div class="row ee g-2" id="targetDate">
                                    <div class="form-floating mb-3 col-6">
                                        <input class="form-control" id="education_start_date" type="date" name="begin"
                                            required />
                                        <label for="title">Start Date <small style="color: red">*</small></label>
                                    </div>
                                    <div class="form-floating mb-3 col-6 end_date" id='end_date'>
                                        <input class="form-control" id="end" type="date" name="education_end_date"
                                            required />
                                        <label for="title">End Date <small style="color: red">*</small></label>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-check form-switch">
                                            <input  id="is_studying" value="1" name="present" class="form-check-input is_studying" type="checkbox" id="flexSwitchCheckDefault">
                                            <label class="form-check-label" for="is_studying" id="is_studying_label">Are you presently studying</label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3 col-12">
                                        <button class="btn btn-danger" id="DeleteRow_education" type="button">
                                            <i class="bi bi-trash"></i>
                                            Remove
                                        </button>
                                    </div> -->

                                </div>

                            </div>
                        </div>

                        <div id="education_group_dynamic_row"></div>


                        <div class="row form-group p-3">
                            <div class="col-6">
                                <!-- <button
                                    id="rowAdder_education" type="button"
                                    class="btn btn-md btn-icon btn-outline-info addButton" style="position: relative;">
                                    Add more
                                </button> -->
                            </div>
                        </div>



                        <!-- <div class="row">
                            <h2 class="mt-0">skills</h2>
                            <hr />
                        </div>
                        <div class="row form-group">


                                <div class="col-12">
                                <input id="skills" type="text" required class="form-control p-4" data-role="tagsinput"
                                    placeholder=" " name="skills[]" />
                            </div>
                            <small> press enter to add tag </small> -->

                        </div>
                        <div class="flex-grow-1 d-flex justify-content-end">
                            <button class="btn btn-primary btn-lg" type="submit">Save and continue to next step</button> 
</div>
</form>
                    </div>
