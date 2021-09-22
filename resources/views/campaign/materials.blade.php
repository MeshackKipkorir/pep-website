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

                        <form action="{{url('save_materials')}}" method="post" role="form" class="php-email-form">
                            @csrf
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
                                    <label class="form-group">ID Number (Mandatory)</label>
                                    <input type="number" name="id_no" class="form-control" id="id_number"
                                           placeholder="ID NO"
                                           data-rule="minlen:6" data-msg="Please enter at least 6 chars"/>
                                    <div class="validate" id="error">Select a polling center and enter ID</div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <button class="btn btn-primary btn-search" id="btn">Search</button>
                                </div>
                            </div>

                            <!--container -->
                            <div class="container" id="main_container">
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label class="form-group">ID NO</label>
                                        <input type="number" name="id_no" class="form-control" id="id_no_two"
                                               placeholder="ID Number" readonly/>
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="form-group">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name_two" readonly>
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" id="middle_name_two"
                                               placeholder="Middle Name"
                                               data-msg="Please enter a middle name" readonly/>
                                        <div class="validate"></div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name_two"
                                               placeholder="Last Name" readonly/>
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Mobile Number</label>
                                        <input type="number" name="mobile_no" class="form-control" id="mobile_no_two"
                                               placeholder="Mobile Number" data-rule="required" data-msg="Phone number is required, update to current or leave as it is"/>
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
                                <div class="row">

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="radio" name="granted" value="leso" id="flexRadioDefault1">--}}
{{--                                            <label class="form-check-label" for="flexRadioDefault1" style="position: relative;top: 13px;">--}}
{{--                                                Leso--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="radio" name="granted" value="t_shirt" id="flexRadioDefault2"  checked>--}}
{{--                                            <label class="form-check-label" for="flexRadioDefault2" style="position: relative;top: 13px;">--}}
{{--                                                T-Shirt--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="col-md-4 form-group"  id="reason">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="t_shirt">
                                            <label class="form-check-label" for="inlineCheckbox1">T-shirt</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="leso">
                                            <label class="form-check-label" for="inlineCheckbox1">Leso</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="apron">
                                            <label class="form-check-label" for="inlineCheckbox1">Apron</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="overall">
                                            <label class="form-check-label" for="inlineCheckbox1">Overall</label>
                                        </div>
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-2 form-group">
                                        <label class="form-group">Cash Token One</label>
                                        <input type="number" class="form-control" name="cash_token_one" id="last_name_two"
                                               placeholder="Amount"/>
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-2 form-group">
                                        <label class="form-group">Cash Token Two</label>
                                        <input type="number" class="form-control" name="cash_token_two" id="last_name_two"
                                               placeholder="Amount"/>
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-4 form-group">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="requested" checked>
                                            <label class="form-check-label" for="inlineCheckbox1">Requested</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="sent">
                                            <label class="form-check-label" for="inlineCheckbox1">Sent</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="issued">
                                            <label class="form-check-label" for="inlineCheckbox1">Issued</label>
                                        </div>
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
