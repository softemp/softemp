@extends('softemp.panel.layouts.auth.app')

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('softemp/panel/auth/login.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel-header">
                <h2 class="text-center">
                    Login or
                    <a href="">Sign up</a>
                </h2>
            </div>
            <div class="panel-body social col-sm-offset-3">

                <div class="col-xs-4 col-sm-3">
                    <a href="#" class="btn btn-lg btn-block btn-facebook"> <i class="fa fa-facebook-square fa-lg"></i>
                        <span class="hidden-sm hidden-xs">Facebook</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-3">
                    <a href="#" class="btn btn-lg btn-block btn-twitter"> <i class="fa fa-twitter-square fa-lg"></i>
                        <span class="hidden-sm hidden-xs">Twitter</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-3">
                    <a href="#" class="btn btn-lg btn-block btn-google">
                        <i class="fa fa-google-plus-square fa-lg"></i>
                        <span class="hidden-sm hidden-xs">Google+</span>
                    </a>
                </div>
                <div class="clearfix">

                    <div class="col-xs-12 col-sm-9">
                        <hr class="omb_hrOr">
                        <span class="omb_spanOr">or</span>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-xs-12 col-sm-6 col-sm-offset-2">

                        @if(session('success'))
                            <div class="alert alert-success">
                                <strong>Success!</strong> {!! session('success') !!}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-error">
                                <strong>Error!</strong> {!! session('error') !!}
                            </div>
                        @endif
                        @if(session('warning'))
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> {!! session('warning') !!}
                            </div>
                        @endif
                        @if(session('info'))
                            <div class="alert alert-info">
                                <strong>Info!</strong> {!! session('info') !!}
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-error">
                                <strong>Status!</strong> {!! session('status') !!}
                            </div>
                        @endif
                    </div>

                    <div class="col-xs-12 col-sm-6 col-sm-offset-2">
                        <form class="omb_loginForm" autocomplete="off" method="POST" action="{{ route('panel.auth.login') }}">
                            {{ csrf_field() }}

                            <div class="input-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control" name="username" placeholder="Seu Login"
                                       value="{{ old('username') }}" required autofocus>
                            </div>
                            <span class="help-block">
                                    @if ($errors->has('username'))
                                    <strong>{{ $errors->first('username') }}</strong>
                                @endif
                            </span>


                            <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                       required>
                            </div>
                            <span class="help-block">
                                 @if ($errors->has('password'))
                                    <strong>{{ $errors->first('password') }}</strong>
                                @endif
                            </span>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Remember Me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary btn-block submit">Entrar</button>
                            <button type="button" class="btn btn-link forgot" onclick="function()">Esqueceu sua senha?
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript">
        $('.forgot').click(function () {
            window.location.href = "{{ route('panel.auth.password.forgot.form') }}";
            return false;
        });
    </script>
@stop
