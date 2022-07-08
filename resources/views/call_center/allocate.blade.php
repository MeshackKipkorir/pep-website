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

                        <form action="allocate-ward" method="post" role="form" class="php-email-form">
                        @csrf()
                        <!--container -->
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">User</label>
                                        <select class="form-control" name="user" data-rule="required"
                                                data-msg="Please Select recruitment status" id="recruitment">
                                            <option disabled selected>Select  user</option>
                                            @foreach($users as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
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
