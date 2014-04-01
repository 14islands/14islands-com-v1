<?php include('_elastica.inc.php'); ?>
<?php elastica_render_html_head('home') ?>


	<?php elastica_render_header('Home'); ?>


			<section class="row section--first">
				<h1>section--first</h1>
				<p>Exact top margin where header ends.</p>
			</section>

			<section class="row section--centered">
				<div class="col-md-12 section--centered__text">
					<h2>section--centered</h1>
					<p>Centered text and image.</p>
				</div>
				<div class="col-md-12 section--centered__image">
					<img src="" alt="section--centered__image" style="width:100%;background:#fee;"/>
				</div>
			</section>

			<section class="row section--centered section--centered--full-width">
				<div class="col-md-12 section--centered__text">
					<h2>section--centered--full-width h1</h1>
					<p>Centered text and image full bleed.</p>
				</div>
				<div class="col-md-12 section--centered__image">
					<img src="" alt="section--centered__image" style="width:100%;background:#fee;"/>
				</div>
			</section>

			<section class="row section--alternate">
				<div class="col-md-7 section--alternate__image">
					<img src="" alt="section--alternate__image" style="width:100%;background:#fee;"/>
				</div>
				<div class="col-md-5 section--alternate__text">
					<h1>section--alternate</h1>
					<p>Alternate image alignment based on DOM order.</p>
				</div>
			</section>

			<section class="row section--alternate">
				<div class="col-md-7 section--alternate__image">
					<img src="" alt="section--alternate__image" style="width:100%;background:#fee;"/>
				</div>
				<div class="col-md-5 section--alternate__text">
					<h1>section--alternate</h1>
					<p>Alternate image alignment based on DOM order.</p>
				</div>
			</section>

			<section class="row section--alternate section--alternate--odd">
				<div class="col-md-7 section--alternate__image">
					<img src="" alt="section--alternate__image" style="width:100%;background:#fee;"/>
				</div>
				<div class="col-md-5 section--alternate__text">
					<h1>section--alternate--odd</h1>
					<p>Force image to right.</p>
				</div>
			</section>

			<section class="row section--alternate section--alternate--even">
				<div class="col-md-7 section--alternate__image">
					<img src="" alt="section--alternate__image" style="width:100%;background:#fee;"/>
				</div>
				<div class="col-md-5 section--alternate__text">
					<h1>section--alternate--even</h1>
					<p>Force image to left.</p>
				</div>
			</section>


			<section class="row">
				<h1>Heading 1</h1>
				<h2>Heading 2</h2>
				<h3>Heading 3</h3>
				<h4>Heading 4</h4>
				<h5>Heading 5</h5>
				<p>Paragraph</p>
				<span class="em--blue">em-blue</span>
				<span class="em--green">em-green</span>
				<a class="section__link" href="#">section__link</a>
			</section>

			<section class="row section--blue">
				<h2>section--blue</h2>
				<p>.feature-list</p>
				<ul class="feature-list">
					<li class="feature-list__icon feature-list__icon--single-glass">.feature-list__icon--single-glass</li>
					<li class="feature-list__icon feature-list__icon--customizable">.feature-list__icon--customizable</li>
					<li class="feature-list__icon feature-list__icon--insights">.feature-list__icon--insights</li>
				</ul>
				<h3>Button styles</h3>
				<p>
					<a href="#" class="btn-outline">.btn-outline</a>
					<a href="#" class="btn-outline btn-outline--inverted">.btn-outline--inverted</a>
				</p>
			</section>
			<section class="row section--dark">
				<h2>section--dark</h2>
				<p>.feature-list</p>
				<ul class="feature-list">
					<li class="feature-list__icon feature-list__icon--self-learning">.feature-list__icon--self-learning</li>
					<li class="feature-list__icon feature-list__icon--realtime">.feature-list__icon--realtime</li>
					<li class="feature-list__icon feature-list__icon--scalable">.feature-list__icon--scalable</li>
				</ul>
			</section>
			<section class="row section--darker">
				<h2>section--darker</h2>
				<p>Lorem ipsum</p>
				<p>
					<span class="em--white">em-blue--white</span>
					<span class="em--orange">em-blue--orange</span>
					<a class="section__link--white" href="#">section__link--white</a>
				</p>
			</section>
			<section class="row section--white">
				<h2>section--white</h2>
				<p>Lorem ipsum</p>
			</section>
			<section class="row section--light-grey">
				<h2>section--light-grey</h2>
				<p>Lorem ipsum</p>
			</section>
			<section class="row section--grey">
				<h2>section--grey</h2>
				<p>Lorem ipsum</p>
			</section>
			<section class="row section--light-gray-blue">
				<h2>section--light-gray-blue</h2>
				<p>Lorem ipsum</p>
			</section>
			<section class="row section--gray-blue">
				<h2>section--gray-blue</h2>
				<p>Lorem ipsum</p>
			</section>
			<section class="row section--light-orange">
				<h2>section--light-orange</h2>
				<p>Lorem ipsum</p>
			</section>
			<section class="row section--orange">
				<h2>section--orange</h2>
				<p>Lorem ipsum</p>
			</section>
			<section class="row section--green">
				<h2>section--green</h2>
				<p>Lorem ipsum</p>
			</section>

	<?php elastica_render_footer(); ?>


<?php elastica_render_html_footer() ?>

