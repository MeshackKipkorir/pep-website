@extends('layout')

@section('content') 
<main id="main">
     <!-- ======= Contact Section ======= -->
     <section id="contact" class="contact" style="position:relative;top:100px;margin-bottom:100px;">
        <div class="container">
            

            <div class="section-title" data-aos="zoom-out">
                <h2>Aspirants Registration</h2>
                <p>PEOPLE'S EMPOWERMENT PARTY</p>
            </div>

            <div class="row mt-5">


                <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">

                    <form action="{{url('save_aspirant')}}" method="post" role="form" class="php-email-form">
                        @csrf
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
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>

                                </select>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-group">Position Vying For</label>
                                    <select class="form-control" name="position">
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
                                <select class="form-control" name="county" data-rule="required">
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
                                <input type="text" name="constituency" class="form-control" id="name" placeholder="Enter Your Constituency"
                                    data-rule="required" data-msg="Please Enter A Constituency"/>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-group">Ward</label>
                                <input type="text" name="ward" class="form-control" id="name" placeholder="Enter Your Ward"
                                    data-rule="required" data-msg="Please Enter Your Ward"/>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->
</main>
@endsection