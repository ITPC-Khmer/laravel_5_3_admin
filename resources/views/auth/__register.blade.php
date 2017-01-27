@extends('layouts.admin')

@section('title', _t('User Form'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-settings font-green-haze"></i>
                    <span class="caption-subject bold uppercase">{{ _t('User Form') }}</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:" data-original-title="" title=""> </a>
                </div>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="portlet-body form">
                {!! Form::open(['url' => '/register','class' => 'form-horizontal','role' => 'form']) !!}


                <div class="form-body">

                    <div class="form-group form-md-line-input">
                        {!! Form::label('name', _t('name'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-10">
                            {!!  Form::text('name', old('name') , ['class' => 'form-control','placeholder' => _t('Enter name')]) !!}
                            <div class="form-control-focus"> </div>
                            {{--<span class="help-block">Some help goes here...</span>--}}
                        </div>
                    </div>

                    <div class="form-group form-md-line-input">
                        {!! Form::label('email', _t('email'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-10">
                            {!!  Form::email('email', old('email'), ['class' => 'form-control','placeholder' => _t('Enter email')]) !!}
                            <div class="form-control-focus"> </div>
                            {{--<span class="help-block">Some help goes here...</span>--}}
                        </div>
                    </div>

                    <div class="form-group form-md-line-input">
                        {!! Form::label('password', _t('password'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-10">
                            {!!  Form::password('password', null, ['class' => 'form-control','placeholder' => _t('Enter password')]) !!}
                            <div class="form-control-focus"> </div>
                            {{--<span class="help-block">Some help goes here...</span>--}}
                        </div>
                    </div>

                    <div class="form-group form-md-line-input">
                        {!! Form::label('password_confirmation', _t('Confirm Password'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-10">
                            {!!  Form::password('password_confirmation', null, ['class' => 'form-control','placeholder' => _t('Enter Confirm Password')]) !!}
                            <div class="form-control-focus"> </div>
                            {{--<span class="help-block">Some help goes here...</span>--}}
                        </div>
                    </div>

                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-10">
                            {{--<button type="button" class="btn default">{{ _t('Back') }}</button>--}}
                            <a class="btn btn-danger" href="javascript:window.history.go(-1);">Back</a>
                            <button type="submit" class="btn blue">{{ _t('Register') }}</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->

    </div>
</div>

@endsection
