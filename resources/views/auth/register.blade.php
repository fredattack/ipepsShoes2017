@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        {{--firstName--}}
                        {!! Form::label('firstName', 'FirstName:',null, ['class' => 'form-control col-md-4']) !!}
                        <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                {!! Form::text('firstName',null, ['class' => 'form-control']) !!}
                                {!! $errors->first('firstName', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                        {{--lastName--}}
                        {!! Form::label('lastName', 'lastName:',null, ['class' => 'form-control col-md-4']) !!}
                        <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                {!! Form::text('lastName',null, ['class' => 'form-control']) !!}
                                {!! $errors->first('lastName', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                        {{--login--}}
                        {!! Form::label('login', 'Login:',null, ['class' => 'form-control col-md-4']) !!}
                        <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                {!! Form::text('login',null, ['class' => 'form-control']) !!}
                                {!! $errors->first('login', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                        {{--email--}}

                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--password--}}

                        <label for="password" class="col-md-4 control-label">Password</label>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--password-confirm--}}

                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                        <div class="form-group">

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
Fs                </div>
            </div>
        </div>
    </div>
</div>
@endsection
