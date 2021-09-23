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
                        <div class="col-md-8">
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
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main>
@endsection
