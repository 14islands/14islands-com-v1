<?php include('../_elastica.inc.php'); ?>
<?php elastica_render_html_head('Detect', 'threats') ?>


	<?php elastica_render_header('Detect', '/threats'); ?>


		<section class="row section--first section--alternate section--orange threats-hero">
			<div class="col-md-7 section--alternate__image">

				<div class="js-component-applications-threats apps-threats-animation" data-animation-reset-when-above="true">
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
				<h1>Zero-In on Threats in Cloud Services</h1>
				<p>Let our advanced machine learning and data science do the job for you to detect threatening activities and users in your cloud services. Zero-in on threats without sifting through billions of historical cloud service usage records.</p>
			</div>
		</section>

		<section class="row section--white section--alternate threats-malware">
			<div class="col-md-7 section--alternate__image">

				<div class="js-component-animate-on-scroll threats-malware-animation" data-animation-scroll-offset="150">
					<div class="threats-malware-animation__ratio">
						<div class="threats-malware-animation__ratio__cloud"></div>
						<div class="threats-malware-animation__ratio__cloud"></div>
						<div class="threats-malware-animation__ratio__cloud"></div>
						<div class="threats-malware-animation__ratio__circle"></div>
						<img class="threats-malware-animation__ratio__fg" src="/images/threats/threats-malware-animation-fg.png" alt="Malware" />
					</div>
				</div>

			</div>
			<div class="col-md-5 section--alternate__text">
				<h2>Defeat Malware targeting cloud services</h2>
				<p>As your enterprise data moves to cloud services, malware is being built to attack those same services. Identify specialized malware threats to your cloud data in real-time, including Zeus-like malware, watering hole attacks or other sophisticated threats exposed by the use of cloud services.</p>
			</div>
		</section>

		<section class="row section--centered section--dark threats-ai">
			<div class="col-md-12 section--centered__text">
				<h2>Tap Data Science To Automatically Detect Risks </h2>
				<p>Elastica’s advanced data science algorithms assigns a ThreatScore&#0153; to highlight the risk level of all account activities on any cloud service. By immediately identifying suspicious behavior, these scores enable you to define simpler and smarter policies and controls to protect your data in the cloud.
				</p>
			</div>
			<div class="col-md-12 section--centered__image">

				<div class="js-component-threats-ai threats-ai-animation" data-line-color="#383a3d" data-background-color="#1F2228">
					<div class="threats-ai-animation__ratio">
						<canvas width="914" height="554"></canvas>
						<div class="threats-ai-animation__ratio__tower">
							<div class="threats-ai-animation__ratio__tower__cell"></div>
							<div class="threats-ai-animation__ratio__tower__cell"></div>
							<div class="threats-ai-animation__ratio__tower__cell"></div>
							<div class="threats-ai-animation__ratio__tower__cell"></div>
							<div class="threats-ai-animation__ratio__tower__check">
								<div class="threats-ai-animation__ratio__tower__check__mark">
									<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26.1px" height="20.3px" viewBox="0 0 26.1 20.3"><path fill-rule="evenodd" clip-rule="evenodd" fill="#fff" d="M26.1 0c-7.6 3.7-16.2 20.3-16.2 20.3l-9.9-9.3 3.8-4 5.4 5.3c.1 0 5.2-9 16.9-12.3z"/></svg>
								</div>
								<div class="threats-ai-animation__ratio__tower__check__mask"></div>
								<div class="threats-ai-animation__ratio__tower__check__ring"></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>

		<section class="row section--white section--alternate threats-identification">
			<div class="col-md-7 section--alternate__image">

				<!--div class="js-component-animate-on-scroll fadein-from-top-animation">
					<div class="fadein-from-top-animation__ratio">
						<img src="/images/threats/threats-identification-large@1x.png" width="348" height="448" />
						<div class="fadein-from-top-animation__ratio__mask"></div>
					</div>
				</div-->
				<img src="/images/threats/threats-identification-large@1x.png" width="348" height="448" />

			</div>
			<div class="col-md-5 section--alternate__text">
				<h2>Identify Malicious Users</h2>
				<p>Data theft by malicious use of company accounts is an unfortunate reality that is often invisible with the use of cloud services from variety of devices. Leverage advanced behavior recognition algorithms to uncover these threats in real-time.</p>
			</div>
		</section>


		<?php elastica_render_section_signup('/controls', 'Protect'); ?>


	<?php elastica_render_footer(); ?>


<?php elastica_render_html_footer() ?>
