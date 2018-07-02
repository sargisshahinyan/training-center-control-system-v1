<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" ng-app="app" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" ng-app="app" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" ng-app="app" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" ng-app="app" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Title</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="http://mail.yermetro.am/skins/larry/images/favicon.ico">

    <link rel="stylesheet" href="/bower_components/html5-boilerplate/dist/css/normalize.css">
    <link rel="stylesheet" href="/bower_components/html5-boilerplate/dist/css/main.css">

    <!-- video.js (also see playStream() function) -->
    <!--<link href="/js/video-js/video-js.css" rel="stylesheet" type="text/css">-->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />

    <!-- Styles -->
    <link rel="stylesheet" href="/css/monitor.css" />

    <!-- Libraries -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Angular -->
    <script src="/bower_components/angular/angular.js"></script>
    <script src="/bower_components/angular-route/angular-route.min.js"></script>

    <!-- App -->
    <script src="/js/angular-files/app.js"></script>

    <!-- Services -->
    <script src="/js/angular-files/services.js"></script>

    <!-- Routes -->
    <script src="/js/angular-files/routes.js"></script>

    <!-- Controllers-->
    <script src="/js/angular-files/controllers.js"></script>

    <!-- Directives -->
    <script src="/js/angular-files/directives.js"></script>

    <!-- Bootstrap -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Video Stream -->
</head>
<body>
    <?php
    if(!empty($admin)) {
        $this->load->view("admin_navbar", [
            "target" => 2
        ]);
    } else {
        $this->load->view("operator_navbar");
    }
    ?>
    <ng-view></ng-view>
</body>
</html>