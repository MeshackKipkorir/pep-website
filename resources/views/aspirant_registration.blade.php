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
                <h2>Aspirants Training Registration</h2>
                <p>CHAMA CHA KAZI</p>
            </div>

            <div class="row mt-5">


                <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">

                    <form action="{{url('save_aspirant')}}" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label class="form-group">Class (Mandatory)</label>
                                <select class="form-control" name="class" data-rule="required" data-msg="Please select a class" >
                                    <option disabled selected="true">Select Class</option>
                                    <option value="class_one">Saturday 7th August: Samburu, Laikipia & Nyandarua- Nyahururu</option>
                                    <option value="class_two">Monday 9th August: Nakuru & Baringo- Nakuru</option>
                                    <option value="class_three">Thursday 12th August: Kericho, Bomet & Narok - Narok</option>
                                    <option value="class_four">Saturday 14th August: Nyeri</option>
                                    <option value="class_five">Monday 16th August: Kirinyaga-Sagana</option>
                                    <option value="class_six">Tuesday 17th August: Muranga- Stanley's Haven</option>
                                    <option value="class_seven">Wednesday 18th August: Kiambu- Ruaka</option>
                                    <option value="class_eight">Thursday 2nd September : Kajiado & Nairobi</option>
                                    <option value="class_nine">Friday 3rd September: Garrisa, Wajir, Mandera, Machakos, Makueni & Kitui- Machakos</option>
                                    <option value="class_ten">Saturday 4th September: Meru, Tharaka Nithi, Embu, Isiolo, Marsabit- Meru</option>
                                    <option value="class_eleven">Monday 6th September: Tana River, Lamu, Taita Taveta, Kilifi, Mombasa & Kwale- Mombasa</option>
                                    <option value="class_twelve">Wednesday 8th September: Kisii & Nyamira- Kisii</option>
                                    <option value="class_thirteen">Friday 10th September: Uasin Gishu, Nandi, Elegeyo Marakwet- Eldoret</option>
                                    <option value="class_fourteen">Saturday 11th September: Trans Nzoia, West Pokot & Turkana- Kitale</option>
                                    <option value="class_fifteen">Monday 13th September: Bungoma, Vihiga, Busia & Kakamega- Kakamega</option>
                                    <option value="class_sixteen">Tuesday 14th September: Migori, Homa Bay, Kisumu & Siaya- Kisumu</option>
                                </select>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label class="form-group">Surname</label>
                                <input type="text" name="surname" class="form-control" id="name" placeholder="Surname Name"
                                    data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-group">Other Names</label>
                                <input type="text" class="form-control" name="other_names" id="name"
                                    placeholder="Other Names" data-msg="Please enter other names" />
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-group">email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label class="form-group">Mobile Number</label>
                                <input type="number" name="mobile_no" class="form-control" id="name" placeholder="Mobile Number"
                                    data-rule="minlen:10" data-msg="Please enter a valid phone number" />
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-group">ID Number</label>
                                <input type="number" class="form-control" name="id_number" id="id_number"
                                    data-rule="minlen:6"
                                    placeholder="ID Number" data-msg="Please Enter A Valid ID No" />
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-group">Date Of Birth</label>
                                <input type="date" class="form-control" name="dob" id="email" data-rule="required" data-msg="Please Enter D.O.B"/>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label class="form-group">Gender</label>
                                <select class="form-control" name="gender" data-rule="required" data-msg="Please Select Your Gender">
                                    <option disabled selected="true">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>

                                </select>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-group">Position Vying For</label>
                                    <select class="form-control" name="position">
                                        <option disabled selected="true">Select Position</option>
                                        <option value="President">President</option>
                                        <option value="Governor">Governor</option>
                                        <option value="Senator">Senator</option>
                                        <option value="Women Rep">Women Rep</option>
                                        <option value="M.P">M.P</option>
                                        <option value="MCA">MCA</option>
                                        <option value="Leader">Leader</option>
                                    </select>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-group">Special Interest</label>
                                <select class="form-control" name="special_interest">
                                <option disabled selected="true">Select Special Interest</option>
                                <option value="Ethnic Minority">Ethnic Minority</option>
                                <option value="Marginalized Communities">Marginalized Communities</option>
                                <option value="PWDs">PWDs</option>
                                <option value="Youth">Youth</option>
                                <option value="Women">Women</option>
                                <option value="N/A">N/A</option>
                                    </select>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label class="form-group">County</label>
                                <select class="form-control" name="county" data-rule="required" id="county" onchange="setConstituency()">
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
                                <label class="form-group">Constituency</label>
                                <select id="constituency"  class="form-control" name="constituency" data-rule="required" onchange="setWard()">

                                </select>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-group">Ward</label>
                                <select id="ward" class="form-control" name="ward">

                                </select>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your Details has been saved. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Submit</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->
</main>
@endsection
