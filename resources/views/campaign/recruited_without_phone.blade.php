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
                    <h2>Recruited Without Phone</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                    <p style="font-size: 20px;">Recuited Without Phone</p>
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
                                    <th>D.O.B</th>
                                    <th>Level Of Education</th>
                                    <th>Occupation</th>
                                    <th>Polling Station</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mobilizers as $index => $mobilizer)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$mobilizer -> first_name}} {{$mobilizer -> last_name }}</td>
                                        <td>{{$mobilizer -> id_no}}</td>
                                        <td>{{$mobilizer -> age}}</td>
                                        <td>{{$mobilizer -> level_of_education}}</td>
                                        <td>{{$mobilizer -> occupation ?? 'Null'}}</td>
                                        <td>{{$mobilizer->polling_station}}</td>
                                    </tr>
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
            </div>
        </section><!-- End Contact Section -->

    </main>
@endsection
