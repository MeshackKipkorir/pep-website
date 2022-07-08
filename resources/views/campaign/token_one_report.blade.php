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
                    <h2>Token One Report</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                    <p style="font-size: 20px;">Token One Report</p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Polling Center</th>
                                    <th>Polling Center Manager</th>
                                    <th>Total Token With Phone</th>
                                    <th>Percentage</th>
                                    <th>Total Voters</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($polling_centers as $index => $pc)
                                    <tr>
                                      <td>{{$index + 1}}</td>
                                        <td>{{$pc->polling_station}}</td>
                                        <td>{{$pc->manager}}</td>
                                        @foreach($total_with_phone as $ts)
                                            @if($ts->polling_station == $pc -> polling_station)
                                                <td>{{$ts -> total}}</td>
                                            @endif
                                        @endforeach
                                        @foreach($total_with_phone as $ts)
                                            @if($ts->polling_station == $pc -> polling_station)
                                                @if(number_format(($ts -> total / $pc->no_of_voters) * 100,2) >= 90)
                                                <td style="background-color: blue;color:white;">{{number_format(($ts -> total / $pc->no_of_voters) * 100,2)}} %</td>
                                                @elseif(number_format(($ts -> total / $pc->no_of_voters) * 100,2) >= 70 && number_format(($ts -> total / $pc->no_of_voters) * 100,2) < 90)
                                                <td style="background-color: blue;color:white;">{{number_format(($ts -> total / $pc->no_of_voters) * 100,2)}} %</td>
                                                @elseif(number_format(($ts -> total / $pc->no_of_voters) * 100,2) >= 50 && number_format(($ts -> total / $pc->no_of_voters) * 100,2) < 70)
                                                    <td style="background-color: green;color:white;">{{number_format(($ts -> total / $pc->no_of_voters) * 100,2)}} %</td>
                                                @elseif(number_format(($ts -> total / $pc->no_of_voters) * 100,2) >= 40 && number_format(($ts -> total / $pc->no_of_voters) * 100,2) < 50)
                                                    <td style="background-color: orange;color:white;">{{number_format(($ts -> total / $pc->no_of_voters) * 100,2)}} %</td>
                                                @elseif(number_format(($ts -> total / $pc->no_of_voters) * 100,2) < 40)
                                                    <td style="background-color: red;color:white;">{{number_format(($ts -> total / $pc->no_of_voters) * 100,2)}} %</td>
                                                @endif
                                                @endif
                                        @endforeach
                                        <td>{{$pc->no_of_voters}}</td>
                                    </tr>
                                @endforeach
                                @foreach($inactive_stations as $index => $dts)
                                    <tr>
                                        <td>{{ 20 - (20 - count($total_with_phone) - $index -1)}}</td>
                                        <td>{{$dts->polling_station}}</td>
                                        <td>{{$dts->manager}}</td>
                                        <td>0</td>
                                        <td style="background-color: red;color: white">0%</td>
                                        <td>{{$dts->no_of_voters}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Totals</td>
                                    <td>{{$total_wp[0] -> total}}</td>
                                    <td>{{number_format(($total_wp[0] -> total / 11045)*100 ,2)}} %</td>
                                    <td>11045</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main>
@endsection
