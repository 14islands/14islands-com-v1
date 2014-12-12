<?php include('../_elastica.inc.php'); ?>
<?php elastica_render_html_head('customers') ?>


	<?php elastica_render_header('Customers', '/customers'); ?>


		<section class="row section--first section--centered section--centered--full-width section--pink customers-hero">
			<div class="col-md-12 section--centered__text">
				<h2>Customer Case Studies</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat erat quis est laoreet rhoncus. In hac habitasse platea dictumst. Sed dignissim, enim sed mattis blandit, urna nibh vestibulum nisl, sed fermentum tortor augue sit amet nisi.</p>
			</div>
		</section>

		<section class="row section--light-grey section--display customers-list">
			<div class="col-md-6">
				<div class="section--display__block">
					<img src="/images/customers/customers-target-large@1x.jpg" alt="Target" class="img-responsive" />
					<div class="section--display__content">
						<h3><strong>Target.</strong> I&#8217;m a tagline for the case study</h3>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="section--display__block">
					<img src="/images/customers/customers-boeing-large@1x.jpg" alt="Boeing" class="img-responsive" />
					<div class="section--display__content">
						<h3><strong>Boeing.</strong> I&#8217;m a tagline for the case study</h3>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="section--display__block">
					<img src="/images/customers/customers-ge-large@1x.jpg" alt="GE" class="img-responsive" />
					<div class="section--display__content">
						<h3><strong>GE.</strong> I&#8217;m a tagline for the case study</h3>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="section--display__block">
					<a href="apple/">
						<img src="/images/customers/customers-apple-large@1x.jpg" alt="Apple" class="img-responsive" />
					</a>
					<div class="section--display__content">
						<h3><strong>Apple.</strong> I&#8217;m a tagline for the case study</h3>
					</div>
				</div>
			</div>
		</section>


		<?php elastica_render_section_signup('/resources', 'Resources'); ?>


	<?php elastica_render_footer(); ?>


<?php elastica_render_html_footer() ?>
