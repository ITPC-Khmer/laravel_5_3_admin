<?php
$id = isset($row)?$row->id:0;
$title = isset($row)?$row->title:'';
$description = isset($row)?$row->description:'';
$parent = isset($row)?$row->parent:'';
?>
@extends('layouts.admin')

@section('title', _t('Category Form'))


@section('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('admin') }}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('script_inc')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('admin') }}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green-haze">
                        <i class="icon-settings font-green-haze"></i>
                        <span class="caption-subject bold uppercase">{{ _t('Category Form') }}</span>
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
                    {!! Form::open(['url' => 'cpanel/category-save','class' => 'form-horizontal','role' => 'form']) !!}

                        <div class="form-group form-md-line-input">
                            {!! Form::label('category_id', _t('Category'), ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-10">

                                <div class="input-group input-group-sm select2-bootstrap-prepend">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" data-select2-open="select2-button-addons-multiple-input-group-sm">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>

                                    {!! Form::select('parent', \App\PostCategory::drop_down_array($id), $parent,['placeholder' => 'Pick a role...','id' => 'parent','style'=>'display: none;','class' => 'form-control select2-multiple']) !!}

                                </div>


                            </div>
                        </div>

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

@section('script')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin') }}/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>

@endsection