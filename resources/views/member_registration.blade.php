@extends('layout')

@section('content')
<main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="position:relative;top:100px;margin-bottom:100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <img src="/assets/img/cck-logo.png" width="200px">
                    </div>
                </div>
            </div>
            <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                <h2>Member Registrations</h2>
                <p>CHAMA CHA KAZI</p>
            </div>

            <div class="row mt-5">
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <input type="text" class="form-control" id="input" placeholder="ID Number"
                         />
                    <div class="validate"></div>
                </div>
                <div class="text-center"><button type="submit" class="btn btn-primary" onclick="fetchUser()">Search</button></div>

            </div>
            <div class="row mt-5">

                <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">

                    <form action="{{ url('save_member') }}" method="post" role="form"
                        class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label class="form-group">Surname</label>
                                <input type="text" name="last_name" class="form-control" id="surname"
                                    placeholder="Surname Name" data-rule="required" data-msg="Please enter your surname"/>
                                    <input type="text" name="first_name" class="form-control" id="first_name" hidden="true"/>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-group">Other Names</label>
                                <input type="text" class="form-control" name="other_name" id="other_name"
                                    placeholder="Other Names" data-rule="required" data-msg="Please enter your other names"/>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-group">ID No.</label>
                                <input type="number" class="form-control" name="id_no" id="id_number"
                                    placeholder="ID No." data-rule="required" data-msg="Please enter your ID NO"/>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label class="form-group">Mobile Number</label>
                                <input type="text" name="phone_number" class="form-control" id="phone_number"
                                    placeholder="Mobile Number"
                                       data-rule="required" data-msg="Please enter your mobile no"/>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-group">Age</label>
                                <input type="number" class="form-control" name="age" id="age"
                                    placeholder="ID Number" data-rule="required" data-msg="Please enter your age"
                                    />
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-group">Date Of Birth</label>
                                <input type="date" class="form-control" name="DOB" id="dob"/>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label class="form-group">Gender</label>
                                <select class="form-control" name="gender" data-rule="required"
                                    data-msg="Please Select Your Gender" id="gender">
                                    <option disabled selected="true">Select Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>

                                </select>
                                <div class="validate"></div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label class="form-group">Polling Center</label>
                                <input type="text" class="form-control" name="polling_center" id="polling_center"
                                    placeholder="Other Names" data-rule="required" data-msg="Please enter your polling center"/>
                                <div class="validate"></div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label class="form-group">Profession</label>
                                <input type="text" class="form-control" name="profession"
                                    placeholder="Profession" data-msg="profession is required" data-rule="required"/>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label class="form-group">County</label>
                                <input type="text" class="form-control" name="county" id="county"
                                    placeholder="County" data-rule="required" data-msg="Please enter other names" />
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-group">Constituency</label>
                                <input type="text" class="form-control" name="constituency" id="constituency"
                                    placeholder="Constituency" data-msg="Please enter other names" data-rule="required"/>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-group">Ward</label>
                                <input type="text" name="ward" class="form-control" id="ward"
                                    placeholder="Enter Your Ward" data-rule="required" data-msg="Please Enter Your Ward" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label class="form-group">Current Party</label>
                                <input type="text" class="form-control" name="current_party"
                                    placeholder="Current Party" data-rule="required" data-msg="Current Party is required" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your Details has been saved. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Submit</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->
</main>
@endsection
