@extends('layout')

@section('content')
    <main id="main">
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact" style="position:relative;top:100px;margin-bottom:100px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <img src="/assets/img/logo.jpeg" width="200px">
                        </div>
                    </div>
                </div>
{{--                <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">--}}
{{--                    <h2>Voter Registration</h2>--}}
{{--                    <p>Call Center</p>--}}
{{--                </div>--}}

                <div class="row mt-5">

                    <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">

                        <form action="save-registered-voters" method="post" role="form" class="php-email-form">
                            @csrf()
                            <!--container -->
                            <div class="container">
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
                                        <input type="text" class="form-control" name="other_name" id="middle_name"
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
                                        <input type="number" name="phone_number" class="form-control" id="mobile_no"
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
                                        <label class="form-group">Constituency</label>
                                        <select class="form-control" name="constituency" data-rule="required"
                                                data-msg="Please Select recruitment status" id="recruitment">
                                            <option disabled selected>Select  Constituency</option>
                                            @foreach($constituencies as $c)
                                            <option value="{{$c->constituency}}">{{$c->constituency}}</option>
                                            @endforeach
                                        </select>
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Ward</label>
                                        <select class="form-control" name="ward" data-rule="required"
                                                data-msg="Please Select recruitment status" id="recruitment">
                                            <option disabled selected>Select Ward</option>
                                            @foreach($wards as $w)
                                                <option value="{{$w->ward}}">{{$w->ward}}</option>
                                            @endforeach
                                        </select>
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Polling Center</label>
                                        <select class="form-control" name="polling_center" data-rule="required"
                                                data-msg="Please Select recruitment status" id="recruitment">
                                            <option disabled selected>Select Polling Center</option>
                                            @foreach($polling_stations as $p)
                                                <option value="{{$p->polling_center}}">{{$p->polling_center}}</option>
                                            @endforeach
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
