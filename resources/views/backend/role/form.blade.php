<?php
$id = isset($row)?$row->id:0;
$title = isset($row)?$row->title:'';
$description = isset($row)?$row->description:'';
?>
@extends('layouts.admin')

@section('title', _t('Role Form'))

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green-haze">
                        <i class="icon-settings font-green-haze"></i>
                        <span class="caption-subject bold uppercase">{{ _t('Role Form') }}</span>
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
                    {!! Form::open(['url' => 'cpanel/role-save','class' => 'form-horizontal','role' => 'form']) !!}

                        {!! Form::hidden('id',$id) !!}
                        <div class="form-body">

                            {!! Form::bsText('title', $title,_t('title')) !!}

                            {!! Form::bsText('description', $description,_t('description')) !!}

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

