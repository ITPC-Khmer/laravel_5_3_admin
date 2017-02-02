<?php
$id = isset($row)?$row->id:0;
$title = isset($row)?$row->title:'';
$description = isset($row)?$row->description:'';
$parent = isset($row)?$row->parent:'';
$update_detail = isset($row)?$row->update_detail -0:0;
$content = isset($row)?json_decode($row->content):null;

?>
@extends('layouts.admin')

@section('title', _t('Faculty Form'))


@section('css')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('admin') }}/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('admin') }}/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('admin') }}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

    <style>
        #my-dropzone{
            background: url("{{ asset('admin') }}/assets/uploading.png") no-repeat center center;
            -webkit-background-size: 50%; /* For WebKit*/
            -moz-background-size: 50%;    /* Mozilla*/
            -o-background-size: 50%;      /* Opera*/
            background-size: 50%;         /* Generic*/
        }
    </style>


@endsection

@section('script_inc')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('admin') }}/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
    <script src="{{ asset('admin') }}/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
    <script src="{{ asset('admin') }}/assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
    <script src="{{ asset('admin') }}/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
    <script src="{{ asset('admin') }}/assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>


    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('admin') }}/assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>

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
                        <span class="caption-subject bold uppercase">{{ _t('Faculty Form') }}</span>
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
                    {!! Form::open(['url' => 'cpanel/faculty-save','class' => 'form-horizontal','role' => 'form']) !!}

                        <div class="form-group form-md-line-input" {!! $update_detail>0?'style="display: none;"':'' !!}>
                            {!! Form::label('parent', _t('Faculty'), ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-10">

                                <div class="input-group input-group-sm select2-bootstrap-prepend">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" data-select2-open="select2-button-addons-multiple-input-group-sm">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>


                                    <select class="form-control select2-multiple" style="display: none;" id="parent" name="parent">
                                        {!! \App\Faculty::drop_down_array($id,$parent) !!}
                                    </select>

                                </div>


                            </div>
                        </div>

                    {!! Form::hidden('id',$id) !!}
                    {!! Form::hidden('update_detail',$update_detail) !!}

                    <div class="form-body" {!! $update_detail>0?'style="display: none;"':'' !!}>

                            {!! Form::bsText('title', $title,_t('title')) !!}

                            {!! Form::bsText('description', $description,_t('description')) !!}

                        </div>

                        @if($update_detail > 0)

                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-xs-4">
                                <ul class="nav nav-tabs tabs-left">
                                    @foreach(arr_lang() as $k => $v)
                                        <li{{ $k=='en'?' class=active ':'' }}>
                                            <a {{ $k=='en'?' aria-expanded=true ':'' }}  href="#tab{{ $k }}" data-toggle="tab"> {{ $v }} </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-8">
                                <div class="tab-content">
                                    @foreach(arr_lang() as $k => $v)
                                        <div class="tab-pane{{ $k=='en'?' active':'' }}" id="tab{{ $k }}">
                                            <textarea style="display: none;"  class="summer_note" name="content[{{ $k }}]" id="summernote_{{ $k }}">{{ isset($content->$k)?$content->$k:'' }}</textarea>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @endif

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


    @if($update_detail > 0)
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin') }}/assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin') }}/assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>


    <script>

        $(function () {

            $('.summer_note').each(function () {
                $(this).summernote({height:300});
            });

            @if($id > 0)
            $('.remove-img').on('click',function (e) {
                e.preventDefault();
                var img = $(this).data('img');

                $('.form-class').append('<input class="h-file" type="hidden" name="_image_url[]" value="'+img+'">');

                $(this).parent().parent().parent().parent().remove();

            });
            @endif

        });
    </script>

    @endif



@endsection