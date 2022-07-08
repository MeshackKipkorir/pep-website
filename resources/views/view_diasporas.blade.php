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
                    <h2>Registered Diasporas</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                @foreach($countries as $country)
                    <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                        <p style="font-size: 20px;">{{$country -> country_of_residence}}</p>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Names</th>
                                        <th>Email</th>
                                        <th>Phone Number(Diaspora)</th>
                                        <th>Phone Number(Local)</th>
                                        <th>Passport No</th>
                                        <th>County</th>
                                        <th>Constituency</th>
                                        <th>Ward</th>
                                        <th>State Of Residence</th>
                                        <th>City Of Residence</th>
                                        <th>Profession</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($diasporas as $member)
                                        @if($member->country_of_residence == $country->country_of_residence)
                                            <tr>
                                                <td>{{$member -> name}}</td>
                                                <td>{{$member -> email}}</td>
                                                <td>{{$member -> diaspora_phone_number}}</td>
                                                <td>{{$member -> local_phone_number}}</td>
                                                <td>{{$member -> passport_no}}</td>
                                                <td>{{$member -> county}}</td>
                                                <td>{{$member -> constituency}}</td>
                                                <td>{{$member -> ward}}</td>
                                                <td>{{$member -> state_of_residence}}</td>
                                                <td>{{$member -> city_of_residence}}</td>
                                                <td>{{$member -> profession}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section><!-- End Contact Section -->
    </main>
@endsection
