<?php include('../_elastica.inc.php'); ?>
<?php elastica_render_html_head('resources') ?>


	<?php elastica_render_header('Resources', '/resources'); ?>


		<section class="row section--first section--centered section--centered--full-width section--medium-grey resources-hero">
			<div class="col-md-12 section--centered__text">
				<h2>I&#8217;m a headline for the resources section</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat erat quis est laoreet rhoncus. In hac habitasse platea dictumst. Sed dignissim, enim sed mattis blandit, urna nibh vestibulum nisl, sed fermentum tortor augue sit amet nisi.</p>
				<div class="category-links">
					<a href="#" class="btn-medium">Overview</a>
					<a href="#" class="btn-medium btn-medium--outline">Data sheets</a>
					<a href="#" class="btn-medium btn-medium--outline">White papers</a>
					<a href="#" class="btn-medium btn-medium--outline">Reports</a>
				</div>
			</div>
		</section>

		<section class="section--white section--article resources-content">
			<div class="row">
				<div class="col-md-1 col-md-offset-2">
					<img src="/images/resources/resources-data-sheets-icon.png" alt="Data Sheets icon" width="90" height="90" />
				</div>
				<div class="col-md-3 section--article__text">
					<h3 name="section-1">Data Sheets</h3>
					<p>Lorem ipsum dolor sit amet Consectetur adipiscing elit. Nullam eleifend erat metus</p>
					<p><a href="#">See more</a></p>
				</div>
				<div class="col-md-1">
					<img src="/images/resources/resources-white-papers-icon.png" alt="White Papers icon" width="90" height="90" />
				</div>
				<div class="col-md-3 section--article__text">
					<h3 name="section-1">White Papers</h3>
					<p>Lorem ipsum dolor sit amet Consectetur adipiscing elit. Nullam eleifend erat metus</p>
					<p><a href="#">See more</a></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1 col-md-offset-2">
					<img src="/images/resources/resources-reports-icon.png" alt="Reports icon" width="90" height="90" />
				</div>
				<div class="col-md-3 section--article__text">
					<h3 name="section-1">Reports</h3>
					<p>Lorem ipsum dolor sit amet Consectetur adipiscing elit. Nullam eleifend erat metus</p>
					<p><a href="#">See more</a></p>
				</div>
				<div class="col-md-1">
					<img src="/images/resources/resources-videos-icon.png" alt="Videos icon" width="90" height="90" />
				</div>
				<div class="col-md-3 section--article__text">
					<h3 name="section-1">Videos</h3>
					<p>Lorem ipsum dolor sit amet Consectetur adipiscing elit. Nullam eleifend erat metus</p>
					<p><a href="#">See more</a></p>
				</div>
			</div>
		</section>


		<?php elastica_render_section_signup_wp(); ?>


	<?php elastica_render_footer(); ?>


<?php elastica_render_html_footer() ?>
