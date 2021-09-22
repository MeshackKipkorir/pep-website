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
                    <h2>Not Recruited Without Phone No</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                @foreach($polling_centers as $polling_center)
                    <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                        <p style="font-size: 20px;">{{$polling_center -> polling_station}}</p>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>ID No</th>
                                        <th>Phone No</th>
                                        <th>D.O.B</th>
                                        <th>Gender</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($counter=1)
                                    @foreach($mobilizers as $index => $mobilizer)
                                        @if($polling_center -> polling_station == $mobilizer->polling_center)
                                            <tr>
                                                <td>{{$counter++}}</td>
                                                <td>{{$mobilizer -> first_name}} {{$mobilizer -> last_name }}</td>
                                                <td>{{$mobilizer -> id_no}}</td>
                                                <td>{{$mobilizer -> phone_number}}</td>
                                                <td>{{$mobilizer -> DOB}}</td>
                                                <td>{{$mobilizer -> gender}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach($totals as $total)
                                        @if($polling_center->polling_station == $total->polling_center)
                                    <tr>
                                        <td></td>
                                        <td>Total</td>
                                        <td>{{$total -> total}}</td>
                                        <td>Percentage</td>
                                        <td>{{number_format(($total->total / $polling_center->no_of_voters) * 100 ,2)}} %</td>
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
