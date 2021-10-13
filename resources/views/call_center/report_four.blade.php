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
                    <h2>Call Center Poll Report</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                    <p style="font-size: 20px;">Poll Report</p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $index => $result)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$result->candidate}}</td>
                                        <td>{{$result->total}}</td>
                                        <td>{{number_format(($result->total / $total[0]->total)*100,2)}} %</td>
                                    </tr>
                                @endforeach
                                @foreach($non_voted_candidates as $index => $nv)
                                    <tr>
                                        <td>{{13 - count($non_voted_candidates) + ($index + 1) }}</td>
                                        <td>{{$nv->name}}</td>
                                        <td>0</td>
                                        <td>0 %</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td>Total</td>
                                    <td>{{$total[0]->total}}</td>
                                    <td>100%</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results_two as $index => $result)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$result->candidate}}</td>
                                        <td>{{$result->total}}</td>
                                        <td>{{number_format(($result->total / $total[0]->total)*100,2)}} %</td>
                                    </tr>
                                @endforeach
                                @foreach($non_voted_candidates as $index => $nv)
                                    <tr>
                                        <td>{{13 - count($non_voted_candidates) + ($index + 1) }}</td>
                                        <td>{{$nv->name}}</td>
                                        <td>0</td>
                                        <td>0 %</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td>Total</td>
                                    <td>{{$total_two[0]->total}}</td>
                                    <td>100%</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>

                <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                    <p style="font-size: 20px;">Agents Statistics</p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Agent</th>
                                    <th>Total Calls Picked</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($agents_stats as $index => $stats)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$stats->calling_agent}}</td>
                                        <td>{{$stats->total}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Total Picked</td>
                                    <td>{{$total_picked}}</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Total Missed</td>
                                    <td>{{$total_missed}}</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Total Invalid</td>
                                    <td>{{$total_invalid}}</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Total Unreachable</td>
                                    <td>{{$total_unreachable}}</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Total Calls</td>
                                    <td>{{$total_calls}}</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Invalid</td>
                                    <td>{{$invalid[0]->total}}</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Average Calls Per Agent</td>
                                    <td>{{number_format($agent_average,2)}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="container">
                    @foreach($polling_stations as $polling_station)
                        <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                            <p style="font-size: 20px;text-align: left;">{{$polling_station->polling_station}}</p>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-responsive">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Candidate</th>
                                        <th>Votes</th>
                                        <th>Percentage</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($counter=1)
                                    @foreach($polling_station_results as $index => $result)
                                        @if($result->polling_center == $polling_station->polling_station)
                                            <tr>
                                                <td>{{$counter++}}</td>
                                                <td>{{$result->candidate}}</td>
                                                <td>{{$result->votes}}</td>
                                                @foreach($polling_station_total as $total)
                                                    @if($total->polling_center == $polling_station->polling_station)
                                                        <td>{{number_format(($result->votes/$total->total) * 100,2)}} %</td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main>
@endsection
