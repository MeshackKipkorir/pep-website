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
                    <h2>Call Center</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">

                        <form action="{{url('save_opinion')}}" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="row">

                                <div class="col-md-5 form-group">
                                    <label class="form-group">Calling Agent</label>
                                    <input type="text" class="form-control" value="{{$agent}}" name="calling_agent" readonly>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <!--container -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label class="form-group">ID NO</label>
                                        <input type="number" name="id_no" class="form-control" value="{{$user->id_no}}"
                                               placeholder="ID Number" readonly/>
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label class="form-group"> Names</label>
                                        <input type="text" class="form-control" name="names" value="{{$user->first_name}} {{$user->middle_name}}" readonly>
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label class="form-group">Polling Center</label>
                                        <input type="text" class="form-control" name="polling_center" value="{{$user->polling_center}}"
                                               placeholder="Middle Name"
                                               data-msg="Please enter a middle name" readonly/>
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label class="form-group">Phone No</label>
                                        <input type="text" class="form-control" name="phone_no" value="{{$user->phone_number}}"
                                               placeholder="Middle Name"
                                               data-msg="Please enter a middle name" readonly/>
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label class="form-group">Call Status</label>
                                        <select class="form-control" name="call_status"
                                                data-rule="required" data-msg="This is required" id="call_status" onchange="callStatus()">
                                            <option disabled selected>Select</option>
                                            <option value="picked">picked</option>
                                            <option value="unreachable">unreachable</option>
                                            <option value="missed">missed</option>
                                            <option value="invalid">invalid</option>
                                        </select>
                                        <div class="validate"></div>
                                    </div>
                                </div>

                                <div id="main_area">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="text-center">Question A</h4>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Whom will you vote for?</label>
                                        <select class="form-control" name="candidate"
                                                data-rule="required" data-msg="required" id="candidate" onchange="reason()">
                                            <option disabled selected>Select</option>
                                            @foreach($candidates as $candidate)
                                                <option value="{{$candidate->id}}">{{$candidate->name}}</option>
                                                @endforeach
                                        </select>
                                        <div class="validate"></div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label class="form-group">Whom will you vote for?(after convincing)</label>
                                        <select class="form-control" name="candidate_second_time"
                                                data-rule="required" data-msg="required" id="candidate_two">
                                            <option disabled selected>Select</option>
                                            @foreach($candidates as $candidate)
                                                <option value="{{$candidate->id}}">{{$candidate->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="validate"></div>
                                    </div>

{{--                                    <div class="col-md-4 form-group" id="yes">--}}
{{--                                        <label class="form-group">Why will you vote for him?</label>--}}
{{--                                        <input type="text" class="form-control" name="voting_reason"--}}
{{--                                               placeholder=""--}}
{{--                                               />--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group" id="no" style="display: none;">--}}
{{--                                        <label class="form-group">Why ?</label>--}}
{{--                                        <input type="text" class="form-control" name="voting_reason"--}}
{{--                                               placeholder=""--}}
{{--                                               data-msg="Please enter a middle name"/>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group" style="display:none;" id="consider">--}}
{{--                                        <label class="form-group">Would you consider voting for kabobo?</label>--}}
{{--                                        <select class="form-control" name="voting_status"--}}
{{--                                                data-rule="required" data-msg="Please Enter Gender">--}}
{{--                                            <option disabled selected>Select</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                            <option value="2">Undecided</option>--}}

{{--                                        </select>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group" id="convince" style="display: none;">--}}
{{--                                        <label class="form-group">What would make you vote for kabobo?</label>--}}
{{--                                        <input type="text" name="make_you_vote" class="form-control"/>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label class="form-group">Did you receive cash token one?</label>--}}
{{--                                        <select class="form-control" name="received_token"--}}
{{--                                                data-rule="required" data-msg="Please Enter Gender">--}}
{{--                                            <option disabled selected>Select</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label class="form-group">can we use this line to process Cash Token 2 by Mpesa?</label>--}}
{{--                                        <select class="form-control" name="current_token_no" id="token_line"--}}
{{--                                                data-rule="required" data-msg="Please Enter Gender" onchange="token()">--}}
{{--                                            <option disabled selected>Select</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group" style="display: none;" id="update_line">--}}
{{--                                        <label class="form-group">which line can we use ?</label>--}}
{{--                                        <input type="number" name="updated_token_no" class="form-control"/>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label class="form-group">Can you mobilize for kabobo ?</label>--}}
{{--                                        <select class="form-control" name="mobilize_for_kabobo" id="token_line"--}}
{{--                                                data-rule="required" data-msg="Please Enter Gender">--}}
{{--                                            <option disabled selected>Select</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}
                                </div>

{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <h4 class="text-center">Question B</h4>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="row">--}}

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label class="form-group">Have you received a token from Kabobos?</label>--}}
{{--                                        <select class="form-control" name="received_token" id="token_status"--}}
{{--                                                data-rule="required" data-msg="Please Enter Gender">--}}
{{--                                            <option disabled selected>Select</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label class="form-group">Through whom ?</label>--}}
{{--                                        <input type="text" class="form-control" name="received_token_from">--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label class="form-group">How much ?</label>--}}
{{--                                        <input type="number" class="form-control" name="received_token_amount">--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="row">--}}

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label class="form-group">Do you know his party ?</label>--}}
{{--                                        <select class="form-control" name="party" id="token_status"--}}
{{--                                                data-rule="required" data-msg="Please Enter Gender">--}}
{{--                                            <option disabled selected>Select</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label class="form-group">Do you know his party slogan ?</label>--}}
{{--                                        <select class="form-control" name="party_slogan" id="token_status"--}}
{{--                                                data-rule="required" data-msg="Please Enter Gender">--}}
{{--                                            <option disabled selected>Select</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label class="form-group">Do you know his party symbol?</label>--}}
{{--                                        <select class="form-control" name="party_symbol" id="token_status"--}}
{{--                                                data-rule="required" data-msg="Please Enter Gender">--}}
{{--                                            <option disabled selected>Select</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label class="form-group">Do you know his official name?</label>--}}
{{--                                        <select class="form-control" name="official_name" id="token_status"--}}
{{--                                                data-rule="required" data-msg="Please Enter Gender">--}}
{{--                                            <option disabled selected>Select</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label class="form-group">Can you be our agent?</label>--}}
{{--                                        <select class="form-control" name="be_our_agent"--}}
{{--                                                data-rule="required" data-msg="Please Enter Gender">--}}
{{--                                            <option disabled selected>Select</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label class="form-group">Can I send advanced payment by Mpesa ?</label>--}}
{{--                                        <select class="form-control" name="advanced_payment"--}}
{{--                                                data-rule="required" data-msg="Please Enter Gender">--}}
{{--                                            <option disabled selected>Select</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <h4 class="text-center">Question C</h4>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="row">--}}

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label class="form-group">Have you received advanced payment ?</label>--}}
{{--                                        <select class="form-control" name="confirm_receive_token" id="voting_status"--}}
{{--                                                data-rule="required" data-msg="Please Enter Gender">--}}
{{--                                            <option disabled selected>Select</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label class="form-group">Will you vote for Kabobo?</label>--}}
{{--                                        <select class="form-control" name="vote_for_kabobo" id="voting_status"--}}
{{--                                                data-rule="required" data-msg="Please Enter Gender">--}}
{{--                                            <option disabled selected>Select</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 form-group">--}}
{{--                                        <label class="form-group">Will you mobilize others to vote for Kabobo ?</label>--}}
{{--                                        <select class="form-control" name="will_mobilize"--}}
{{--                                                data-rule="required" data-msg="Please select reason">--}}
{{--                                            <option disabled selected>Select</option>--}}
{{--                                            <option value="1">Yes</option>--}}
{{--                                            <option value="0">No</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                        <div class="validate"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                        </div>

                                <div class="mb-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">The details have been saved successfully !</div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-info" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->
    </main>
    @push('custom-scripts')
        <script type="text/javascript" src="assets/js/call-center.js"></script>
    @endpush
@endsection
