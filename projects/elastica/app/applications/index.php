<?php include('../_elastica.inc.php'); ?>
<?php elastica_render_html_head('Elastica Apps', 'applications') ?>


	<?php elastica_render_header('Elastica Apps', '/applications'); ?>


		<section class="row section--first section--centered section--gray-blue apps-hero js-component-applications-hero">
			<div class="col-md-12 apps-hero__text">
				<h1>Elastica Apps</h1>
				<p>
				The modular design of the CloudSOC platform allows you to tailor your solution by adding one or more Elastica Apps as needed.
				</p>
				<div class="apps-hero__image">
					<nav class="apps-hero__list">
						<a href="#detect" class="apps-hero__detect-item">
							<div></div>
							<span>Audit</span>
						</a>
						<a href="#threats" class="apps-hero__threats-item">
							<div></div>
							<span>Detect</span>
						</a>
						<a href="#controls" class="apps-hero__controls-item">
							<div></div>
							<span>Protect</span>
						</a>
						<a href="#forensics" class="apps-hero__forensics-item">
							<div></div>
							<span>Investigate</span>
						</a>

					</nav>

					<!-- <img  src="/images/applications/apps-hero-large@1x.png" alt="Applications"/> -->
				</div>
			</div>
		</section>

		<section id="detect" class="row section--white section--alternate apps-detect">
			<div class="col-md-7 section--alternate__image">

				<div class="js-component-detect-hero component-detect-hero" data-animation-scroll-offset="200">
					<div class="component-detect-hero__back"></div>
					<div class="component-detect-hero__cover">
						<div class="component-detect-hero__cover__rel">
							<div class="component-detect-hero__cover__rel__content"></div>
						</div>
						<div class="component-detect-hero__slider"></div>
					</div>
				</div>

			</div>
			<div class="col-md-5 section--alternate__text">
				<span class="em--green">Audit</span>
				<h2>Take the covers off Shadow IT</h2>
				<p>Audit hundreds of cloud services already adopted by your employees, whether they are accessed from desktop computers in the office or mobile devices on the road. Evaluate which applications are business-ready for your company.</p>
				<a class="section__link" href="/detect">Learn more</a>
			</div>
		</section>

		<section id="threats" class="row section--alternate section--orange apps-threats">
			<div class="col-md-7 section--alternate__image">

				<div class="js-component-applications-threats apps-threats-animation">
					<div class="apps-threats-animation__ratio">
						<img src="/images/applications/apps-threats-animation-bg.png" width="450" height="500" />
						<canvas width="450" height="500">
							<img class="apps-threats-animation__ratio__mask" src="/images/applications/apps-threats-animation-mask.png" width="450" height="500" />
						</canvas>
						<div class="apps-threats-animation__ratio__flash"></div>
					</div>
				</div>

			</div>
			<div class="col-md-5 section--alternate__text">
				<span class="em--white">Detect</span>
				<h2>Zero in on threats in cloud services</h2>
				<p>Let our advanced machine learning and data science do the job for you to detect threatening activities and users in your cloud services. Zero-in on threats without sifting through billions of historical cloud service usage records.</p>
				<a class="section__link--white" href="/threats">Learn more</a>
			</div>
		</section>

		<section id="forensics" class="row section--white section--alternate apps-forensics">
			<div class="col-md-7 section--alternate__image">

				<div class="js-component-applications-forensics apps-forensics-animation">
					<div class="apps-forensics-animation__ratio">
						<img src="/images/applications/apps-forensics-animation-bg.png" width="650" height="310" />
						<canvas width="650" height="310">
							<img class="apps-forensics-animation__ratio__mask" src="/images/applications/apps-forensics-animation-mask.png" width="450" height="500" />
						</canvas>
					</div>
				</div>

			</div>
			<div class="col-md-5 section--alternate__text">
				<span class="em--blue">Investigate</span>
				<h2>Investigate Historical Transactions</h2>
				<p>Perform post-incident investigations and forensic analysis across all historical transactions for your cloud applications and services.  Perform deep dive analysis for legal, compliance or HR initiatives, ensuring cloud-based data is no longer outside the sphere of enterprise analysis.</p>
				<a class="section__link" href="/forensics">Learn more</a>
			</div>
		</section>

		<section id="controls" class="row section--alternate section--dark apps-controls">
			<div class="col-md-7 section--alternate__image">

				<div class="js-component-animate-on-scroll applications-controls-animation">
					<div class="applications-controls-animation__ratio">
						<div class="applications-controls-animation__ratio__slider"><span></span></div>
						<div class="applications-controls-animation__ratio__slider"><span></span></div>
						<div class="applications-controls-animation__ratio__slider"><span></span></div>
						<div class="applications-controls-animation__ratio__slider"><span></span></div>
						<div class="applications-controls-animation__ratio__slider"><span></span></div>
						<img src="/images/applications/apps-controls-animation-bg.png" alt="Controls"/>
					</div>
				</div>

			</div>
			<div class="col-md-5 section--alternate__text">
				<span class="em--orange">Protect</span>
				<h2>Unified Controls Across Cloud Services</h2>
				<p>Protect your cloud services by using intuitive global policies that eliminate the complexity of definition and enforcement by automatically translating policies across multiple cloud services at the same time.  Create and enforce policies for your cloud services that prevent attacks and ensure corporate governance.  </p>
				<a class="section__link" href="/controls">Learn more</a>
			</div>
		</section>

<!--
		<section class="row section--centered section--centered--full-width section--white apps-coming-soon">
			<div class="col-md-12 section--centered__text">
				<h2>More applications coming soon&nbsp;</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat erat quis est laoreet rhoncus. In hac habitasse platea dictumst. Sed dignissim, enim sed mattis blandit, urna nibh vestibulum nisl, sed fermentum tortor augue sit amet nisi. </p>
			</div>
			<div class="section--centered__image">
				<img src="/images/applications/apps-coming-soon-large@1x.png" alt="Applications"/>
			</div>
		</section>
-->

		<?php elastica_render_section_signup('/detect', 'Audit'); ?>


	<?php elastica_render_footer(); ?>


<?php elastica_render_html_footer() ?>

