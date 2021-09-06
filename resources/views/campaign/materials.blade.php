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
                    <h2>Agent B Mobilizer Registration</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">

                        <form action="{{url('save_mobilizer')}}" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="row">

                                <div class="col-md-4 form-group">
                                    <label class="form-group">Polling Station (Mandatory)</label>
                                    <select class="form-control" name="polling_station" data-rule="required"
                                            data-msg="Please select a polling station" id="super_mobilizer_polling_center">
                                        @foreach($polling_stations as $polling_station)
                                            <option value="{{$polling_station->polling_station}}"> {{$polling_station->polling_station}}</option>
                                        @endforeach
                                    </select>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label class="form-group">ID Number (Mandatory)</label>
                                    <input type="number" name="id_no" class="form-control" id="id_number"
                                           placeholder="ID NO"
                                           data-rule="minlen:6" data-msg="Please enter at least 6 chars"/>
                                    <div class="validate" id="error">Select a polling center and enter ID</div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <button class="btn btn-primary btn-search" onclick="searchVoter()">Search</button>
                                </div>
                            </div>

                            <!--container -->
                            <div class="container" id="main_container">
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label class="form-group">ID NO</label>
                                        <input type="number" name="id_no" class="form-control" id="id_no"
                                               placeholder="ID Number"
                                               data-rule="minlen:6" data-msg="Please ID No"/>
                                        <input type="text" hidden="true" name="agent_type" class="form-control" value="Agent B"/>
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="form-group">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                               placeholder="First Name" data-msg="Please enter first name"
                                               data-rule="required"/>
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" id="middle_name"
                                               placeholder="Middle Name" data-rule="required"
                                               data-msg="Please enter a middle name"/>
                                        <div class="validate"></div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                               placeholder="Last Name"/>
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Mobile Number</label>
                                        <input type="number" name="mobile_no" class="form-control" id="mobile_no"
                                               placeholder="Mobile Number"
                                        />
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Gender</label>
                                        <select class="form-control" name="gender" id="gender"
                                                data-rule="required" data-msg="Please Enter Gender">
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                        <div class="validate"></div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Recruitment Status</label>
                                        <select class="form-control" name="recruitment_status" data-rule="required"
                                                data-msg="Please Select recruitment status" id="recruitment"  onchange="showReason()">
                                            <option disabled selected>Select recruitment Status</option>
                                            <option value="recruited">Recruited</option>
                                            <option value="not_recruited">Not Recruited</option>
                                        </select>
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-4 form-group" style="display: none;" id="reason">
                                        <label class="form-group">Refusal reason</label>
                                        <input type="text" name="reason" class="form-control"
                                               placeholder="reason"
                                        />
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Call status *</label>
                                        <select class="form-control" name="call_status" data-rule="required"
                                                data-msg="Please Select call status">
                                            <option disabled selected>Select call Status</option>
                                            <option value="picked">picked</option>
                                            <option value="missed">missed</option>
                                            <option value="invalid">Invalid phone number</option>
                                        </select>
                                        <div class="validate"></div>
                                    </div>


                                </div>
                                <div class="mb-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your Details has been saved. Thank you!</div>
                                </div>
                                <div class="text-center">
                                    <button type="submit">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->
    </main>
@endsection
