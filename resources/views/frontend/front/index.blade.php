<?php
$base_url = asset('sh/');// base_url("assets");
?>
@extends('layouts.sh')

@section('title', _t('Cambodian University For Specailties'))

@section('content')

    <div id="content" class="site-content">

        <main id="main" class="site-main">
            <?php
            $slide = get_image_lib('slide');
            ?>

            @if($slide)
                <section class="main-slider only-title white">

                    <div class="slider">

                        <?php $img_slide = json_decode($slide->image_url); ?>

                        @foreach($img_slide as $filename)
                            <div class="item">

                                <img  src="{{  asset("uploads/{$filename}") }}" alt="">

                            </div><!-- .item -->
                        @endforeach

                    </div><!-- .slider -->

                </section><!-- .main-slider 1 -->

            @endif
            {{--
                        <section id="home-image-box">

                            <div class="row animation-element fade-in">

                                <div class="col-md-4">

                                    <div class="image-box center-caption">

                                        <a href="##" class="mini-zoom"><img src="{{ $base_url }}/images/placeholder/image7.jpg" alt=""></a>

                                        <a href="##" class="caption">About University</a>

                                    </div>

                                </div>



                                <div class="col-md-4">

                                    <div class="image-box center-caption">

                                        <a href="##" class="mini-zoom"><img src="{{ $base_url }}/images/placeholder/image8.jpg" alt=""></a>

                                        <a href="##" class="caption">Online Courses</a>

                                    </div>

                                </div>



                                <div class="col-md-4">

                                    <div class="image-box center-caption">

                                        <a href="##" class="mini-zoom"><img src="{{ $base_url }}/images/placeholder/image9.jpg" alt=""></a>

                                        <a href="##" class="caption">Event tickets</a>

                                    </div>

                                </div>

                            </div>

                        </section><!-- #home-image-box  2 -->

                        --}}
            {{--

                        <section id="university-courses-3">

                            <div class="container">

                                <h2 class="main-title ribbon"><span>Popular Courses</span></h2>

                                <p class="center">Universum courses are organized based on technology and the right course for you.</p>

                                <div class="carou-slider animation-element fade-in">

                                    <div class="courses-slider">

                                        <div class="item">

                                            <div class="courses layout column-4">

                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course1.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list1.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Business</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">The Basic Online Marketing: Reach, Engage, Convert</a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user3.jpg" alt=""></a>

                                                                <span>by <a href="##">Diana Hill</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->



                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course2.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list2.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Business</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">Creative ideas, Amazing online marketing</a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user4.jpg" alt=""></a>

                                                                <span>by <a href="##">Christine Morales</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->



                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course3.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list3.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Technology</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">How to Start Out as an Icon Designer</a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user5.jpg" alt=""></a>

                                                                <span>by <a href="##">Richard Wong</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->



                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course4.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list4.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Medicine</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">Chemistry and Chemical Biology</a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user6.jpg" alt=""></a>

                                                                <span>by <a href="##">Sandra Pearson</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->



                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course5.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list5.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Technology</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">Mobile development tutorial for beginners</a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user7.jpg" alt=""></a>

                                                                <span>by <a href="##">William Hunt</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->



                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course6.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list1.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Language</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">Learn english speaking english subtitles</a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user8.jpg" alt=""></a>

                                                                <span>by <a href="##">Jacob Delgado</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->



                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course7.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list1.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Technology</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">Preparing your iPhone App for Higher Resolutions</a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user9.jpg" alt=""></a>

                                                                <span>by <a href="##">Peter Hart</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->



                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course8.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list1.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Technology</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">Speech and Hearing Bioscience and Technology </a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user10.jpg" alt=""></a>

                                                                <span>by <a href="##">Ashley Pena</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->

                                            </div><!-- .courses -->

                                        </div><!-- .item -->



                                        <div class="item">

                                            <div class="courses layout column-4">

                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course1.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list1.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Business</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">The Basic Online Marketing: Reach, Engage, Convert</a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user3.jpg" alt=""></a>

                                                                <span>by <a href="##">Diana Hill</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->



                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course2.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list2.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Business</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">Creative ideas, Amazing online marketing</a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user4.jpg" alt=""></a>

                                                                <span>by <a href="##">Christine Morales</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->



                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course3.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list3.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Technology</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">How to Start Out as an Icon Designer</a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user5.jpg" alt=""></a>

                                                                <span>by <a href="##">Richard Wong</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->



                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course4.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list4.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Medicine</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">Chemistry and Chemical Biology</a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user6.jpg" alt=""></a>

                                                                <span>by <a href="##">Sandra Pearson</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->



                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course5.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list5.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Technology</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">Mobile development tutorial for beginners</a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user7.jpg" alt=""></a>

                                                                <span>by <a href="##">William Hunt</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->



                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course6.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list1.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Language</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">Learn english speaking english subtitles</a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user8.jpg" alt=""></a>

                                                                <span>by <a href="##">Jacob Delgado</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->



                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course7.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list1.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Technology</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">Preparing your iPhone App for Higher Resolutions</a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user9.jpg" alt=""></a>

                                                                <span>by <a href="##">Peter Hart</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->



                                                <div class="course">

                                                    <div class="course-inner shadow">

                                                        <div class="course-thumb">

                                                            <a class="mini-zoom" href="#single-course.html">

                                                                <img src="{{ $base_url }}/images/placeholder/course8.jpg" alt="">

                                                                <img class="img-list" src="{{ $base_url }}/images/placeholder/course-list1.jpg" alt="">

                                                            </a>

                                                        </div><!-- .course-thumb -->



                                                        <div class="course-info">

                                                            <span class="course-cat"><a href="##">Technology</a></span>



                                                            <h3 class="course-title"><a href="#single-course.html">Speech and Hearing Bioscience and Technology </a></h3>



                                                            <div class="course-desc">

                                                                <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>

                                                            </div><!-- .course-desc -->



                                                            <div class="course-author">

                                                                <a href="##"><img src="{{ $base_url }}/images/placeholder/user10.jpg" alt=""></a>

                                                                <span>by <a href="##">Ashley Pena</a></span>

                                                            </div><!-- .course-author -->



                                                            <div class="course-meta">

                                                                <ul>

                                                                    <li>

                                                                        <div class="star-rating">

                                                                            <span style="width:80%"></span>

                                                                        </div>

                                                                    </li>

                                                                    <li><i class="fa fa-users"></i> 2</li>

                                                                    <li><a href="##"><i class="fa fa-comment"></i> 5</a></li>

                                                                </ul>

                                                            </div><!-- .course-meta -->

                                                        </div><!-- .course-info -->

                                                    </div><!-- .course-inner -->

                                                </div><!-- .course -->

                                            </div><!-- .courses -->

                                        </div><!-- .item -->

                                    </div><!-- .ourses-slider -->

                                </div><!-- .carou-slider -->

                            </div><!-- .container -->

                        </section><!-- #university-courses-3 -->


                        <section id="home-blog">

                            <div class="container">

                                <h2 class="main-title ribbon"><span>Latest News</span></h2>

                                <p class="center">Universum courses are organized based on technology and the right course for you.</p>



                                <div class="row animation-element fade-in">

                                    <article class="col-md-4 col-sm-6 post">

                                        <div class="inner-post">

                                            <div class="post-thumb">

                                                <a href="#single.html" class="mini-zoom"><img src="{{ $base_url }}/images/placeholder/blog2.jpg" alt=""></a>

                                            </div><!-- .post-thumb -->



                                            <div class="post-info">

                                                <h3 class="post-title"><a href="#single.html">Back to school with courses of Universum</a></h3>

                                                <ul class="post-meta">

                                                    <li><i class="fa fa-clock-o"></i> February  10, 2016</li>

                                                </ul>

                                                <div class="post-desc">

                                                    <p>Nulla cursus augue elit, at ullamcorper urna rhoncus a. Proin ipsum tortor, gravida at convallis a, tempor sed magna</p>

                                                </div><!-- .post-desc -->

                                                <a href="#single.html" class="link">Read more</a>

                                            </div><!-- .post-info -->

                                        </div><!-- .inner-post -->

                                    </article>



                                    <article class="col-md-4 col-sm-6 post">

                                        <div class="inner-post">

                                            <div class="post-thumb">

                                                <a href="#single.html" class="mini-zoom"><img src="{{ $base_url }}/images/placeholder/blog3.jpg" alt=""></a>

                                            </div><!-- .post-thumb -->



                                            <div class="post-info">

                                                <h3 class="post-title"><a href="#single.html">Research works of students about to be start</a></h3>

                                                <ul class="post-meta">

                                                    <li><i class="fa fa-clock-o"></i> February  10, 2016</li>

                                                </ul>

                                                <div class="post-desc">

                                                    <p>Morbi iaculis, sem vel luctus pulvinar, tortor dolor pharetra enim, porta gravida nulla turpis sed risus. In turpis ligula</p>

                                                </div><!-- .post-desc -->

                                                <a href="#single.html" class="link">Read more</a>

                                            </div><!-- .post-info -->

                                        </div><!-- .inner-post -->

                                    </article>



                                    <article class="col-md-4 col-sm-6 post">

                                        <div class="inner-post">

                                            <div class="post-thumb">

                                                <a href="#single.html" class="mini-zoom"><img src="{{ $base_url }}/images/placeholder/blog4.jpg" alt=""></a>

                                            </div><!-- .post-thumb -->



                                            <div class="post-info">

                                                <h3 class="post-title"><a href="#single.html">School euismod, arcu vel porttitor consectetu</a></h3>

                                                <ul class="post-meta">

                                                    <li><i class="fa fa-clock-o"></i> February  10, 2016</li>

                                                </ul>

                                                <div class="post-desc">

                                                    <p>Phasellus lorem enim, luctus ut velit eget, convallis egestas eros. Sed ornare ligula eget tortor tempor, quis porta tellus dictum.</p>

                                                </div><!-- .post-desc -->

                                                <a href="#single.html" class="link">Read more</a>

                                            </div><!-- .post-info -->

                                        </div><!-- .inner-post -->

                                    </article>

                                </div>

                            </div>

                        </section><!-- #home-blog -->


                        <section id="home-event">

                            <div class="container">

                                <h2 class="main-title ribbon"><span>Upcoming events</span></h2>

                                <p class="center">Event mauris nisl velit auctor eget ex eget, pretium elementum commodo massa metus</p>



                                <div class="row animation-element fade-in">

                                    <div class="event col-md-4 col-sm-4 col-xs-4 paid">

                                        <div class="event-inner shadow">

                                            <div class="event-thumb">

                                                <a href="#single-event.html" class="mini-zoom"><img alt="" src="{{ $base_url }}/images/placeholder/event1.jpg"></a>

                                            </div><!-- .event-thumb -->



                                            <div class="event-date">

                                                <span>06</span>feb

                                            </div>



                                            <div class="event-info">

                                                <h3 class="post-title"><a href="#single-event.html">The new era of positive psychology</a></h3>

                                                <ul class="event-meta">

                                                    <li>At  8:30 am</li>

                                                    <li>Brigde Campus, New York</li>

                                                </ul>

                                            </div><!-- .event-info -->

                                        </div><!-- .event-inner -->

                                    </div><!-- .course -->



                                    <div class="event col-md-4 col-sm-4 col-xs-4 free">

                                        <div class="event-inner shadow">

                                            <div class="event-thumb">

                                                <a href="#single-event.html" class="mini-zoom"><img alt="" src="{{ $base_url }}/images/placeholder/event2.jpg"></a>

                                            </div><!-- .event-thumb -->



                                            <div class="event-date">

                                                <span>18</span>feb

                                            </div>



                                            <div class="event-info">

                                                <h3 class="post-title"><a href="#single-event.html">Cambridge Campus, New York</a></h3>

                                                <ul class="event-meta">

                                                    <li>At  9:00 am</li>

                                                    <li>Cambridge Campus, New York</li>

                                                </ul>

                                            </div><!-- .event-info -->

                                        </div><!-- .event-inner -->

                                    </div><!-- .course -->



                                    <div class="event col-md-4 col-sm-4 col-xs-4 free">

                                        <div class="event-inner shadow">

                                            <div class="event-thumb">

                                                <a href="#single-event.html" class="mini-zoom"><img alt="" src="{{ $base_url }}/images/placeholder/event3.jpg"></a>

                                            </div><!-- .event-thumb -->



                                            <div class="event-date">

                                                <span>22</span>feb

                                            </div>



                                            <div class="event-info">

                                                <h3 class="post-title"><a href="#single-event.html">How to connect social community?</a></h3>

                                                <ul class="event-meta">

                                                    <li>At  10:00 am</li>

                                                    <li>Universum Campus, London</li>

                                                </ul>

                                            </div><!-- .event-info -->

                                        </div><!-- .event-inner -->

                                    </div><!-- .course -->

                                </div>



                                <a href="##" class="button large rounded see-more-btn">See more events</a>

                            </div>

                        </section><!-- #home-event -->


                        <section id="call-to-action" class="call-to-action parallax-window" data-parallax="scroll" data-image-src="{{ $base_url }}/images/placeholder/call-to-action.jpg">

                            <div class="container">

                                <div class="call-to-action-content">

                                    <h2>University Themes</h2>

                                    <div class="desc">Make Your Success a Priority</div>

                                    <a href="##" class="button primary rounded large animation-element fade-left">Apply Now</a>

                                    <a href="##" class="button pink rounded large animation-element fade-right">Campus Life</a>

                                </div><!-- .call-to-action-content -->

                            </div><!-- .container -->

                        </section><!-- .call-to-action -->


                        <section id="home-professor">

                            <div class="container">

                                <h2 class="main-title ribbon"><span>Featured Professor</span></h2>

                                <p class="center">Professor mauris nisl velit auctor eget ex eget, pretium elementum commodo massa metus</p>



                                <div class="team-slider carou-slider animation-element fade-in">

                                    <div class="slider">

                                        <div class="item">

                                            <div class="team box">

                                                <div class="thumb">

                                                    <img src="{{ $base_url }}/images/placeholder/team1.png" alt="">

                                                    <div class="thumb-info">

                                                        <div class="socials">

                                                            <ul>

                                                                <li><a href="##" target="_blank"><i class="fa fa-envelope"></i></a></li>

                                                                <li><a href="##" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                                                <li><a href="##" target="_blank"><i class="fa fa-linkedin "></i></a></li>

                                                            </ul>

                                                        </div>

                                                        <a href="##" class="read-more">Read More</a>

                                                    </div><!-- .thumb-info -->

                                                </div><!-- .thumb -->



                                                <div class="info">

                                                    <span class="name">Peter Hart</span>

                                                    <span class="job">Economic professor</span>

                                                    <p>Nam tempus ipsum non magna varius imperdiet. Etiam non sapien id diam cursus rutrum. Nulla nec leo ultrices, porttitor dui vel ornare massa.</p>

                                                </div>

                                            </div><!-- .team -->

                                        </div><!-- .item -->



                                        <div class="item">

                                            <div class="team box">

                                                <div class="thumb">

                                                    <img src="{{ $base_url }}/images/placeholder/team2.png" alt="">

                                                    <div class="thumb-info">

                                                        <div class="socials">

                                                            <ul>

                                                                <li><a href="##" target="_blank"><i class="fa fa-envelope"></i></a></li>

                                                                <li><a href="##" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                                                <li><a href="##" target="_blank"><i class="fa fa-linkedin "></i></a></li>

                                                            </ul>

                                                        </div>

                                                        <a href="##" class="read-more">Read More</a>

                                                    </div><!-- .thumb-info -->

                                                </div><!-- .thumb -->



                                                <div class="info">

                                                    <span class="name">Betty Lane</span>

                                                    <span class="job">Biological Professor</span>

                                                    <p>Curabitur laoreet imperdiet eros, condimentum feugiat quam. Maecenas elementum metus leo, vitae pellentesque justo. Nunc iaculis, velit ac posuere</p>

                                                </div>

                                            </div>

                                        </div><!-- .item -->



                                        <div class="item">

                                            <div class="team box">

                                                <div class="thumb">

                                                    <img src="{{ $base_url }}/images/placeholder/team3.png" alt="">

                                                    <div class="thumb-info">

                                                        <div class="socials">

                                                            <ul>

                                                                <li><a href="##" target="_blank"><i class="fa fa-envelope"></i></a></li>

                                                                <li><a href="##" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                                                <li><a href="##" target="_blank"><i class="fa fa-linkedin "></i></a></li>

                                                            </ul>

                                                        </div>

                                                        <a href="##" class="read-more">Read More</a>

                                                    </div><!-- .thumb-info -->

                                                </div><!-- .thumb -->



                                                <div class="info">

                                                    <span class="name">Richard Pierce</span>

                                                    <span class="job">Economics professor</span>

                                                    <p>Nullam sed egestas nisi, sit amet commodo ex. Pellentesque egestas lobortis enim, quis laoreet ligula sodales nec. In lectus ante, gravida id  consectetur</p>

                                                </div>

                                            </div>

                                        </div><!-- .item -->



                                        <div class="item">

                                            <div class="team box">

                                                <div class="thumb">

                                                    <img src="{{ $base_url }}/images/placeholder/team4.png" alt="">

                                                    <div class="thumb-info">

                                                        <div class="socials">

                                                            <ul>

                                                                <li><a href="##" target="_blank"><i class="fa fa-envelope"></i></a></li>

                                                                <li><a href="##" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                                                <li><a href="##" target="_blank"><i class="fa fa-linkedin "></i></a></li>

                                                            </ul>

                                                        </div>

                                                        <a href="##" class="read-more">Read More</a>

                                                    </div><!-- .thumb-info -->

                                                </div><!-- .thumb -->



                                                <div class="info">

                                                    <span class="name">Janice Rose</span>

                                                    <span class="job">Mathematics professor</span>

                                                    <p>Suspendisse dolor ipsum, posuere nec velit at, commodo hendrerit neque. Sed vitae dui in sapien convallis rhoncus. Etiam sodales metus era</p>

                                                </div>

                                            </div>

                                        </div><!-- .item -->



                                        <div class="item">

                                            <div class="team box">

                                                <div class="thumb">

                                                    <img src="{{ $base_url }}/images/placeholder/team1.png" alt="">

                                                    <div class="thumb-info">

                                                        <div class="socials">

                                                            <ul>

                                                                <li><a href="##" target="_blank"><i class="fa fa-envelope"></i></a></li>

                                                                <li><a href="##" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                                                <li><a href="##" target="_blank"><i class="fa fa-linkedin "></i></a></li>

                                                            </ul>

                                                        </div>

                                                        <a href="##" class="read-more">Read More</a>

                                                    </div><!-- .thumb-info -->

                                                </div><!-- .thumb -->



                                                <div class="info">

                                                    <span class="name">Peter Hart</span>

                                                    <span class="job">Economic professor</span>

                                                    <p>Nam tempus ipsum non magna varius imperdiet. Etiam non sapien id diam cursus rutrum. Nulla nec leo ultrices, porttitor dui vel ornare massa.</p>

                                                </div>

                                            </div><!-- .team -->

                                        </div><!-- .item -->

                                    </div><!-- .slider -->

                                </div><!-- .team-slider -->

                            </div><!-- .container -->

                        </section><!-- #home-professor -->


                        <section id="home-partner">

                            <div class="container">

                                <div class="carousel animation-element fade-in">

                                    <div class="slider">

                                        <div class="item">

                                            <a href="##"><img src="{{ $base_url }}/images/placeholder/partner1.png" alt=""></a>

                                        </div>

                                        <div class="item">

                                            <a href="##"><img src="{{ $base_url }}/images/placeholder/partner2.png" alt=""></a>

                                        </div>

                                        <div class="item">

                                            <a href="##"><img src="{{ $base_url }}/images/placeholder/partner3.png" alt=""></a>

                                        </div>

                                        <div class="item">

                                            <a href="##"><img src="{{ $base_url }}/images/placeholder/partner4.png" alt=""></a>

                                        </div>

                                        <div class="item">

                                            <a href="##"><img src="{{ $base_url }}/images/placeholder/partner5.png" alt=""></a>

                                        </div>

                                        <div class="item">

                                            <a href="##"><img src="{{ $base_url }}/images/placeholder/partner6.png" alt=""></a>

                                        </div>

                                        <div class="item">

                                            <a href="##"><img src="{{ $base_url }}/images/placeholder/partner1.png" alt=""></a>

                                        </div>

                                    </div><!-- .slider -->

                                </div><!-- .carousel -->

                            </div><!-- .container -->

                        </section><!-- .home-partner -->

            --}}

        </main><!-- .site-main -->

    </div><!-- .site-content -->


    <div style="margin-top: 20px;clear: both;"></div>

    <div class="container">

        <div class="row">

            <main id="main" class="site-main col-md-9">


                <h2 class="title">Welcome to CUS (Kampot Campus)</h2>

                <blockquote>

                    <p>Cambodian University for Specialties (CUS) (Kampot Campus) is located in the town center with the spacious compound of nearly 2,100m2 and with very comfortable and convenient building and sufficient equipment. It is one of the seven campuses, called CUS, operating in Cambodia.CUS.It started its academic activities in 2003 in order to offer higher education and vocational training services to students in the southwest provinces, such as Kampot, Takeo, andKamponspoeu. Based on the need of the people in the provinces, we are offering different levels of education ranging from vocational training to master degrees. The campus has three faculties, namely Faculty of Business Management, Faculty of Information Technology, and Faculty of Education and Languages and Master Degree.</p>
                    {{--<p><strong>- Steve Job’s</strong></p>--}}

                </blockquote>



                <div class="row">

                    <div class="col-md-6">
                        <h3 class="widget-title">{{ _t('LATEST NEWS') }}</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                $event_trainings = \App\EventPost::where('event_type','LATEST-NEWS')->orderBy('event_posts.id','DESC')->limit(6)->get();

                                ?>
                            </div>
                            @foreach($event_trainings as $row)
                                <?php
                                $image_url = json_decode($row->image_url);
                                $title = _tt(json_decode($row->title));
                                $description = _tt(json_decode($row->description));
                                ?>
                                <div class="col-md-12">

                                    <div class="speaker">

                                        <div class="speaker-thumb">

                                            @if(isset($image_url[0]))
                                              <a href="{{ url("/event-detail/{$row->id}.html") }}">
                                                  <img src="{{  asset("uploads/tmp1/{$image_url[0]}") }}" alt="">
                                              </a>
                                            @endif


                                            {{--<div class="socials">

                                                <ul>

                                                    <li><a href="##" target="_blank"><i class="fa fa-envelope"></i></a></li>

                                                    <li><a href="##" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                                    <li><a href="##" target="_blank"><i class="fa fa-linkedin "></i></a></li>

                                                </ul>

                                            </div>--}}

                                        </div><!-- .speaker-thumb -->



                                        <div class="speaker-info">

                                            <span class="name">{{ $title }}</span>

                                            <span class="job">{{ $row->created_at->format('d-m-Y') }}</span>

                                            <p>{{ $description }}</p>

                                        </div><!-- .speaker-info -->

                                    </div><!-- .speaker -->

                                </div>
                            @endforeach


                        </div>

                        <nav class="pagination">

                            <ul>

                                <ul>

                                    <li class="next"><a href="{{ url("event/LATEST-NEWS.html") }}">{{ _t('More') }}</a></li>

                                </ul>

                            </ul>

                        </nav>
                        <div style="margin-top: 20px;clear: both;"></div>
                    </div>

                    <div class="col-md-6">
                        <h3 class="widget-title">{{ _t('EVENTS AND TRAINING') }}</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                $event_trainings = \App\EventPost::where('event_type','EVENTS-AND-TRAINING')->orderBy('event_posts.id','DESC')->limit(6)->get();

                                ?>
                            </div>
                            @foreach($event_trainings as $row)
                                <?php
                                $image_url = json_decode($row->image_url);
                                $title = _tt(json_decode($row->title));
                                $description = _tt(json_decode($row->description));
                                ?>
                                <div class="col-md-12">

                                    <div class="speaker">

                                        <div class="speaker-thumb">

                                            @if(isset($image_url[0]))
                                                <a href="{{ url("/event-detail/{$row->id}.html") }}">
                                                    <img src="{{  asset("uploads/tmp1/{$image_url[0]}") }}" alt="">
                                                </a>
                                            @endif


                                            {{--<div class="socials">

                                                <ul>

                                                    <li><a href="##" target="_blank"><i class="fa fa-envelope"></i></a></li>

                                                    <li><a href="##" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                                    <li><a href="##" target="_blank"><i class="fa fa-linkedin "></i></a></li>

                                                </ul>

                                            </div>--}}

                                        </div><!-- .speaker-thumb -->



                                        <div class="speaker-info">

                                            <span class="name">{{ $title }}</span>

                                            <span class="job">{{ $row->created_at->format('d-m-Y') }}</span>

                                            <p>{{ $description }}</p>

                                        </div><!-- .speaker-info -->

                                    </div><!-- .speaker -->

                                </div>
                            @endforeach


                        </div>

                        <nav class="pagination">

                            <ul>

                                <ul>

                                    <li class="next"><a href="{{ url("event/EVENTS-AND-TRAINING.html") }}">{{ _t('More') }}</a></li>

                                </ul>

                            </ul>

                        </nav>
                        <div style="margin-top: 20px;clear: both;"></div>
                    </div>

                </div>



            </main><!-- .site-main -->


            <div id="sidebar" class="sidebar col-md-3">

                @include('frontend.front.sidebar_right')


            </div><!-- .sidebar -->

        </div><!-- .row -->

    </div><!-- .container -->


    <?php
    $professors = \App\Professor::all();
    ?>

    @if($professors)

        <section id="home-professor">

            <div class="container">

                <p class="center">PROFESSORS AND TRAINERS</p>

                <div class="team-slider carou-slider animation-element fade-in">

                    <div class="slider">
                        @foreach($professors as $row)
                            <?php $img_slide = json_decode($row->image_url);
                            $filename = isset($img_slide[0])?$img_slide[0]:'#';
                            ?>
                            <div class="item">

                                <div class="team box">

                                    <div class="thumb">

                                        <img src="{{  asset("uploads/{$filename}") }}" alt="">

                                        <div class="thumb-info">

                                            <div class="socials">

                                                <ul>

                                                    <li><a href="##" target="_blank"><i class="fa fa-envelope"></i></a></li>

                                                    <li><a href="##" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                                    <li><a href="##" target="_blank"><i class="fa fa-linkedin "></i></a></li>

                                                </ul>

                                            </div>

                                            <a href="##" class="read-more">Read More</a>

                                        </div><!-- .thumb-info -->

                                    </div><!-- .thumb -->



                                    <div class="info">

                                        <span class="name">{{ _tt($row->title) }}</span>

                                        <span class="job">{{ $row->professor_type }}</span>

                                        <p>{{ _tt($row->description) }}</p>

                                    </div>

                                </div><!-- .team -->

                            </div><!-- .item -->
                        @endforeach

                    </div><!-- .slider -->

                </div><!-- .team-slider -->

            </div><!-- .container -->

        </section><!-- #home-professor -->

    @endif


@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection