<?php include('../_elastica.inc.php'); ?>
<?php elastica_render_html_head('Investigate', 'forensics') ?>


	<?php elastica_render_header('Investigate', '/forensics'); ?>


		<section class="row section--first section--alternate section--blue forensics-hero">
			<div class="col-md-7 section--alternate__image">

				<div class="js-component-applications-forensics apps-forensics-animation" data-animation-reset-when-above="true" data-animation-direction="rtl">
					<div class="apps-forensics-animation__ratio">
						<img src="/images/forensics/forensics-hero-animation-bg.png" width="650" height="310" />
						<canvas width="650" height="310">
							<img class="apps-forensics-animation__ratio__mask" src="/images/applications/apps-forensics-animation-mask.png" width="450" height="500" />
						</canvas>
					</div>
				</div>

			</div>
			<div class="col-md-5 section--alternate__text">
				<h1>Investigate Historical Transactions</h1>
				<p>
				Perform post-incident investigations and forensic analysis across all historical transactions for your cloud applications and services.  Perform deep dive analysis for legal, compliance or HR initiatives, ensuring cloud-based data is no longer outside the sphere of enterprise analysis.</p>
			</div>
		</section>

		<section class="row section--white section--alternate forensics-dots">
			<div class="col-md-7 section--alternate__image">

				<!--div class="js-component-animate-on-scroll fadein-from-top-animation">
					<div class="fadein-from-top-animation__ratio">
						<img src="/images/forensics/forensics-dots-large@1x.png" width="712" height="672" />
						<div class="fadein-from-top-animation__ratio__mask"></div>
					</div>
				</div-->
				<img src="/images/forensics/forensics-dots-large@1x.gif" width="354" height="405" />

			</div>
			<div class="col-md-5 section--alternate__text">
				<h2>Connect the Dots and Find Patterns</h2>
				<p>Ingest data from multiple sources, including real-time traffic analytics, API data from cloud services and data from other security technologies to provide a comprehensive picture of your cloud activity. Cross correlate this data to find relevant information and patterns to support your investigation.
</p>
			</div>
		</section>

        <!--
		<section class="row section--centered section--centered--full-width section--grey forensics-customize">
			<div class="col-md-12 section--centered__text">
				<h2>Powerful visualization, free-form search and extensive filtering criteria provide intuitive mechanisms to find what you are after. Customized “dashboard widgets” allow you to monitor key variables in real time while parsing data, providing a wealth of relevant information at your fingertips.</p>
			</div>
			<div class="col-md-12 section--centered__image">
				<img src="/images/forensics/forensics-customize-large@1x.png" alt="World map of global presence"/>
			</div>
		</section>
		-->

		<section class="row section--alternate forensics-legal section--grey">

			<div class="col-md-7 section--alternate__image">
				<div class="js-component-animate-on-scroll forensics-legal-animation">
					<div class="forensics-legal-animation__mask">
						<div class="forensics-legal-animation__mask__cover"></div>
					</div>
					<div class="forensics-legal-animation__mask">
						<div class="forensics-legal-animation__mask__cover"></div>
					</div>
					<div class="forensics-legal-animation__mask">
						<div class="forensics-legal-animation__mask__cover"></div>
					</div>
					<img src="/images/forensics/forensics-legal-large@1x.png" width="416" height="459"/>
				</div>

			</div>
			<div class="col-md-5 section--alternate__text">
				<h2>Legal Reviews and Discovery for Cloud Services</h2>
				<p>The Security Analyst can leverage Elastica Investigate app to initiate deep dives for legal, compliance or HR initiatives, ensuring cloud-based data is no longer outside the sphere of enterprise analysis. Leveraging Elastica’s cloud service and storage model, maintaining massive data sets is easy, providing you high performance and secure access while eliminating the complexity and overhead of traditional databases.</p>
			</div>

		</section>


		<?php elastica_render_section_signup('/platform', 'Platform'); ?>


	<?php elastica_render_footer(); ?>


<?php elastica_render_html_footer() ?>
