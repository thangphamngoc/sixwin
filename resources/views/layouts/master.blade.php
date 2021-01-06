<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&amp;subset=vietnamese" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/master.css')}}">
	<title>text to speech</title>
</head>
<body>
	<div class="site">
        <div class="wrapper-fluid wrapper-navbar desktop-nav">
            <nav class="navbar navbar-expand-md">
                <div class="container">
                    <!-- Logo (flex item 1)-->
                    <div class="logo">
                        <a href="#">
                            <img src="https://sixwin.io/img/30.png" alt="sixwin Architecture &amp; Design">
                        </a>
                    </div>
                </div>
            <!-- .container -->
            </nav>
        <!-- .site-navigation -->
        </div>
        <div id="app">
            <router-view></router-view>
        </div>
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 clearfix">
                        <div class="copyright">
                             © 2020 Thangpn.
                             <span>All Rights Reserved.</span>
                        </div>
                        <div class="affiliates">
                            <span> <a href="#" target="_blank">Liên kết</a></span>
                            <span> <a href="#" target="_blank">Back link</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
	<script src="{{asset('js/master.js')}}"></script>
</body>
</html>