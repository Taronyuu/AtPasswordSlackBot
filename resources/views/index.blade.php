@extends('master.master')

@section('content')
    <!-- Header -->
    <header id="header" class="alt">
        <span class="logo"><img src="{{ url('images/logo-small.png') }}" alt="" /></span>
        <h1>At Password</h1>
        <p>A Slack app to securely share passwords with your teammates.</p>
        <p class="no-bottom">@include('master.partials.slack')</p>
    </header>

    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li><a href="#intro" class="active">Introduction</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#installation">Installation</a></li>
            <li><a href="#selfhosting">Self hosting</a></li>
        </ul>
    </nav>

    <!-- Main -->
    <div id="main">
        @if(app('request')->get('success'))
            <div class="alert alert-success">
                <p>Your application has been successfully authorized. You can use the <strong>/password</strong> command from your Slack client.</p>
            </div>
        @endif
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
                        @include('master.partials.slack')
                    </li>
                    {{--<li><a href="generic.html" class="button">Learn More</a></li>--}}
                </ul>
            </footer>
        </section>

        <section id="selfhosting" class="main special">
            <header class="major">
                <h2>Self hosting</h2>
                <p>Obviously we understand that most people don't trust another 3rd party. Therefore the code is fully open source and free for you to host it yourself.</p>
                <p><a href="https://github.com/Taronyuu/AtPasswordSlackBot">Checkout the repository</a></p>
            </header>
            <footer class="major">
                <ul class="actions special">
                    <li>
                        <!-- Place this tag where you want the button to render. -->
                        <a class="github-button" href="https://github.com/Taronyuu" data-size="large" data-show-count="true" aria-label="Follow @Taronyuu on GitHub">Follow @Taronyuu</a>
                    </li><li>
                        <!-- Place this tag where you want the button to render. -->
                        <a class="github-button" href="https://github.com/Taronyuu/AtPasswordSlackBot" data-size="large" data-show-count="true" aria-label="Star Taronyuu/AtPasswordSlackBot on GitHub">Star</a>
                    </li><li>
                        <!-- Place this tag where you want the button to render. -->
                        <a class="github-button" href="https://github.com/Taronyuu/AtPasswordSlackBot/fork" data-size="large" data-show-count="true" aria-label="Fork Taronyuu/AtPasswordSlackBot on GitHub">Fork</a>
                    </li><li>
                        <!-- Place this tag where you want the button to render. -->
                        <a class="github-button" href="https://github.com/Taronyuu/AtPasswordSlackBot/issues" data-size="large" data-show-count="true" aria-label="Issue Taronyuu/AtPasswordSlackBot on GitHub">Issue</a>
                    </li><li>
                        <!-- Place this tag where you want the button to render. -->
                        <a class="github-button" href="https://github.com/Taronyuu/AtPasswordSlackBot/archive/master.zip" data-size="large" aria-label="Download Taronyuu/AtPasswordSlackBot on GitHub">Download</a>

                    </li>
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
            <h2>Support</h2>
            <dl class="alt" id="support">
                <dt>Email</dt>
                <dd><a href="mailto:me@zandervdm.nl">me@zandervdm.nl</a></dd>
            </dl>
        </section>
        <p class="copyright">&copy; At Password. Design: <a href="https://html5up.net">HTML5 UP</a>. <a href="{{ url('privacy-policy') }}">Privacy Policy</a></p>
    </footer>
@endsection