@extends('softemp.panel.layouts.auth.app')

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('softemp/panel/auth/reset_password.css') }}" rel="stylesheet">
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel-header">
                <h2 class="text-center">
                    Redefinir Senha
                </h2>
            </div>
            <div class="panel-body social col-sm-offset-3">

                <div class="clearfix">

                    <div class="col-xs-12 col-sm-9">
                        <hr class="omb_hrOr">
                    </div>
                    <div class="clearfix"></div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-xs-12 col-sm-6 col-sm-offset-2">
                        <form class="omb_loginForm" autocomplete="off" method="POST" action="{{ route('auth.password.forgot') }}">
                            {{ csrf_field() }}

                            <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="text" class="form-control" name="email" placeholder="email address"
                                       value="{{ old('email') }}" required autofocus>
                            </div>
                            <span class="help-block">
                                    @if ($errors->has('email'))
                                    <strong>{{ $errors->first('email') }}</strong>
                                @endif
                            </span>

                            <button type="submit" class="btn btn-md btn-primary btn-block submit">Enviar o link de redefinição de senha</button>
                            <button type="button" class="btn btn-link login" onclick="function()">Logar?
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
        $('.login').click(function () {
            window.location.href = "{{ route('auth.login.form') }}";
            return false;
        });
    </script>
@stop