<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>At Password - A Slack app made with <3</title>
    <meta name="description" content="Slack app to securely share passwords with your teammates.">
    <meta name="keywords" content="Slack,app,passwords,secure">
    <meta name="author" content="Zander van der Meer">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/app.css') }}" />
    <noscript><link rel="stylesheet" href="{{ url('assets/css/noscript.css') }}" /></noscript>
    <meta name="slack-app-id" content="AB4HBAZ4K">

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">
    @yield('content')
</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>