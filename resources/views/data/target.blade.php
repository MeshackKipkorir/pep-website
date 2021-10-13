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
                    <h2>2021 TARGET</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                @foreach($constituencies as $const)
                    <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                        <p style="font-size: 20px;">{{$const->constituency_name}} Constituency</p>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ward</th>
                                        <th>2019 population</th>
                                        <th>Current Registered Voters</th>
                                        <th>Projected Registered Voters</th>
                                        <th>Target 2022</th>
                                        <th>Target 2021</th>
                                        <th>Enrollment Per Kit</th>
                                        <th>Enrollment Per Day</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($counter=1)
                                    @foreach($statistics as $index => $stat)
                                        @if($stat->constituency_name == $const->constituency_name)
                                            <tr>
                                                <td>{{$counter++}}</td>
                                                <td>{{$stat->caw_name}}</td>
                                                <td>{{$stat->population_2019}}</td>
                                                <td>{{$stat->current_registered_voters}}</td>
                                                <td>{{$stat->projected_registered_voters}}</td>
                                                <td>{{$stat->target_2022}}</td>
                                                <td>{{$stat->target_2021}}</td>
                                                <td>{{$stat->enrollment_per_kit}}</td>
                                                <td>{{$stat->enrollment_per_day}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach($totals as $total)
                                        @if($total->constituency_name == $const->constituency_name)
                                        <tr>
                                            <td></td>
                                            <td>Total</td>
                                            <td>{{$total->population_2019}}</td>
                                            <td>{{$total->current_registered_voters}}</td>
                                            <td>{{$total->projected_registered_voters}}</td>
                                            <td>{{$total->target_2022}}</td>
                                            <td>{{$total->target_2021}}</td>
                                            <td>{{$total->enrollment_per_kit}}</td>
                                            <td>{{$total->enrollment_per_day}}</td>
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
