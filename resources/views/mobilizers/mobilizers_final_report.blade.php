{{--@extends('layout')--}}

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
                    <h2>Mobilizers Report</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                    <p style="font-size: 20px;">Mobilizers Report</p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Polling Center</th>
                                    <th>Manager</th>
                                    <th>Assistant Manager</th>
                                    <th>LC</th>
                                    <th>ALC</th>
                                    <th>Total Recruited</th>
                                    <th>Total Registered Voters</th>
                                    <th>Percentage Of Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mobilizers as $index => $mobilizer)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$mobilizer->polling_station}}</td>
                                        <td>{{$mobilizer->manager}}</td>
                                        <td>{{$mobilizer->ass_manager}}</td>
                                        <td>{{$mobilizer->local_coordinator}}</td>
                                        <td>{{$mobilizer->ass_local_coordinator}}</td>
                                        <td>{{$mobilizer->total}}</td>
                                        <td>{{$mobilizer->no_of_voters}}</td>
                                        <td>{{number_format( ($mobilizer->total/$mobilizer->no_of_voters) * 100 , 2) }}
                                            %
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td>{{$mobilizers[0]->total_recruited}}</td>
                                    <td>{{$mobilizers[0]->total_voters}}</td>
                                    <td>{{number_format( ($mobilizers[0]->total_recruited/$mobilizers[0]->total_voters) * 100 , 2) }}
                                        %
                                    </td>
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
