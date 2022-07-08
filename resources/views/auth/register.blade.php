@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Polling Center') }}</label>

                            <div class="col-md-6">
                                <select id="polling_center" class="form-control @error('polling_center') is-invalid @enderror" name="polling_center" value="{{ old('polling_center') }}" required autocomplete="polling_center">
                                    <option disabled selected>Select Polling Center</option>
                                    <option value="GITIYE PRIMARY SCHOOL">GITIYE PRIMARY SCHOOL</option>
                                    <option value="MUTHIKIINE PRIMARY SCHOOL">MUTHIKIINE PRIMARY SCHOOL</option>
                                    <option value="KIIJA PRIMARY SCHOOL">KIIJA PRIMARY SCHOOL</option>
                                    <option value="MUJWA PRIMARY SCHOOL">MUJWA PRIMARY SCHOOL</option>
                                    <option value="NG'ONGA PRIMARY SCHOOL">NG'ONGA PRIMARY SCHOOL</option>
                                    <option value="MCK MUKUUNE PRIMARY SCHOOL">MCK MUKUUNE PRIMARY SCHOOL</option>
                                    <option value="GITUNE COFFEE FACTORY">GITUNE COFFEE FACTORY</option>
                                    <option value="MPINDI PRIMARY SCHOOL">MPINDI PRIMARY SCHOOL</option>
                                    <option value="MAKANDUNE PRIMARY SCHOOL">MAKANDUNE PRIMARY SCHOOL</option>
                                    <option value="KANYWEE PRIMARY SCHOOL">KANYWEE PRIMARY SCHOOL</option>
                                    <option value="MATETU PRIMARY SCHOOL">MATETU PRIMARY SCHOOL</option>
                                    <option value="ST. PAUL'S MAKANDUNE SECONDARY SCH">ST. PAUL'S MAKANDUNE SECONDARY SCH</option>
                                    <option value="RIKANA PRIMARY SCHOOL">RIKANA PRIMARY SCHOOL</option>
                                    <option value="KIAMURI PRIMARY SCHOOL">KIAMURI PRIMARY SCHOOL</option>
                                    <option value="NKURA PRIMARY SCHOOL">NKURA PRIMARY SCHOOL</option>
                                    <option value="KAUTHENE PRIMARY SCHOOL">KAUTHENE PRIMARY SCHOOL</option>
                                    <option value="MANTHI PRIMARY SCHOOL">MANTHI PRIMARY SCHOOL</option>
                                    <option value="GIKUURU PRIMARY SCHOOL">GIKUURU PRIMARY SCHOOL</option>
                                    <option value="GACURU PRIMARY SCHOOL">GACURU PRIMARY SCHOOL</option>
                                    <option value="KARIMBENE SHOPPING CENTRE">KARIMBENE SHOPPING CENTRE</option>
                                </select>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Agent Type') }}</label>

                            <div class="col-md-6">
                                <select id="agent_type" type="text" class="form-control @error('agent_type') is-invalid @enderror" name="agent_type" value="{{ old('agent_type') }}" required autocomplete="agent_type">
                                    <option value="Agent A">Manager</option>
                                    <option value="Agent B">Assistant Manager</option>
                                </select>

                                @error('agent_type')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
