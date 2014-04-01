<?php
/**
 *	This is the main include file shared by the site and the wordpress blog.
 *
 *	This file is copied into the Wordpress theme folder when running grunt
 *
 */

// Check if production or development for links
$host = parse_url($_SERVER['HTTP_HOST'], PHP_URL_HOST);

// EXTERNAL URLS
if ($host == 'localhost' || $host == '0.0.0.0' || strpos($host, '192.168') === 0) {
	// DEVELOPMENT LINKS
	define('ELASTICA_SITE_ROOT', '');
	define('ELASTICA_BLOG_URL',  '/articles');
}
else if ($host == 'www2.elastica.net' || $host == 'elastica.staging.wpengine.com') {
	// STAGING LINKS
	define('ELASTICA_SITE_ROOT', 'http://www2.elastica.net');
	define('ELASTICA_BLOG_URL',  'http://elastica.staging.wpengine.com');
}
else {
	// PRODUCTION LINKS
	define('ELASTICA_SITE_ROOT', 'http://www.elastica.net');
	define('ELASTICA_BLOG_URL',  'http://info.elastica.net');
}

define('ELASTICA_SIGNUP_URL', '/hs/demo');
define('ELASTICA_LOGIN_URL', 'http://app.elastica.net');

// Used by the Elastica site to print out the HTML head
function elastica_render_html_head($page_title = NULL, $page_body_class_prefix = NULL, $page_meta_og_properties = NULL) {

	$html_title = '';
	if ($page_title !== 'home') {
		$html_title = ucfirst($page_title).' - ';
	}

	if ($page_body_class_prefix === NULL) {
		$page_body_class_prefix = strtolower($page_title);
	}

    $meta_og_markup = '';
	if ($page_meta_og_properties !== NULL) {
	    if (isset($page_meta_og_properties['og_site_name'])) {
	        $meta_og_markup .= "<meta property=\"og:site_name\" content=\"".$page_meta_og_properties['og_site_name']."\">";
	    }
	    if (isset($page_meta_og_properties['og_type'])) {
	        $meta_og_markup .= "<meta property=\"og:type\" content=\"".$page_meta_og_properties['og_type']."\">";
	    }
        if (isset($page_meta_og_properties['og_image'])) {
	        $meta_og_markup .= "<meta property=\"og:image\" content=\"".$page_meta_og_properties['og_image']."\">";
	    }
	    if (isset($page_meta_og_properties['og_url'])) {
	        $meta_og_markup .= "<meta property=\"og:url\" content=\"".$page_meta_og_properties['og_url']."\">";
	    }
	    if (isset($page_meta_og_properties['og_title'])) {
	        $meta_og_markup .= "<meta property=\"og:title\" content=\"".$page_meta_og_properties['og_title']."\">";
	    }
	    if (isset($page_meta_og_properties['og_description'])) {
            $meta_og_markup .= "<meta property=\"og:description\" content=\"".$page_meta_og_properties['og_description']."\">";
        }
	}

	echo <<<EOT
		<!doctype html>
		<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
		<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
		<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
		<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>$html_title Elastica</title>
			<meta name="description" content="">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			$meta_og_markup
			<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
			<!-- build:css /styles/vendor.css -->
			<link rel="stylesheet" href="/owl-carousel/owl.carousel.css">
			<link rel="stylesheet" href="/owl-carousel/owl.theme.css">
			<!-- bower:css -->
			<!-- endbower -->
			<!-- endbuild -->
			<!-- build:css(.tmp) /styles/main.css -->
			<link rel="stylesheet" href="/styles/main.css">
			<!-- endbuild -->
			<script src="/bower_components/modernizr/modernizr.js"></script>

			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	    <![endif]-->
		</head>
		<body id="$page_body_class_prefix-page">
EOT;
}

// Used by the Elastica site and WP blog to print out layout header
function elastica_render_header($page_name, $page_name_link = '#') {

	$ELASTICA_SITE_ROOT = ELASTICA_SITE_ROOT;
	$ELASTICA_BLOG_URL = ELASTICA_BLOG_URL;
	$ELASTICA_SIGNUP_URL = ELASTICA_SIGNUP_URL;
	$ELASTICA_LOGIN_URL = ELASTICA_LOGIN_URL;

	echo <<<EOT

		<header class="header-container container">
			<div class="header">
				<a href="$ELASTICA_SITE_ROOT/" class="header__logo">
					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 166 60"><path fill-rule="evenodd" clip-rule="evenodd" fill="#fff" d="M41.9 14.7l-6.8.9c-7.4-.4-13.6-7.8-15.9-11-3.5-5.1-10.2-6.1-14.9-2.3-4.7 3.8-5.7 11-2.1 16.1l.4.6-.5-.5c2.3 3.2 7.4 11.9 5.5 19.8-.2.6-.2 1.1-.3 1.5l-1.7 4.4c-2.3 5.8.2 12.6 5.7 15 1.3.6 2.7.9 4 .9h.3c4.1-.1 8-2.7 9.8-7l.7-1.6c2.1-4.2 6.8-11.5 13.4-13 .5-.1.9-.2 1.2-.3l4-.5c5.9-.8 10.1-6.5 9.3-12.8-.8-6.5-6.2-11-12.1-10.2z" enable-background="new"/><g fill="#fff"><path d="M74.2 31.6c.2 2.3 2.2 3.6 4.2 3.5 1.7 0 2.8-.8 3.5-1.9h3.5c-.7 1.6-1.7 2.8-2.9 3.6-1.2.8-2.6 1.2-4.1 1.2-4.4 0-7.6-3.6-7.6-7.5 0-4.1 3.2-7.6 7.5-7.6 2.1 0 4 .8 5.4 2.2 1.8 1.8 2.4 4 2.1 6.5h-11.6zm8.2-2.6c-.1-1.4-1.6-3.2-4.1-3.2-2.5 0-3.9 1.8-4.1 3.2h8.2zM87.4 18.4h3.4v19.2h-3.4v-19.2zM107.9 37.6h-3.4v-2.1c-.9 1.7-2.8 2.5-4.8 2.5-4.6 0-7.3-3.6-7.3-7.6 0-4.5 3.3-7.6 7.3-7.6 2.6 0 4.2 1.4 4.8 2.5v-2.1h3.4v14.4zm-12.1-7.1c0 1.8 1.3 4.3 4.4 4.3 1.9 0 3.2-1 3.8-2.3.3-.6.5-1.3.5-2s-.1-1.4-.4-2c-.6-1.4-1.9-2.5-4-2.5-2.7.1-4.3 2.3-4.3 4.5zM116.5 27.2c0-.8-.4-1.5-1.8-1.5-1.2 0-1.7.7-1.7 1.4 0 .9 1.1 1.4 2.4 1.8 2.3.6 4.8 1.3 4.8 4.4.1 2.9-2.4 4.8-5.4 4.8-2.2 0-5.2-1.1-5.5-4.6h3.4c.1 1.5 1.5 1.8 2.1 1.8 1.1 0 2-.7 2-1.7 0-1.2-1.1-1.6-3.7-2.5-1.9-.6-3.5-1.7-3.5-3.7 0-2.8 2.4-4.6 5.2-4.6 1.9 0 4.8.9 5.1 4.3h-3.4zM122.8 26h-2.4v-2.6h2.4v-5h3.4v5h2.5v2.6h-2.5v11.6h-3.4v-11.6zM129.6 18.4h3.4v3h-3.4v-3zm0 4.9h3.4v14.3h-3.4v-14.3zM149.7 32.4c-.8 3.2-3.7 5.6-7.4 5.6-4.6 0-7.7-3.5-7.7-7.6 0-4.2 3.3-7.6 7.6-7.6 3.6 0 6.7 2.3 7.5 5.7h-3.5c-.6-1.5-2-2.6-3.9-2.6-1.3 0-2.2.4-3.1 1.2-.7.8-1.2 1.9-1.2 3.2 0 2.6 1.8 4.4 4.2 4.4 2.1 0 3.3-1.3 3.9-2.4h3.6zM166 37.6h-3.4v-2.1c-.9 1.7-2.8 2.5-4.8 2.5-4.6 0-7.3-3.6-7.3-7.6 0-4.5 3.3-7.6 7.3-7.6 2.6 0 4.2 1.4 4.8 2.5v-2.1h3.4v14.4zm-12.1-7.1c0 1.8 1.3 4.3 4.4 4.3 1.9 0 3.2-1 3.8-2.3.3-.6.5-1.3.5-2s-.1-1.4-.4-2c-.6-1.4-1.9-2.5-4-2.5-2.8.1-4.3 2.3-4.3 4.5z"/></g></svg>
				</a>
				<span class="header__logo-slash">
					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 12.9 44.5"><path fill-rule="evenodd" clip-rule="evenodd" fill="#fff" d="M11 0l1.9.5-11 44-1.9-.5 11-44z"/></svg>
				</span>
				<span class="header__page-title">
					<h1>$page_name</h1>
				</span>
				<!--nav class="header__nav">

					<a class="header__nav__item header__nav__desktop btn-menu btn-menu--outline-on-hover" href="$ELASTICA_SITE_ROOT/platform">Platform</a>
					<span class="header__nav__item header__nav__desktop">
						<a class="btn-menu btn-menu--outline-on-hover" href="$ELASTICA_SITE_ROOT/applications">Elastica Apps</a>
						<span class="header__nav__submenu">
							<ul>
								<li><a href="$ELASTICA_SITE_ROOT/applications">Overview</a></li>
								<li><a href="$ELASTICA_SITE_ROOT/detect">Audit</a></li>
								<li><a href="$ELASTICA_SITE_ROOT/threats">Detect</a></li>
								<li><a href="$ELASTICA_SITE_ROOT/controls">Protect</a></li>
								<li><a href="$ELASTICA_SITE_ROOT/forensics">Investigate</a></li>
							</ul>
						</span>
					</span>
					<span class="header__nav__item header__nav__desktop">
                        <a class="header__nav__item header__nav__desktop btn-menu btn-menu--outline-on-hover" href="$ELASTICA_BLOG_URL">In Depth</a>
                        <span class="header__nav__submenu">
                            <ul>
                                <li><a href="$ELASTICA_BLOG_URL/category/blog">Blogs</a></li>
                                <li><a href="$ELASTICA_BLOG_URL/category/videos">Videos</a></li>
                                <li><a href="$ELASTICA_BLOG_URL/category/chalk-talk">SOC Talk</a></li>
                            </ul>
                        </span>
                    </span>
					<span class="header__nav__item header__nav__desktop">
						<a class="btn-menu btn-menu--outline-on-hover" href="$ELASTICA_SITE_ROOT/company">About</a>
						<span class="header__nav__submenu">
							<ul>
								<li><a href="$ELASTICA_SITE_ROOT/company">Company</a></li>
								<li><a href="$ELASTICA_BLOG_URL/jobs">Careers</a></li>
								<li><a href="$ELASTICA_BLOG_URL/press">News</a></li>
								<li><a href="$ELASTICA_SITE_ROOT/contact">Contact</a></li>
							</ul>
						</span>
					</span>
					<a class="header__nav__item header__nav__desktop btn-menu btn-menu--outline win-ducati" href="$ELASTICA_SITE_ROOT/rsa">Win Ducati</a>
					<a class="header__nav__item header__nav__desktop btn-menu btn-menu--outline" href="$ELASTICA_LOGIN_URL">Login</a>

					<a class="header__nav__item header__nav__signup win-ducati" href="$ELASTICA_SITE_ROOT/rsa"><span>Win Ducati</span></a>
					<a class="header__nav__item header__nav__login" href="$ELASTICA_LOGIN_URL" target="new"><span>Login</span></a>
					<a class="header__nav__item header__nav__menu" href="#" data-menu-toggle>
						<span>Menu</span>
						<div class="header__nav__menu__icon header__nav__menu__icon--open">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 38 28"><path fill-rule="evenodd" clip-rule="evenodd" fill="#fff" d="M0 0v6h38v-6h-38zm0 17h38v-6h-38v6zm0 11h38v-6h-38v6z"/></svg>
						</div>
						<div class="header__nav__menu__icon header__nav__menu__icon--close">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 29 29"><polygon fill-rule="evenodd" clip-rule="evenodd" fill="#fff" points="29,2.5 26.5,0 14.5,12 2.5,0 0,2.5 12,14.5 0,26.5 2.5,29 14.5,17 26.5,29 29,26.5 17,14.5"/></svg>
						</div>
					</a>

				</nav-->
			</div>
		</header>

		<article class="container">

EOT;

}

// Used by the Elastica WP blog to print out the signup component
function elastica_render_section_signup($next_path, $next_title) {

	$ELASTICA_SITE_ROOT = ELASTICA_SITE_ROOT;
	$ELASTICA_SIGNUP_URL = ELASTICA_SIGNUP_URL;
	$ELASTICA_BLOG_URL = ELASTICA_BLOG_URL;

	echo <<<EOT
		<section class="row section--centered signup-callout">
			<div class="col-md-12  signup-callout__row">
				<div class="signup-callout__col">
					<a href="$ELASTICA_BLOG_URL/introducing-elastica" class="btn-outline btn-outline--inverted">Why CloudSOC?</a>
				</div>
				<div class="signup-callout__col">
					<a href="$ELASTICA_SIGNUP_URL" class="btn-outline btn-outline--inverted">Request a Demo</a>
				</div>
				<div class="signup-callout__col">
					<a href="$ELASTICA_SITE_ROOT$next_path" class="btn-outline">Or keep exploring</a>
					<p class="signup-callout__next-up">(next up, $next_title)</p>
				</div>
			</div>
		</section>
EOT;

}

// Used by the Elastica WP blog to print out the signup component
function elastica_render_section_signup_wp() {

	$ELASTICA_SITE_ROOT = ELASTICA_SITE_ROOT;
	$ELASTICA_SIGNUP_URL = ELASTICA_SIGNUP_URL;
	$ELASTICA_BLOG_URL = ELASTICA_BLOG_URL;

	echo <<<EOT
		<section class="row section--centered signup-callout">
			<div class="col-md-12  signup-callout__row">
				<div class="signup-callout__col">
					<a href="$ELASTICA_BLOG_URL/introducing-elastica" class="btn-outline btn-outline--inverted">Why CloudSOC?</a>
				</div>
				<div class="signup-callout__col">
					<a href="$ELASTICA_SITE_ROOT/hs/demo" class="btn-outline btn-outline--inverted">Request a Demo</a>
				</div>
			</div>
		</section>
EOT;

}

// Used by the Elastica site and WP blog to print out the layout footer and modal menu
function elastica_render_footer() {

	$ELASTICA_SITE_ROOT = ELASTICA_SITE_ROOT;
	$ELASTICA_BLOG_URL = ELASTICA_BLOG_URL;
	$ELASTICA_SIGNUP_URL = ELASTICA_SIGNUP_URL;
	$ELASTICA_LOGIN_URL = ELASTICA_LOGIN_URL;

	echo <<<EOT

			<footer class="footer row">
				<nav class="main-navigation">
					<ul class="user-links">
						<li><a href="$ELASTICA_SITE_ROOT/hs/demo">Request Demo</a></li>
						<li><a href="$ELASTICA_LOGIN_URL">Login</a></li>
					</ul>
					<ul class="content-links">
						<li><a href="$ELASTICA_SITE_ROOT/platform" class="menu-item--platform">Platform</a></li>
						<li>
							<a href="$ELASTICA_SITE_ROOT/applications" class="menu-item--applications">Elastica Apps</a>
							<div class="nested-navigation">
								<ul>
									<li><a href="$ELASTICA_SITE_ROOT/detect" class="menu-item--detect">Audit</a></li>
									<li><a href="$ELASTICA_SITE_ROOT/threats" class="menu-item--threats">Detect</a></li>
									<li><a href="$ELASTICA_SITE_ROOT/controls" class="menu-item--controls">Protect</a></li>
									<li><a href="$ELASTICA_SITE_ROOT/forensics" class="menu-item--forensics">Investigate</a></li>
								</ul>
							</div>
						</li>
						<!-- <li><a href="$ELASTICA_SITE_ROOT/store" class="menu-item--store">Store</a></li> -->
						<li>
							<a href="$ELASTICA_BLOG_URL" class="menu-item--in-depth">In Depth</a>
							<div class="nested-navigation">
								<ul>
									<li><a href="$ELASTICA_BLOG_URL/category/blog" class="menu-item--blogs">Blogs</a></li>
									<li><a href="$ELASTICA_BLOG_URL/category/videos" class="menu-item--videos">Videos</a></li>
									<li><a href="$ELASTICA_BLOG_URL/category/chalk-talk" class="menu-item--soctalk">Soc Talk</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="$ELASTICA_SITE_ROOT/company" class="menu-item--about">About</a>
							<div class="nested-navigation">
								<ul>
									<li><a href="$ELASTICA_BLOG_URL/jobs" class="menu-item--careers">Careers</a></li>
									<li><a href="$ELASTICA_BLOG_URL/press" class="menu-item--press">News</a></li>
									<!--<li><a href="$ELASTICA_SITE_ROOT/resources" class="menu-item--resources">Resources</a></li>-->
									<li><a href="$ELASTICA_SITE_ROOT/contact" class="menu-item--contact">Contact</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
				<nav class="footer-navigation">
					<ul>
						<li><a href="$ELASTICA_SITE_ROOT/privacy" class="menu-item--customers">Privacy</a></li>
					</ul>
				</nav>
			</footer>

		</article>

EOT;

	elastica_render_modal_menu();
}

function elastica_render_modal_menu() {

	$ELASTICA_SITE_ROOT = ELASTICA_SITE_ROOT;
	$ELASTICA_BLOG_URL = ELASTICA_BLOG_URL;
	$ELASTICA_SIGNUP_URL = ELASTICA_SIGNUP_URL;
	$ELASTICA_LOGIN_URL = ELASTICA_LOGIN_URL;

	echo <<<EOT

		<!-- Menu Modal -->
		<div class="menu-modal" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<nav class="main-navigation">
					<ul class="user-links">
						<li><a href="$ELASTICA_SITE_ROOT/hs/demo">Request Demo</a></li>
						<li><a href="$ELASTICA_LOGIN_URL">Login</a></li>
					</ul>
					<ul class="content-links">
						<li><a href="$ELASTICA_SITE_ROOT/platform" class="menu-item--platform">Platform</a></li>
						<li>
							<a href="$ELASTICA_SITE_ROOT/applications" class="menu-item--applications">Elastica Apps</a>
							<div class="nested-navigation">
								<ul>
									<li><a href="$ELASTICA_SITE_ROOT/detect" class="menu-item--detect">Audit</a></li>
									<li><a href="$ELASTICA_SITE_ROOT/threats" class="menu-item--threats">Detect</a></li>
									<li><a href="$ELASTICA_SITE_ROOT/controls" class="menu-item--controls">Protect</a></li>
									<li><a href="$ELASTICA_SITE_ROOT/forensics" class="menu-item--forensics">Investigate</a></li>
								</ul>
							</div>
						</li>
						<!-- <li><a href="$ELASTICA_SITE_ROOT/store" class="menu-item--store">Store</a></li> -->
						<li>
							<a href="$ELASTICA_BLOG_URL" class="menu-item--in-depth">In Depth</a>
							<div class="nested-navigation">
								<ul>
									<li><a href="$ELASTICA_BLOG_URL/category/blog" class="menu-item--blogs">Blogs</a></li>
									<li><a href="$ELASTICA_BLOG_URL/category/videos" class="menu-item--videos">Videos</a></li>
									<li><a href="$ELASTICA_BLOG_URL/category/chalk-talk" class="menu-item--soctalk">Soc Talk</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="$ELASTICA_SITE_ROOT/company" class="menu-item--about">About</a>
							<div class="nested-navigation">
								<ul>
									<li><a href="$ELASTICA_BLOG_URL/jobs" class="menu-item--careers">Careers</a></li>
									<li><a href="$ELASTICA_BLOG_URL/press" class="menu-item--press">News</a></li>
									<!--<li><a href="$ELASTICA_SITE_ROOT/resources" class="menu-item--resources">Resources</a></li>-->
									<li><a href="$ELASTICA_SITE_ROOT/contact" class="menu-item--contact">Contact</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
				<nav class="footer-navigation">
					<ul>
						<li><a href="$ELASTICA_SITE_ROOT/privacy" class="menu-item--customers">Privacy</a></li>
					</ul>
				</nav>
		</div><!-- /.modal -->

EOT;
}

// Used by the Elastica site to print out the end of the HTML page
// Inline directives for the Grunt minification tasks
function elastica_render_html_footer() {

	echo <<<EOT

		<!-- build:js /scripts/vendor.js -->
		<!-- bower:js -->
		<script src="/bower_components/jquery/jquery.js"></script>
		<script src="/bower_components/sass-bootstrap/js/transition.js"></script>
		<script src="/bower_components/scrollMonitor/scrollMonitor.js"></script>
		<script src="/bower_components/spin.js/spin.js"></script>
		<script src="/scripts/polyfills/raf.js"></script>
		<script src="/scripts/polyfills/date.now.js"></script>
		<script src="/scripts/utils/touch-events.js"></script>
		<script src="/scripts/utils/easing.js"></script>
		<script src="/owl-carousel/owl.carousel.customized.js"></script>
		<script src="/bower_components/component-loader/component-loader.js"></script>
		<!-- endbower -->
		<!-- endbuild -->

		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-48153723-1', 'elastica.net');
		  ga('send', 'pageview');
		</script>

		<!-- build:js /scripts/main.js -->
		<script src="/scripts/namespace.js"></script>
		<script src="/scripts/components/animate-on-scroll.js"></script>
		<script src="/scripts/components/video.js"></script>
		<script src="/scripts/components/image-lazy-loader.js"></script>
		<script src="/scripts/components/big-carousel.js"></script>
		<script src="/scripts/components/company-team.js"></script>
		<script src="/scripts/components/detect-hero.js"></script>
		<script src="/scripts/components/applications-hero.js"></script>
		<script src="/scripts/components/applications-threats.js"></script>
		<script src="/scripts/components/applications-forensics.js"></script>
		<script src="/scripts/components/platform-defence.js"></script>
		<script src="/scripts/components/global-presence.js"></script>
		<script src="/scripts/components/home-testimonials.js"></script>
		<script src="/scripts/components/threats-ai.js"></script>
		<script src="/scripts/menu.js"></script>
		<script src="/scripts/store.js"></script>
		<script src="/scripts/bootstrap.js"></script>
		<!-- endbuild -->

		<!-- Start of Async HubSpot Analytics Code -->
	    <script type="text/javascript">
	        (function(d,s,i,r) {
	            if (d.getElementById(i)){return;}
	            var n=d.createElement(s),e=d.getElementsByTagName(s)[0];
	            n.id=i;n.src='//js.hs-analytics.net/analytics/'+(Math.ceil(new Date()/r)*r)+'/349272.js';
	            e.parentNode.insertBefore(n, e);
	        })(document,"script","hs-analytics",300000);
	    </script>
		<!-- End of Async HubSpot Analytics Code -->

	</body>
	</html>
EOT;
}

// Used by the Elastica site include tags in Wordpress
function elastica_render_html_footer_wp() {

	echo <<<EOT

		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-48153723-1', 'elastica.net');
		  ga('send', 'pageview');
		</script>

		<!-- Start of Async HubSpot Analytics Code -->
	    <script type="text/javascript">
	        (function(d,s,i,r) {
	            if (d.getElementById(i)){return;}
	            var n=d.createElement(s),e=d.getElementsByTagName(s)[0];
	            n.id=i;n.src='//js.hs-analytics.net/analytics/'+(Math.ceil(new Date()/r)*r)+'/349272.js';
	            e.parentNode.insertBefore(n, e);
	        })(document,"script","hs-analytics",300000);
	    </script>
		<!-- End of Async HubSpot Analytics Code -->

	</body>
	</html>
EOT;
}

?>
