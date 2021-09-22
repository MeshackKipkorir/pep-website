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
                    <h2>Registered Agents</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                    <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                        <p style="font-size: 20px;">Registered Agents</p>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Names</th>
                                        <th>Polling Center</th>
                                        <th>Designation</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($agents as $index => $agent)
                                        @if($agent -> email != "derrickngeno" || $agent->name != 'Gordon Murugi')
                                            <tr>
                                                <td>{{$index + 1}}</td>
                                                <td>{{$agent -> name}}</td>
                                                <td>{{$agent -> polling_center}}</td>
                                                <td>{{$agent -> agent_type == "Agent A" ? 'Manager' : 'Assistant Manager'}}</td>
                                                <td>{{$agent -> email}}</td>
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
