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
                    <h2>Mobilizer Registration</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">

                        <form action="{{url('save_super_mobilizer')}}" method="post" role="form" class="php-email-form" id="form">
                            @csrf
                            <div class="row">

                                <div class="col-md-2 form-group">
                                    <label class="form-group">Polling Station (Mandatory)</label>
                                    <select class="form-control" name="polling_station" data-rule="required"
                                            data-msg="Please select a polling station" id="super_mobilizer_polling_center">
                                        @foreach($polling_stations as $polling_station)
                                            <option value="{{$polling_station->polling_station}}"> {{$polling_station->polling_station}}</option>
                                        @endforeach
                                    </select>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-2 form-group">
                                    <label class="form-group">Super Mobilizer ID (Mandatory)</label>
                                    <input type="number" name="super_id" class="form-control" id="super_mobilizer_id"
                                           placeholder="ID NO"
                                           data-rule="minlen:6" data-msg="Please enter at least 6 chars"/>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-1 form-group">
                                    <button class="btn btn-primary btn-search" id="check_btn" onclick="checkSuperMobilizer()">check</button>
                                </div>


                                <div class="col-md-4 form-group" id="mobilizers_id" style="display: none;">
                                    <label class="form-group">Mobilizer's ID Number (Mandatory)</label>
                                    <input type="number" name="id_no" class="form-control" id="voters_id"
                                           placeholder="ID NO"
                                           data-rule="minlen:6" data-msg="Please enter at least 6 chars"/>

                                    <button class="btn btn-primary btn-search refix" onclick="searchVoter()">Search</button>

                                    <div class="validate" id="error">Select a polling center and enter ID</div>
                                    <div class="validate" id="user_not_found" style="display:none;">User not found in this polling station</div>
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
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="form-group">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                               placeholder="First Name" data-msg="Please enter first name"
                                        />
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" id="middle_name"
                                               placeholder="Middle Name"
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

                                <div class="mb-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your Details has been saved. Thank you!</div>
                                </div>
                                <div class="text-center" id="submit" >
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
