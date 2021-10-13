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
                    <h2>Members Registered Via USSD</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>


                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive" id="ussd">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Names</th>
                                        <th>ID No</th>
                                        <th>Phone No</th>
                                        <th>County</th>
                                        <th>Constituency</th>
                                        <th>Ward</th>
                                        <th>Polling Station</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

        </section><!-- End Contact Section -->
    </main>
@endsection
