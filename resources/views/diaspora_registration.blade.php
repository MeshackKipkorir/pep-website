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
                    <h2>Diaspora Registration</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">

                        <form action="{{url('save_diaspora')}}" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label class="form-group">Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="Your Names"
                                           data-rule="minlen:4" data-msg="Please enter at least 4 chars"/>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-group">Gender</label>
                                    <select class="form-control" name="gender" data-rule="required"
                                            data-msg="Please Select Your Gender">
                                        <option disabled selected="true">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>

                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-group">email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="Your Email" data-rule="email"
                                           data-msg="Please enter a valid email"/>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label class="form-group">Phone Number(Abroad)</label>
                                    <input type="number" name="diaspora_phone_number" class="form-control" id="name"
                                           placeholder="Phone Number"
                                           data-rule="required" data-msg="Please enter a valid phone number"/>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-group">Phone Number(Kenyan)</label>
                                    <input type="number" name="local_phone_number" class="form-control" id="name"
                                           placeholder="Phone Number"
                                           data-rule="minlen:10" data-msg="Please enter a valid phone number"/>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-group">Passport No.</label>
                                    <input type="text" class="form-control" name="passport_no" id="id_number"
                                           data-rule="required"
                                           placeholder="Passport No." data-msg="Please Enter A Valid Passport No"/>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label class="form-group">County Of Origin in Kenya</label>
                                    <select class="form-control" name="county" data-rule="required" id="county"
                                            onchange="setConstituency()">
                                        <option disabled selected="true">Select County</option>
                                        <option value="BARINGO">BARINGO</option>
                                        <option value="BOMET">BOMET</option>
                                        <option value="BUNGOMA">BUNGOMA</option>
                                        <option value="BUSIA">BUSIA</option>
                                        <option value="DIASPORA">DIASPORA</option>
                                        <option value="ELGEYO/MARAKWET">ELGEYO/MARAKWET</option>
                                        <option value="EMBU">EMBU</option>
                                        <option value="GARISSA">GARISSA</option>
                                        <option value="HOMA BAY">HOMA BAY</option>
                                        <option value="ISIOLO">ISIOLO</option>
                                        <option value="KAJIADO">KAJIADO</option>
                                        <option value="KAKAMEGA">KAKAMEGA</option>
                                        <option value="KERICHO">KERICHO</option>
                                        <option value="KIAMBU">KIAMBU</option>
                                        <option value="KILIFI">KILIFI</option>
                                        <option value="KIRINYAGA">KIRINYAGA</option>
                                        <option value="KISII">KISII</option>
                                        <option value="KISUMU">KISUMU</option>
                                        <option value="KITUI">KITUI</option>
                                        <option value="KWALE">KWALE</option>
                                        <option value="LAIKIPIA">LAIKIPIA</option>
                                        <option value="LAMU">LAMU</option>
                                        <option value="MACHAKOS">MACHAKOS</option>
                                        <option value="MAKUENI">MAKUENI</option>
                                        <option value="MANDERA">MANDERA</option>
                                        <option value="MARSABIT">MARSABIT</option>
                                        <option value="MERU">MERU</option>
                                        <option value="MIGORI">MIGORI</option>
                                        <option value="MOMBASA">MOMBASA</option>
                                        <option value="MURANGA">MURANGA</option>
                                        <option value="NAIROBI CITY">NAIROBI CITY</option>
                                        <option value="NAKURU">NAKURU</option>
                                        <option value="NANDI">NANDI</option>
                                        <option value="NAROK">NAROK</option>
                                        <option value="NYAMIRA">NYAMIRA</option>
                                        <option value="NYANDARUA">NYANDARUA</option>
                                        <option value="NYERI">NYERI</option>
                                        <option value="PRISONS">PRISONS</option>
                                        <option value="SAMBURU">SAMBURU</option>
                                        <option value="SIAYA">SIAYA</option>
                                        <option value="TAITA TAVETA">TAITA TAVETA</option>
                                        <option value="TANA RIVER">TANA RIVER</option>
                                        <option value="THARAKA - NITHI">THARAKA - NITHI</option>
                                        <option value="TRANS NZOIA">TRANS NZOIA</option>
                                        <option value="TURKANA">TURKANA</option>
                                        <option value="UASIN GISHU">UASIN GISHU</option>
                                        <option value="VIHIGA">VIHIGA</option>
                                        <option value="WAJIR">WAJIR</option>
                                        <option value="WEST POKOT">WEST POKOT</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-group">Constituency Of Origin in Kenya</label>
                                    <select id="constituency" class="form-control" name="constituency"
                                            data-rule="required" onchange="setWard()">
                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-group">Ward Of Origin in Kenya</label>
                                    <select id="ward" class="form-control" name="ward">

                                    </select>
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label class="form-group">Country Of Residence</label>
                                    <input type="text" name="country_of_residence" class="form-control" id="name"
                                           placeholder="Country Of Residence"
                                           data-rule="required" data-msg="Please enter your country of residence"/>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-group">State Of Residence</label>
                                    <input type="text" name="state_of_residence" class="form-control" id="name"
                                           placeholder="State Of Residence"
                                           data-rule="required" data-msg="Please enter state of residence"/>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-group">City Of Residence</label>
                                    <input type="text" name="city_of_residence" class="form-control" id="name"
                                           placeholder="City Of Residence"
                                           data-rule="required" data-msg="Please enter city of residence"/>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label class="form-group">Profession</label>
                                    <input type="text" name="profession" class="form-control" id="name"
                                           placeholder="Profession"
                                           data-rule="required" data-msg="Please enter your profession"/>
                                    <div class="validate"></div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your Details has been saved. Thank you!</div>
                            </div>
                            <div class="text-center">
                                <button type="submit">Submit</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->
    </main>
@endsection
