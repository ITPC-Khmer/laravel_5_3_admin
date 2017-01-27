@extends('layouts.admin')

@section('title', _t('Category List'))

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>{{ _t('Category List') }} </div>
                    <div class="tools">
                        <a href="javascript:" class="collapse"> </a>
                       {{-- <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>--}}
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th style="width: 160px;">  <a href="{{ url('/cpanel/category-form') }}" class="btn btn-outline btn-circle btn-sm purple">
                                        <i class="fa fa-plus"></i> Add </a> </th>
                                <th> {{ _t('title') }}
                                    {!! get_title_search('title',$title) !!}
                                </th>
                                <th> {{ _t('description') }}
                                    {!! get_title_search('description',$description) !!}
                               </th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($result as $row)
                                <tr>
                                    <td>
                                        {!! Form::open(['url' => "/cpanel/category-form", 'method' => 'put']) !!}
                                        {!! Form::hidden('id',$row->id) !!}
                                        <button type="submit" class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> Edit </button>
                                        <a data-id="{{ $row->id }}" href="javascript:" class="btn btn-outline btn-circle dark btn-sm black vm-del">
                                            <i class="fa fa-trash-o"></i> Delete </a>
                                        {!! Form::close() !!}
                                    </td>
                                    <td class="highlight">
                                        <div class="success"></div>{{ nbs(2) }}
                                        <a href="javascript:"> {!! highlight($row->title,$title) !!} </a>
                                    </td>
                                    <td class="hidden-xs"> {!! highlight($row->description,$description) !!} </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
    </div>


    <div class="row">
        <div class="col-md-5">
            <div class="dataTables_info">
                @if($result->total() > 12)
                    <span>{{ $result->firstItem() }} - {{ $result->lastItem() }} of {{ $result->total() }} (for page {{ $result->currentPage() }} )</span>
                @endif
            </div>
        </div>
        <div class="col-md-6" style="text-align: right;">
            <div class="dataTables_paginate paging_bootstrap_full_number">
                {{ $result->links() }}
            </div>
        </div>


    </div>

@endsection

@section('script')
    <script type="text/javascript">
        var current_url = '{{ url()->current() }}';

        $(function () {
            $('body').delegate('.vm-del','click',function (e) {
                e.preventDefault();
                var tr = $(this).parent().parent().parent();
                var id = $(this).data('id') - 0;
                swal({
                        title: "{{ _t('Are you sure?') }}",
                        text: "{{ _t('You will not be able to recover this data!') }}",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    },
                    function(){
                        $.ajax({
                            url : '{{ url('/cpanel/category-delete') }}',
                            async : false,
                            data : {id : id},
                            error: function() {
                                swal({
                                    title: "{{ _t('error') }}",
                                    text: "{{ _t('An error has occurred!') }}",
                                    type: "warning",
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "Close",
                                    closeOnConfirm: false
                                });
                            },
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);// affected
                                if(data.affected - 0> 0) {
                                    tr.remove();
                                    swal("Deleted!", "{{ _t('Your imaginary file has been deleted') }}", "success");
                                }else {
                                    swal({
                                        title: "{{ _t('error') }}",
                                        text: "{{ _t('An error has occurred!') }}",
                                        type: "warning",
                                        confirmButtonColor: "#DD6B55",
                                        confirmButtonText: "Close",
                                        closeOnConfirm: false
                                    });
                                }
                            },
                            type: 'POST'
                        });


                    });
            });

            $('.head-search-th').on('click',function () {
                go_search();
            });

            $('.head-search-input').on( "keydown", function(event) {
                var keycode = event.keyCode || event.which;
                if(keycode == '13') {
                    go_search();
                }
            });

        });


        function go_search() {
            var url_param = current_url + '?' ;
            $('.head-search-th').each(function () {
                var input = $(this).parent().parent().find('input');
                var n = input.data('name');
                var v = input.val();

                if($.trim(v) != '')  url_param += '&'+n+'='+encodeURIComponent($.trim(v));

            });

            location.href = url_param;
        }
    </script>
@endsection