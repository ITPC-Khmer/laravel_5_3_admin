<?php
$id = isset($row)?$row->id:0;
$name = isset($row)?$row->name:'';
$phone = isset($row)?$row->phone:'';
$email = isset($row)?$row->email:'';
$note = isset($row)?$row->note:'';
$role_id = isset($row)?$row->role_id:0;
?>
@extends('layouts.admin')

@section('title', _t('User Form'))

@section('content')

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
                @if($id- 0 == 0)
                {!! Form::open(['url' => '/register','class' => 'form-horizontal','role' => 'form']) !!}
                @else
                {!! Form::open(['url' => '/cpanel/user-save','class' => 'form-horizontal','role' => 'form']) !!}
                @endif

                {!! Form::hidden('id',$id) !!}


                <div class="form-body">

                    <div class="form-group form-md-line-input">
                        {!! Form::label('role_id', _t('Role'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-10">

                            {!! Form::select('role_id', \App\Role::drop_down_array(), $role_id,['class' => 'form-control','placeholder' => 'Pick a role...']) !!}
                            <div class="form-control-focus"> </div>
                            {{--<span class="help-block">Some help goes here...</span>--}}
                        </div>
                    </div>

                    {!! Form::bsText('name', $name,_t('name')) !!}

                    {!! Form::bsText('phone', $phone,_t('phone')) !!}

                    {!! Form::bsEmail('email', $email,_t('email')) !!}


                    @if($id- 0 == 0)
                    {!! Form::bsPassword('password',_t('password')) !!}

                    {!! Form::bsPassword('password_confirmation',_t('Confirm Password')) !!}
                    @endif

                    {!! Form::bsText('note', $note,_t('note')) !!}

                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-10">
                            {{--<button type="button" class="btn default">{{ _t('Back') }}</button>--}}
                            <a class="btn btn-danger" href="javascript:window.history.go(-1);">Back</a>
                            <button type="submit" class="btn blue">{{ _t('Submit') }}</button>
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
