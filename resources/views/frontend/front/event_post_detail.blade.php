<?php
$base_url = asset('sh/');// base_url("assets");
$title = $row?_tt(json_decode($row->title)):'';
$description = $row?_tt(json_decode($row->description)):'';
$content = $row?_tt(json_decode($row->content)):'';
$image_url = $row?json_decode($row->image_url):array();
$video_url = $row?json_decode($row->video_url):array();
$view_count = $row?$row->view_count:1;
$created_at = $row?$row->created_at:'';

?>

@extends('layouts.sh')

@section('title', _t('Cambodian University For Specailties'))

@section('content')

    <div style="clear: both;background-color: #003354;height: 93px;margin-bottom: 30px;"></div>

    <div class="container">

        <div class="row">

            <main id="main" class="site-main col-md-9">



                <div class="row">
                    <article class="col-md-12 post">
                        <div class="inner-post">
                            <h2 class="post-title">{{ $title }}</h2>

                            <ul class="post-meta">
                                <li><a href="#"><i class="fa fa-clock-o"></i> {{ $created_at }}</a></li>
                                <li><a href="#"><i class="fa fa-user"></i> Anna Poster</a></li>
                                <li><a href="#"><i class="fa fa-eye"></i> {{ $view_count }}</a></li>
                            </ul>

                            @if(count($image_url)>0)
                            <div class="post-thumb">
                                <img src="{{ asset("uploads/{$image_url[0]}") }}" alt="">
                            </div><!-- .post-thumb -->
                            @endif
                            <div class="post-info">
                                <div class="post-desc">
                                    {!! $content !!}
                                </div><!-- .post-desc -->
                                @if(count($image_url)>0)
                                    @for($i = 1;$i<count($image_url);$i++)
                                        <div class="post-thumb">
                                            <img src="{{ asset("uploads/{$image_url[$i]}") }}" alt="">
                                        </div><!-- .post-thumb -->
                                    @endfor
                                @endif
                                <div class="entry-footer">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-7 col-xs-7">
													<span class="tags-links">Tags:
														<a rel="tag" href="#">business</a>,
														<a rel="tag" href="#">biological</a>,
														<a rel="tag" href="#">e-book</a>
													</span>
                                        </div>

                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <div class="single-share">
                                                <span>Share:</span>
                                                <div class="socials">
                                                    <ul>
                                                        <li><a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                                                        <li><a href="#" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                                                        <li><a href="#" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- .single-share -->
                                        </div>
                                    </div><!-- .row -->
                                </div>
                                <div class="posts-together">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="post-together post-prev">
                                                <a href="#"><i class="fa fa-angle-double-left"></i> Previous
                                                    <span>Back to school with courses of  Universum</span></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="post-together post-next">
                                                <a href="#">Next <i class="fa fa-angle-double-right"></i>
                                                    <span>Research works of students about to be start</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .post-together -->
                            </div><!-- .post-info -->



                        </div><!-- .inner-post -->
                    </article>
                </div>

                <div class="comments-area" id="comments">

                    <h3 class="comments-title">2 Comments</h3>

                </div><!-- .comments-area -->




            </main><!-- .site-main -->


            <div id="sidebar" class="sidebar col-md-3">

                @include('frontend.front.sidebar_right')

            </div><!-- .sidebar -->

        </div><!-- .row -->

    </div><!-- .container -->


@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection