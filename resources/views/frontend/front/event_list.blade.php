<?php
$base_url = asset('sh/');// base_url("assets");
?>
@extends('layouts.sh')

@section('title', _t('Cambodian University For Specailties'))

@section('content')
    <div style="clear: both;background-color: #003354;height: 93px;margin-bottom: 30px;"></div>
    <?php
    $collection = collect($result);
    ?>
    <div id="content" class="site-content">
       <div class="container">
            <div class="row">
                <main id="main" class="site-main col-md-12">
                    @foreach ( collect($collection['data'])->chunk(3) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $row)
                            <?php

                            $image_url = json_decode($row['image_url']);
                            $title = _tt(json_decode($row['title']));
                            $description = _tt(json_decode($row['description']));

                            ?>
                        <article class="col-md-4 col-sm-4 col-xs-12 post">


                            <div class="inner-post shadow">

                                @if(isset($image_url[0]))
                                     <div class="post-thumb">
                                        <a href="{{ url("/event-detail/{$row['id']}.html") }}" class="mini-zoom"><img src="{{  asset("uploads/tmp1/{$image_url[0]}") }}" alt="{{ $title }}"></a>
                                    </div>
                                @endif

                                <div class="post-info">
                                    <h3 class="post-title"><a href="{{ url("/event-detail/{$row['id']}.html") }}">{{ $title }}</a></h3>
                                    <ul class="post-meta">
                                        <li><i class="fa fa-clock-o"></i> {{ $row['created_at'] }}</li>
                                    </ul>
                                    <div class="post-desc">
                                        <p>{{ $description }}</p>
                                    </div><!-- .post-desc -->
                                    <a href="{{ url("/event-detail/{$row['id']}.html") }}" class="link">{{ _t('Read more') }}</a>
                                </div><!-- .post-info -->
                            </div><!-- .inner-post -->
                        </article>
                        @endforeach
                    </div>
                    @endforeach

                    {{--<a class="button large rounded load-more" href="#">{{ _t('Load more items') }}</a>--}}
                        <nav class="pagination">
                            {{ $result->links('vendor.pagination.front') }}
                        </nav>
                </main><!-- .site-main -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .site-content -->

@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection