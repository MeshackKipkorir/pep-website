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
                    <h2>Materials Management</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">

                        <form action="{{url('save_materials_no_phone')}}" method="post" role="form" class="php-email-form">
                            @csrf

                            <!--container -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Polling Station (Mandatory)</label>
                                        <select class="form-control" name="polling_station" data-rule="required"
                                                data-msg="Please select a polling station" id="polling_station">
                                            @foreach($polling_stations as $polling_station)
                                                <option value="{{$polling_station->polling_station}}"> {{$polling_station->polling_station}}</option>
                                            @endforeach
                                        </select>
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">ID NO</label>
                                        <input type="number" name="id_no" class="form-control" id="id_no_two"
                                               placeholder="ID Number"/>
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="form-group">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name_two">
                                        <div class="validate"></div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" id="middle_name_two"
                                               placeholder="Middle Name"
                                               data-msg="Please enter a middle name" />
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name_two"
                                               placeholder="Last Name" />
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Age</label>
                                        <input type="text" name="age" class="form-control" id="mobile_no_two"
                                               placeholder="Age" data-rule="required" data-msg="required"/>
                                        <div class="validate"></div>
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Level Of Education</label>
                                        <input type="text" name="level_of_education" class="form-control" id="mobile_no_two"
                                               placeholder="Level Of Education" data-rule="required" data-msg="required "/>
                                        <div class="validate"></div>
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Occupation</label>
                                        <input type="text" class="form-control" name="occupation" id="last_name_two"
                                               placeholder="Last Name" />
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Gender</label>
                                        <select class="form-control" name="gender" id="gender_two"
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
                                    <div class="sent-message">The details have been saved successfully !</div>
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
