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
                    <h2>Materials Status Report</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                    <p style="font-size: 20px;">General Materials Report</p>
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
                                    <th>Assistant Manager</th>
                                    <th>Total Registered Voters</th>
                                    <th>Total</th>
                                    <th>Percentage</th>
                                    <th>Bonus</th>
                                    <th>Total T-shirts</th>
                                    <th>Total Lesos</th>
                                    <th>Total Aprons</th>
                                    <th>Total Overall</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($polling_centers as $index => $pc)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$pc->polling_station}}</td>
                                        <td>{{$pc->manager}}</td>
                                        <td>{{$pc->ass_manager}}</td>
                                        <td>{{$pc->no_of_voters}}</td>
                                        @foreach($total_ts_pc as $ts)
                                            @if($ts->polling_station == $pc -> polling_station)
                                                <td>{{$ts -> total}}</td>
                                            @endif
                                        @endforeach
                                        @foreach($total_ts_pc as $ts)
                                            @if($ts->polling_station == $pc -> polling_station)
                                                @if(number_format(($ts -> total / $pc -> no_of_voters) * 100,2) > 90)
                                                <td style="background-color: blue;color:white;">{{number_format(($ts -> total / $pc -> no_of_voters) * 100,2) }} %</td>
                                                @endif
                                                @if(number_format(($ts -> total / $pc -> no_of_voters) * 100,2) > 70 && number_format(($ts -> total / $pc -> no_of_voters) * 100,2) < 90)
                                                    <td style="background-color: yellow;color:black;">{{number_format(($ts -> total / $pc -> no_of_voters) * 100,2) }} %</td>
                                                @endif
                                                @if(number_format(($ts -> total / $pc -> no_of_voters) * 100,2) > 50 && number_format(($ts -> total / $pc -> no_of_voters) * 100,2) < 70)
                                                    <td style="background-color: green;color:white;">{{number_format(($ts -> total / $pc -> no_of_voters) * 100,2) }} %</td>
                                                @endif
                                                @if(number_format(($ts -> total / $pc -> no_of_voters) * 100,2) > 40 && number_format(($ts -> total / $pc -> no_of_voters) * 100,2) < 50)
                                                    <td style="background-color: orange;color:white;">{{number_format(($ts -> total / $pc -> no_of_voters) * 100,2) }} %</td>
                                                @endif
                                                @if(number_format(($ts -> total / $pc -> no_of_voters) * 100,2) < 40)
                                                    <td style="background-color: red;color:white;">{{number_format(($ts -> total / $pc -> no_of_voters) * 100,2) }} %</td>
                                                @endif
                                            @endif
                                        @endforeach
                                        @foreach($total_ts_pc as $ts)
                                            @if($ts->polling_station == $pc -> polling_station)
                                                <td>{{number_format(($ts -> total / $pc -> no_of_voters) * 100,2) * 250}} /=</td>
                                            @endif
                                        @endforeach
                                        @foreach($total_requested_ts as $ts)
                                            @if($ts->polling_station == $pc -> polling_station)
                                                @if($ts->total_requested > 0)
                                                    <td>{{$ts -> total_requested}}</td>
                                                @else
                                                    <td>{{0}}</td>
                                                @endif
                                            @endif
                                        @endforeach
                                        @foreach($total_requested_ls as $ts)
                                            @if($ts->polling_station == $pc -> polling_station)
                                                <td>{{$ts -> total_requested}}</td>
                                            @endif
                                        @endforeach
                                        @foreach($total_requested_ap as $ts)
                                            @if($ts->polling_station == $pc -> polling_station)
                                                <td>{{$ts -> total_requested}}</td>
                                            @endif
                                        @endforeach
                                        @foreach($total_requested_overall as $ts)
                                            @if($ts->polling_station == $pc -> polling_station)
                                                <td>{{$ts -> total_requested}}</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td>11045</td>
                                    <td>{{$total_ts[0]->total + $total_ls[0]->total + $total_ap[0]->total + $total_ov[0]->total}}</td>
                                    <td>{{number_format((($total_ts[0]->total + $total_ls[0]->total + $total_ap[0]->total + $total_ov[0]->total)/11045) * 100, 2)}} %</td>
                                    <td></td>
                                    <td>{{$total_ts[0]->total}}</td>
                                    <td>{{$total_ls[0]->total}}</td>
                                    <td>{{$total_ap[0]->total}}</td>
                                    <td>{{$total_ov[0]->total}}</td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


{{--                <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">--}}
{{--                    <p style="font-size: 20px;">T-Shirt Distribution Report</p>--}}
{{--                </div>--}}

{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <table class="table table-responsive">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>Polling Center</th>--}}
{{--                                    <th>Polling Center Manager</th>--}}
{{--                                    <th>Assistant Manager</th>--}}
{{--                                    <th>Total Requested</th>--}}
{{--                                    <th>Total Sent</th>--}}
{{--                                    <th>Total Issued</th>--}}
{{--                                    <th>Total Voters</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($t_shirts as $index => $material)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$index + 1}}</td>--}}
{{--                                        <td>{{$material->polling_station}}</td>--}}
{{--                                        <td>{{$material->manager}}</td>--}}
{{--                                        @if($total_requested_ts)--}}
{{--                                        @foreach($total_requested_ts as $p)--}}
{{--                                            @if($p->polling_station == $material->polling_station)--}}
{{--                                                <td>{{$p->total_requested}}</td>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                        @else--}}
{{--                                            <td>0</td>--}}
{{--                                        @endif--}}
{{--                                        @if(count($total_sent_ts) > 0)--}}
{{--                                            @foreach($total_sent_ts as $m)--}}
{{--                                                @if($m->polling_station == $material->polling_station)--}}
{{--                                                    <td>{{$m->total_sent}}</td>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        @else--}}
{{--                                            <td>0</td>--}}
{{--                                        @endif--}}
{{--                                        @if(count($total_issued_ts) > 0)--}}
{{--                                        @foreach($total_issued_ts as $i)--}}
{{--                                            @if($i->polling_station == $material->polling_station)--}}
{{--                                                <td>{{$i->total_issued}}</td>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                        @else--}}
{{--                                            <td>0</td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{$material->no_of_voters}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                @foreach($dormant_t_shirts as $index => $dts)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ 20 - (20 - count($total_requested_ts) - $index -1)}}</td>--}}
{{--                                        <td>{{$dts->polling_station}}</td>--}}
{{--                                        <td>{{$dts->manager}}</td>--}}
{{--                                        <td>0</td>--}}
{{--                                        <td>0</td>--}}
{{--                                        <td>0</td>--}}
{{--                                        <td>{{$dts->no_of_voters}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                <tr>--}}
{{--                                    <td></td>--}}
{{--                                    <td></td>--}}
{{--                                    <td>Total</td>--}}
{{--                                    <td>{{$total_ts[0]->total}}</td>--}}
{{--                                    <td>0</td>--}}
{{--                                    <td>0</td>--}}
{{--                                    <td>{{$total_voters[0]->total}}</td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">--}}
{{--                    <p style="font-size: 20px;">Leso Distribution Report</p>--}}
{{--                </div>--}}

{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <table class="table table-responsive">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>Polling Center</th>--}}
{{--                                    <th>Polling Center Manager</th>--}}
{{--                                    <th>Total Requested</th>--}}
{{--                                    <th>Total Sent</th>--}}
{{--                                    <th>Total Issued</th>--}}
{{--                                    <th>Total Voters</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($lesos as $index => $material)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$index + 1}}</td>--}}
{{--                                        <td>{{$material->polling_station}}</td>--}}
{{--                                        <td>{{$material->manager}}</td>--}}
{{--                                        @if(count($total_requested_ls) > 0)--}}
{{--                                        @foreach($total_requested_ls as $p)--}}
{{--                                            @if($p->polling_station == $material->polling_station)--}}
{{--                                                <td>{{$p->total_requested}}</td>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                        @else--}}
{{--                                            <td>0</td>--}}
{{--                                        @endif--}}
{{--                                        @if(count($total_sent_ls) > 0)--}}
{{--                                            @foreach($total_sent_ls as $m)--}}
{{--                                                @if($m->polling_station == $material->polling_station)--}}
{{--                                                    <td>{{$m->total_sent}}</td>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        @else--}}
{{--                                            <td>0</td>--}}
{{--                                        @endif--}}
{{--                                        @if(count($total_issued_ls) > 0)--}}
{{--                                            @foreach($total_issued_ls as $i)--}}
{{--                                                @if($i->polling_station == $material->polling_station)--}}
{{--                                                    <td>{{$i->total_issued}}</td>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        @else--}}
{{--                                            <td>0</td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{$material->no_of_voters}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                @foreach($dormant_lesos as $index => $dts)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ 20 - (20 - count($total_requested_ls) - $index -1)}}</td>--}}
{{--                                        <td>{{$dts->polling_station}}</td>--}}
{{--                                        <td>{{$dts->manager}}</td>--}}
{{--                                        <td>0</td>--}}
{{--                                        <td>0</td>--}}
{{--                                        <td>0</td>--}}
{{--                                        <td>{{$dts->no_of_voters}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                <tr>--}}
{{--                                    <td></td>--}}
{{--                                    <td></td>--}}
{{--                                    <td>Total</td>--}}
{{--                                    <td>{{$total_ls[0]->total}}</td>--}}
{{--                                    <td>0</td>--}}
{{--                                    <td>0</td>--}}
{{--                                    <td>{{$total_voters[0]->total}}</td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">--}}
{{--                    <p style="font-size: 20px;">Apron Distribution Report</p>--}}
{{--                </div>--}}

{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <table class="table table-responsive">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>Polling Center</th>--}}
{{--                                    <th>Polling Center Manager</th>--}}
{{--                                    <th>Total Requested</th>--}}
{{--                                    <th>Total Sent</th>--}}
{{--                                    <th>Total Issued</th>--}}
{{--                                    <th>Total Voters</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($aprons as $index => $material)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$index + 1}}</td>--}}
{{--                                        <td>{{$material->polling_station}}</td>--}}
{{--                                        <td>{{$material->manager}}</td>--}}
{{--                                        @if(count($total_requested_ap) > 0)--}}
{{--                                        @foreach($total_requested_ap as $p)--}}
{{--                                            @if($p->polling_station == $material->polling_station)--}}
{{--                                                <td>{{$p->total_requested}}</td>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                        @else--}}
{{--                                            <td>0</td>--}}
{{--                                        @endif--}}
{{--                                        @if(count($total_sent_ap) > 0)--}}
{{--                                            @foreach($total_sent_ap as $m)--}}
{{--                                                @if($m->polling_station == $material->polling_station)--}}
{{--                                                    <td>{{$m->total_sent}}</td>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        @else--}}
{{--                                            <td>0</td>--}}
{{--                                        @endif--}}
{{--                                        @if(count($total_issued_ap) > 0)--}}
{{--                                            @foreach($total_issued_ap as $i)--}}
{{--                                                @if($i->polling_station == $material->polling_station)--}}
{{--                                                    <td>{{$i->total_issued}}</td>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        @else--}}
{{--                                            <td>0</td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{$material->no_of_voters}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                @foreach($dormant_aprons as $index => $dts)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ 20 - (20 - count($total_requested_ap) - $index -1)}}</td>--}}
{{--                                        <td>{{$dts->polling_station}}</td>--}}
{{--                                        <td>{{$dts->manager}}</td>--}}
{{--                                        <td>0</td>--}}
{{--                                        <td>0</td>--}}
{{--                                        <td>0</td>--}}
{{--                                        <td>{{$dts->no_of_voters}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                <tr>--}}
{{--                                    <td></td>--}}
{{--                                    <td></td>--}}
{{--                                    <td>Total</td>--}}
{{--                                    <td>{{$total_ap[0]->total}}</td>--}}
{{--                                    <td>0</td>--}}
{{--                                    <td>0</td>--}}
{{--                                    <td>{{$total_voters[0]->total}}</td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </section><!-- End Contact Section -->

    </main>
@endsection
