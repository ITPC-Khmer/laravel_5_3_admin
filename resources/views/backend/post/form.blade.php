<?php
$id = isset($row)?$row->id:0;
$title = isset($row)?json_decode($row->title):null;
$description = isset($row)?json_decode($row->description):null;
$content = isset($row)?json_decode($row->content):null;
$video_url = isset($row)?json_decode($row->video_url):null;
$image_url = isset($row)?json_decode($row->image_url):null;

$categories = isset($row)?$categories->toArray():[0];

$tags = isset($row)?$tags->toArray():[0];

?>
@extends('layouts.admin')

@section('title', _t('Post Form'))

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
                        <span class="caption-subject bold uppercase">{{ _t('Post Form') }}</span>
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
                    {!! Form::open(['url' => 'cpanel/post-save','files' => true,'class' => 'form-horizontal form-class','role' => 'form']) !!}

                        {!! Form::hidden('id',$id) !!}
                        <div class="form-body">

                            <div class="form-group form-md-line-input">
                                {!! Form::label('category_id', _t('Category'), ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">

                                    <div class="input-group input-group-sm select2-bootstrap-prepend">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-select2-open="select2-button-addons-multiple-input-group-sm">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                       {!! Form::bsMultipleSelect('category_id[]', \App\PostCategory::drop_down_array(),$categories,'category_id') !!}
                                    </div>


                                </div>
                            </div>

                            <div class="form-group form-md-line-input">
                                {!! Form::label('tag_id', _t('Tag'), ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">

                                    <div class="input-group input-group-sm select2-bootstrap-prepend">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-select2-open="select2-button-addons-multiple-input-group-sm">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                        {!! Form::select('tag_id[]', \App\PostTag::drop_down_array(), $tags,['id' => 'tag_id','style'=>'display: none;','multiple' => 'multiple','class' => 'form-control select2-multiple']) !!}

                                    </div>


                                </div>
                            </div>

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
                                                {!! Form::bsText("title[{$k}]", isset($title->$k)?$title->$k:'',_t('title')) !!}

                                                {!! Form::bsText("description[{$k}]", isset($description->$k)?$description->$k:'',_t('description')) !!}

                                                <textarea style="display: none;"  class="summer_note" name="content[{{ $k }}]" id="summernote_{{ $k }}">{{ isset($content->$k)?$content->$k:'' }}</textarea>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            {!! Form::bsText("video_url[]", isset($video_url[0])?$video_url[0]:'',_t('video_url')) !!}

                            @if($id > 0)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light portlet-fit bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class=" icon-layers font-green"></i>
                                                <span class="caption-subject font-green bold uppercase">{{ _t('Photo') }}</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="mt-element-card mt-element-overlay">
                                                <?php
                                                $collection = collect($image_url);
                                                ?>
                                                @foreach ($collection->chunk(4) as $chunk)
                                                    <div class="row">
                                                        @foreach ($chunk as $filename)
                                                            <div class="col-md-3">
                                                                <div class="mt-card-item">
                                                                    <div class="mt-card-avatar mt-overlay-1">
                                                                        <img src="{{  asset("uploads/tmp1/{$filename}") }}" />
                                                                        <input class="h-file" type="hidden" name="image_url[]" value="{{ $filename }}">
                                                                    </div>
                                                                    <div class="mt-card-content">
                                                                        <h3 class="mt-card-name">
                                                                            <a class="remove-img" data-img="{{ $filename }}" href="javascript:void(0)">{{ _t('Remove') }}</a>
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div action="{{ url('/cpanel/post-upload') }}"
                                 class="dropzone dropzone-file-area my-dropzone" id="my-dropzone" style="width: 500px; margin-top: 50px;"></div>



                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-8 col-md-4">
                                    {{--<button type="button" class="btn default">{{ _t('Back') }}</button>--}}
                                    <a class="btn btn-danger" href="javascript:window.history.go(-1);">Back</a>
                                    <button type="submit" class="btn blue">{{ _t('Submit') }}</button>
                                </div>
                            </div>
                        </div>



                    {!! Form::close() !!}
                </div>
            </div>



        </div>
    </div>

@endsection

@section('script')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin') }}/assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin') }}/assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin') }}/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    
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
@endsection

