<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SITE META -->
    <title>Techmag | Responsive Magazine Site Template</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/public/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/public/images/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/public/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/public/images/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/public/images/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/public/images/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/public/images/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/public/images/apple-touch-icon-152x152.png">

    <!-- TEMPLATE STYLES -->
    <link rel="stylesheet" type="text/css" href="/public/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/public/style.css">

    <!-- CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="/css/custom.css">

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div class="container single-wrapper bgw">
    <div class="row justify-content-md-center">
        <div class="single-post">
            <div class="widget">
                <div class="large-widget m30">
                    <div class="post clearfix justify-content-md-center bg-light">

                        <div class="container col-lg-8 post-media">
                            <a href="single.html">
                                <img style="border-radius: 25px;" alt="" src="{{$diary->avatar}}" class="img-responsive">
                            </a>
                        </div>

                        <div class="title-area">
                            <h3 class="text-center">{{$diary->title}}</h3>
                        </div><!-- /.pull-right -->

                    </div><!-- end post -->

                    <div class="post-desc">
                        {!!$diary->content!!}
                    </div><!-- end post-desc -->

                </div><!-- end large-widget -->
            </div><!-- end widget -->
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end container -->


</div><!-- end wrapper -->
<!-- END SITE -->

<script src="/public/js/jquery.min.js"></script>
<script src="/public/js/bootstrap.js"></script>
<script src="/public/js/plugins.js"></script>

</body>
</html>
