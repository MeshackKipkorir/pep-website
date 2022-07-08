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
                    <p style="font-size: 20px;">USSD Poll Report</p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($presidential_results as $index => $result )
                                    <tr>
                                        <td>{{$index + 1}}
                                        </td>
                                        <td>{{$presidents_dict[(intval($result->voting_for) -1)]['name'] }}
                                        </td>
                                        <td>{{ $result -> votes }}
                                        </td>
                                        <td>{{ number_format($result->percentage, 2) }} %
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>#</td>
                                    <td>Total</td>
                                    <td>{{$total}}</td>
                                    <td>100 %</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                    <p style="font-size: 20px;">Polling Center Results</p>
                </div>

                <div class="container">
                    <div class="row">
                        @foreach($polling_stations as $polling_station)
                            <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                                <h6 class="text-center" style="font-weight: bold;">{{$polling_station -> polling_center}} POLLING CENTER</h6>
                                <table class="table table-striped table-bordered" id="polling_station_results">
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
                                        @if($result->polling_station == $polling_station -> polling_center)
                                            <tr>
                                                <td>{{$counter++}}</td>
                                                <td>{{ $presidents_dict[(intval($result->voting_for) -1)]['name'] }}</td>
                                                <td>{{$result->votes}}</td>
                                                @foreach($polling_total as $total)
                                                    @if($total->polling_station == $polling_station -> polling_center)
                                                        <td>{{number_format(($result->votes / $total->total)*100, 2)}} %</td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section><!-- End Contact Section -->

    </main>
    @push('custom-scripts')
        <script src="{{asset('assets/js/ussd.js')}}"></script>
    @endpush
@endsection

