@extends('layouts.shopLayout')

@section('title')
@endsection

@section('header')
    @include('shop.nav.header')
@endsection

@section('slider')
    {{--@include('shop.slider.mainSlider')--}}
@endsection

@section('asideLeft')
    {{--@include('shop.nav.sideBar')--}}
@endsection

@section('section')
    {{--<h1>Section</h1>--}}
    <div class="container">
        <section id="form"><!--form-->

            <div class="container">
                <img src="{{asset("/image/background.jpg")}}" id="bg" alt="">

                <div class="row" style="margin-top: 5em">
                    <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                    <h2>Connectez vous à votre compte</h2>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    Email
                    <input id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                    @if ($errors->has('email'))<span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                    @if ($errors->has('password'))<span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                    @endif

                    <span>
                    <input type="checkbox" class="checkbox">
                    Se souvenir de moi
                    </span>
                        <button type="submit" class="btn btn-default">Connection</button>
                    </form>
                    </div><!--/login form-->
                    </div>

                    <div class="col-sm-1">
                    <h2 class="or">Ou</h2>
                    </div>

                    <div class="col-sm-4">
                        <div class="signup-form"><!--sign up form-->
                            <h2>Nouvel Utilisteur? Creez un compte!</h2>

                            <a href="{{route('register')}}" class="btn btn-default get"> S'enregister</a>

                            {{--<form class="form-horizontal" method="POST" action="{{ route('register') }}">--}}

                                {{--{{ csrf_field() }}--}}

                                {{--firstName--}}
                                {{--{!! Form::text('firstName',null, ['class' => 'form-control','placeholder'=>'Prénom']) !!}--}}
                                {{--{!! $errors->first('firstName', '<small class="help-block">:message</small>') !!}--}}
                                {{--lastName--}}
                                {{--{!! Form::text('lastName',null, ['class' => 'form-control','placeholder'=>'Nom']) !!}--}}
                                {{--{!! $errors->first('lastName', '<small class="help-block">:message</small>') !!}--}}
                                {{--login--}}
                                {{--{!! Form::text('login',null, ['class' => 'form-control','placeholder'=>'Login']) !!}--}}
                                {{--{!! $errors->first('login', '<small class="help-block">:message</small>') !!}--}}
                                {{--email--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>--}}
                                {{--{!! $errors->first('email', '<small class="help-block">:message</small>') !!}--}}
                                {{--password--}}
                                {{--<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>--}}
                                {{--{!! $errors->first('password', '<small class="help-block">:message</small>') !!}--}}
                                {{--password-confirm--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password Confirm " required>--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--S'enregistrer--}}
                                {{--</button>--}}


                            {{--</form>--}}
                        </div><!--/sign up form-->
                    </div>
                </div>

            </div>
        </section><!--/form-->
    </div>
@endsection

@section('bottomSlider')
    {{--@include('shop.slider.bottomSlider')--}}
@endsection
@section('footer')
{{--    @include('shop.nav.footer')--}}
    <script>
        $('.header-middle').css('display','none');
        $('.header-bottom').css('display','none');
        $('.html').css('background','/image/')

    </script>
@endsection