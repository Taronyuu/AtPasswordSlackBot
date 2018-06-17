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
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <span class="logo"><img src="{{ url('images/logo-small.png') }}" alt="" /></span>
        <h1>At Password</h1>
        <p>A Slack app to securely share passwords with your teammates.</p>
    </header>

    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li><a href="#intro" class="active">Introduction</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#installation">Installation</a></li>
        </ul>
    </nav>

    <!-- Main -->
    <div id="main">

        <!-- Introduction -->
        <section id="intro" class="main">
            <div class="spotlight">
                <div class="content">
                    <header class="major">
                        <h2>About At Password</h2>
                    </header>
                    <p>
                        Remember the old time when people only shared passwords in a safe way? No? We don't either. That's why we've developed a simple and easy way
                        to share passwords with your team. Don't just paste plain passwords anymore and leave them up for grabs, but encrypt them and make sure only
                        the people that need to see it can.
                    </p>
                    <ul class="actions">
                        <li><a href="#installation" class="button">Get started</a></li>
                    </ul>
                </div>
                <span class="image"><img src="{{ url('images/slack.png') }}" alt="" /></span>
            </div>
        </section>

        <!-- First Section -->
        <section id="features" class="main special">
            <header class="major">
                <h2>Features</h2>
            </header>
            <ul class="features">
                <li>
                    <span class="icon major style1 fa-code"></span>
                    <h3>Secure</h3>
                    <p>Passwords are encrypted using the latest technology and deleted after 24 hours.</p>
                </li>
                <li>
                    <span class="icon major style5 fa-diamond"></span>
                    <h3>Easy</h3>
                    <p>Every password share is only a <code>/password</code> command away. No need to type more then necessary.</p>
                </li>
                <li>
                    <span class="icon major style3 fa-copy"></span>
                    <h3>Automated deletion</h3>
                    <p>Never forget to delete a password from your history and leave them up for attackers to find.</p>
                </li>
            </ul>
            <footer class="major">
                <ul class="actions special">
                    <li><a href="#installation" class="button">Installation</a></li>
                </ul>
            </footer>
        </section>

        <!-- Get Started -->
        <section id="installation" class="main special">
            <header class="major">
                <h2>Installation</h2>
                <p>
                    After clicking the button below you will be redirected to the page to Authorize this application.
                    The application will only require access to a Slash Command. <strong>Unless the <code>/password</code> command is invoked, nothing in
                    your team will be shared with this application.</strong>
                </p>
                <p>
                    Afterwards the command <strong>/password</strong> is added to your workspace. You can use this to share a password inside a channel or private message.
                    A teammate will be able decrypt this passwords with the provider command.
                </p>
            </header>
            <footer class="major">
                <ul class="actions special">
                    <li>
                        <a href="https://slack.com/oauth/authorize?client_id=298768238515.378589373155&scope=commands"><img alt="Add to Slack" height="40" width="139" src="https://platform.slack-edge.com/img/add_to_slack.png" srcset="https://platform.slack-edge.com/img/add_to_slack.png 1x, https://platform.slack-edge.com/img/add_to_slack@2x.png 2x" /></a>
                    </li>
                    {{--<li><a href="generic.html" class="button">Learn More</a></li>--}}
                </ul>
            </footer>
        </section>

    </div>

    <!-- Footer -->
    <footer id="footer">
        <section>
            <h2>About</h2>
            <p>At Password has been developed to scratch my own itch, everytime I had to share a password in plain text via Slack it felt like something wasn't right.
            To solve this I developed this Slack app to share the passwords encrypted.</p>
            <ul class="actions">
                <li><a href="#features" class="button">Learn More</a></li>
            </ul>
        </section>
        <section>
            <h2>Contact</h2>
            <dl class="alt">
                <dt>Email</dt>
                <dd><a href="mailto:me@zandervdm.nl">me@zandervdm.nl</a></dd>
            </dl>
        </section>
        <p class="copyright">&copy; At Password. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
    </footer>

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