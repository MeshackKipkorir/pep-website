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
                    <h2>Registered Aspirants Per County</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                @foreach($counties as $county)
                <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                    <p style="font-size: 20px;">{{$county->county}} COUNTY</p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th>Surname</th>
                                    <th>First Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Positon</th>
                                    <th>County</th>
                                    <th>Constituency</th>
                                    <th>Ward</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($aspirants as $index =>  $aspirant)
                                    @if($aspirant->county == $county->county)
                                    <tr>
                                        <td>{{$aspirant -> surname}}</td>
                                        <td>{{$aspirant -> other_names}}</td>
                                        <td>{{$aspirant -> mobile_no}}</td>
                                        <td>{{$aspirant -> email}}</td>
                                        <td>{{$aspirant -> position}}</td>
                                        <td>{{$aspirant -> county}}</td>
                                        <td>{{$aspirant -> constituency}}</td>
                                        <td>{{$aspirant -> ward}}</td>
                                        <td></td>
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
