<?php $base_url = asset('sh/');// base_url("assets"); ?>
<aside class="widget">

    <h3 class="widget-title">Academic Program </h3>

    {!! \App\Faculty::get_faculty_list_front() !!}

</aside><!-- .widget -->

<aside class="widget courses-widget">

    <h3 class="widget-title">SOCIAL WORKS</h3>

    <div class="courses">

        <ul>

            <li>

                <a class="thumb" href="##"><img src="{{ $base_url }}/images/placeholder/course-wd1.jpg" alt=""></a>

                <div class="info">

                    <h4><a href="##">Red Cross</a></h4>

                    <span><i class="fa fa-users"></i> 2289</span>

                </div>

            </li>



            <li>

                <a class="thumb" href="##"><img src="{{ $base_url }}/images/placeholder/course-wd2.jpg" alt=""></a>

                <div class="info">

                    <h4><a href="##">Student Association</a></h4>

                    <span><i class="fa fa-users"></i> 1762</span>

                </div>

            </li>



            <li>

                <a class="thumb" href="##"><img src="{{ $base_url }}/images/placeholder/course-wd3.jpg" alt=""></a>

                <div class="info">

                    <h4><a href="##">Scout (Kayarith)</a></h4>

                    <span><i class="fa fa-users"></i> 1226</span>

                </div>

            </li>

        </ul>

    </div><!-- .widget -->

</aside><!-- .widget -->

<aside class="widget courses-widget">

    <h3 class="widget-title">Facebook</h3>

    <div class="courses">
        <div id="fb-root"></div>

        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <div class="fb-like-box fb-page" data-href="https://www.facebook.com/pages/CUS/442936839148095"
             data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false"
             data-show-border="false">
        </div>
    </div><!-- .widget -->

    <style>
        .fb-page,
        .fb-page span,
        .fb-page span iframe[style] {
            width: 100% !important;
        }
    </style>

</aside><!-- .widget -->