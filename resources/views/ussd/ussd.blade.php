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
{{--                    <h2>Call Center Poll Report</h2>--}}
{{--                    <p>CHAMA CHA KAZI</p>--}}
                </div>

                <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                    <p style="font-size: 20px;">POLL REPORT</p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <table class="table table-striped table-responsive table-bordered" id="main_results">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

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
                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >GITIYE PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="gitiye_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >MANTHI PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="manthi_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >GACURU PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="gacuru_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >GIKUURU PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="gikuuru_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >GITUNE TEA FACTORY POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="gitune_coffee_factory">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >KANYWEE PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="kanywee_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >KARIMBENE SHOPPING CENTER POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="karimbene_shopping_center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >KAUTHENE PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="kauthene_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >KIAMURI PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="kiamuri_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >KIIJA PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="kiija_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >MAKANDUNE PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="makandune_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >MATETU PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="matetu_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >MCK MUKUUNE PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="mck_mukuune_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >MPINDI PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="mpindi_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >MUJWA PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="mujwa_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >MUTHIKIINE PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="muthikiine_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >NG'ONGA PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="ngonga_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >NKURA PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="nkura_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >RIKANA PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="rikana_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 mt-10" style="position: relative;margin-top: 30px;">
                            <h6 class="text-center" >ST PAULS PRIMARY SCHOOL POLLING CENTER</h6>
                            <table class="table table-striped table-responsive table-bordered" id="st_pauls_primary_school">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Candidate</th>
                                    <th>Votes</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </section><!-- End Contact Section -->

    </main>
    @push('custom-scripts')
        <script src="{{asset('assets/js/ussd.js')}}"></script>
    @endpush
@endsection

