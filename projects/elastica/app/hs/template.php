<?php include('../_elastica.inc.php'); ?>
<?php elastica_render_html_head('hs') ?>


	<?php elastica_render_header('Hubspot', '/hs'); ?>


		<section class="row section--first section--centered section--centered--full-width section--blue basic-hero">
			<div class="col-md-12 section--centered__text">
				<h2>This is a Hubspot headline</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat erat quis est laoreet rhoncus. In hac habitasse platea dictumst. Sed dignissim, enim sed mattis blandit, urna nibh vestibulum nisl, sed fermentum tortor augue sit amet nisi.</p>
			</div>
		</section>

		<section class="section--white section--article">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 section--article__text">

					<h3 name="section-1">1. I’m a section headline</h3>
					<p>Urna varius gravida sed sagittis lectus. Fusce pellentesque quam et dui venenatis, vel pellentesque leo gravida.Vestibulum quis tortor cursus, molestie ligula quis, mollis nibh. Donec enim lectus, dignissim ac pulvinar sit amet, ultrices sed libero. Aenean fringilla justo sit amet mi elementum commodo. Morbi mattis eros ligula, vel malesuada ligula feugiat ac. Donec sem arcu, malesuada nec orci ac, scelerisque varius neque. Suspendisse eleifend, arcu et viverra dignissim, orci arcu porta turpis, et faucibus lectus nunc eu velit.</p>
					<ul>
						<li>
							<h4>1.1 I’m a sub section headline</h4>
							<p>Urna varius gravida sed sagittis lectus. Fusce pellentesque quam et dui venenatis, vel pellentesque leo gravida.Vestibulum quis tortor cursus, molestie ligula quis, mollis nibh.</p>
						</li>
						<li>
							<h4>1.2 I’m a sub section headline</h4>
							<p>Urna varius gravida sed sagittis lectus. Fusce pellentesque quam et dui venenatis, vel pellentesque leo gravida.Vestibulum quis tortor cursus, molestie ligula quis, mollis nibh.</p>
						</li>
					</ul>

					<h3 name="section-2">2. I’m a section headline</h3>
					<p>Urna varius gravida sed sagittis lectus. Fusce pellentesque quam et dui venenatis, vel pellentesque leo gravida.Vestibulum quis tortor cursus, molestie ligula quis, mollis nibh. Donec enim lectus, dignissim ac pulvinar sit amet, ultrices sed libero. Aenean fringilla justo sit amet mi elementum commodo. Morbi mattis eros ligula, vel malesuada ligula feugiat ac. Donec sem arcu, malesuada nec orci ac, scelerisque varius neque. Suspendisse eleifend, arcu et viverra dignissim, orci arcu porta turpis, et faucibus lectus nunc eu velit.</p>

				</div>
			</div>
		</section>


		<?php elastica_render_section_signup('/hs', 'Hubspot'); ?>


	<?php elastica_render_footer(); ?>


<?php elastica_render_html_footer() ?>
