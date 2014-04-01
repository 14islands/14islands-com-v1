<?php include('_elastica.inc.php'); ?>
<?php elastica_render_html_head('home') ?>


	<?php elastica_render_header(''); ?>

		<section class="row section--first home-hero">
			<div class="col-md-12 home-hero__wrap">

				<div class="col-md-12 home-hero__wrap__text">
					<h1>Your Security Ops Center</h1>
					<p>for your Cloud Apps and Services</p>
					<a href="http://vimeo.com/86932498" data-video-id="86932498" title="Watch video with Tom Reilly" class="home-testimonials__item__link btn-medium">
						Explore CloudSOC&#0153;
					</a>
				</div>

				<div class="col-md-12 home-hero__wrap__image">
					<figure class="js-component-video" data-path="/videos/home/" data-videos="[&#34;home_ipad.mp4&#34;, &#34;home_ipad.webm&#34;]" data-poster-image="false" data-video-scroll-offset="">
						<noscript class="js-component-video__image" data-src="/images/home/home-ipad-large@1x.jpg">
							<img src="/images/home/home-ipad-large@1x.jpg" alt="Elastica iPad UI" />
						</noscript>
					</figure>
				</div>

			</div>
		</section>


		<section class="row home-learn-more home-viewport-bottom">
			<a href="#" class="home-learn-more__link">
				<span>Learn more</span>
				<span class="home-learn-more__link__arrow">
					<svg xmlns="http://www.w3.org/2000/svg" width="35.2" height="13.6"><polygon fill-rule="evenodd" clip-rule="evenodd" fill="#fff" points="35.2,1.6 34,0 17.6,11.6 1.2,0 0,1.6 17,13.6 17.6,12.8 18.2,13.6"/></svg>
				</span>
			</a>
		</section>


		<!-- FOLD ends here -->

		<div class="js-component-home-testimonials home-testimonials"><!-- reset alternating order for rest of page --></div>

		<section id="detect" class="row section--white section--alternate apps-detect">
			<div class="container">
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
			</div>
		</section>

		<section id="threats" class="row section--alternate section--orange apps-threats">
			<div class="container">
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
			</div>
		</section>

		<!--section class="row section--alternate section--white platform-controls">
			<div class="container">
				<div class="col-md-7 section--alternate__image">
					<div class="js-component-animate-on-scroll platform-controls-animation">
						<img class="js-component-image-lazy-loader" data-src="/images/platform/platform-controls-animation-bg.png">
						<div class="platform-controls-animation__slider platform-controls-animation__slider--yellow">
							<span></span>
						</div>
						<div class="platform-controls-animation__slider platform-controls-animation__slider--blue">
							<span></span>
						</div>
						<div class="platform-controls-animation__slider platform-controls-animation__slider--green">
							<span></span>
						</div>
					</div>
				</div>
				<div class="col-md-5 section--alternate__text">
					<h2>Policy enforcement</h2>
					<p>ThreatScore&#0153; assigned by Elastica’s data science engines can be used to enforce simplified and intuitive policies that span across multiple cloud applications at the same time.</p>
				</div>
			</div>
		</section-->

		<section class="row section--white section--alternate threats-identification">
			<div class="container">
				<div class="col-md-7 section--alternate__image">
					<div class="js-component-animate-on-scroll fadein-from-top-animation">
						<div class="fadein-from-top-animation__ratio">
							<img src="/images/threats/threats-identification-large@1x.png" width="348" height="448" />
							<div class="fadein-from-top-animation__ratio__mask"></div>
						</div>
					</div>
					<!--img src="/images/threats/threats-identification-large@1x.png" width="348" height="448" /-->
				</div>
				<div class="col-md-5 section--alternate__text">
					<h2>Identify Malicious Users</h2>
					<p>Data theft by malicious use of company accounts is an unfortunate reality that is often invisible with the use of cloud services from variety of devices. Leverage advanced behavior recognition algorithms to uncover these threats in real-time.</p>
				</div>
			</div>
		</section>

		<section id="controls" class="row section--alternate section--dark apps-controls">
			<div class="container">
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
			</div>
		</section>


		<section class="row section--alternate section--alternate--even section--white platform-defence">
			<div class="container">
				<div class="col-md-7 section--alternate__image">
					<div class="js-component-platform-defence platform-defence-animation" data-animation-scroll-offset="150">
						<div class="platform-defence-animation__ratio">
							<img src="/images/platform/platform-defence-animation-bg.png" width="605" height="433" />
							<canvas width="605" height="433"></canvas>
						</div>
					</div>
				</div>
				<div class="col-md-5 section--alternate__text">
					<h2>Leverage Multiple Information Flows</h2>
					<p>Multiple information flows, including real-time cloud service traffic, are correlated to give maximum visibility into your cloud service usage. The CloudSOC&#0153; solution intelligently infers granular user activity using it’s StreamIQ&#0153; technology.  It combines data from cloud services, mobile devices and firewalls to provide unique insights.</p>
				</div>
			</div>
		</section>

		<section class="row section--alternate section--alternate--odd section--grey platform-apps">
			<div class="container">
				<div class="col-md-7 section--alternate__image">
					<div class="js-component-animate-on-scroll platform-apps-animation">
						<img class="js-component-image-lazy-loader platform-apps-animation__app" data-src="/images/platform/platform-apps-animation-discovery.png"/>
						<img class="js-component-image-lazy-loader platform-apps-animation__app" data-src="/images/platform/platform-apps-animation-forensics.png"/>
						<img class="js-component-image-lazy-loader platform-apps-animation__app" data-src="/images/platform/platform-apps-animation-controls.png" />
						<img class="js-component-image-lazy-loader platform-apps-animation__app" data-src="/images/platform/platform-apps-animation-office.png"/>
						<img class="js-component-image-lazy-loader platform-apps-animation__app" data-src="/images/platform/platform-apps-animation-gdrive.png"/>
						<img class="js-component-image-lazy-loader platform-apps-animation__app" data-src="/images/platform/platform-apps-animation-salesforce.png"/>
					</div>
				</div>
				<div class="col-md-5 section--alternate__text">
					<h2>Extensible on demand</h2>
					<p>Add powerful Elastica Apps based on your monitoring, security, intelligence and compliance needs. Add Elastica Securlets&#0153; to monitor and secure specific cloud services used by your employees - all with the click of a button in the Elastica Store.</p>
				</div>
			</div>
		</section>

		<section class="row section--alternate section--alternate--even section--white platform-collaboration">
			<div class="container">
				<div class="col-md-7 section--alternate__image">
					<figure class="js-component-video" data-lazy-load="true" data-path="/videos/platform/" data-videos="[&#34;iphone_white.mp4&#34;, &#34;iphone_white.webm&#34;]" data-video-scroll-offset="-200" data-poster-image="false">
						<noscript class="js-component-video__image" data-src="/images/platform/platform-collaboration-large@1x.jpg">
							<img src="/images/platform/platform-collaboration-large@1x.png" alt="Elastica iPhone UI"/>
						</noscript>
					</figure>
				</div>
				<div class="col-md-5 section--alternate__text">
					<h2>Power of Collaboration</h2>
					<p>Built in real time communication capabilities allow you to add comments and resolve alerts, threats and attacks. Automatically capture tribal knowledge around threats, alerts and attacks in one place.</p>
				</div>
			</div>
		</section>

		<section class="row section--alternate section--alternate--odd section--dark platform-security">
			<div class="container">
				<div class="col-md-7 section--alternate__image">
					<div class="js-component-animate-on-scroll platform-security-animation">
						<div class="platform-security-animation__ratio">
								<div class="platform-security-animation__rotator">
									<span class="platform-security-animation__satellite">
										<div class="platform-security-animation__satellite__leg"></div>
										<div class="platform-security-animation__satellite__core"></div>
									</span>
									<span class="platform-security-animation__satellite">
										<div class="platform-security-animation__satellite__leg"></div>
										<div class="platform-security-animation__satellite__core"></div>
									</span>
									<span class="platform-security-animation__satellite">
										<div class="platform-security-animation__satellite__leg"></div>
										<div class="platform-security-animation__satellite__core"></div>
									</span>
									<span class="platform-security-animation__satellite">
										<div class="platform-security-animation__satellite__leg"></div>
										<div class="platform-security-animation__satellite__core"></div>
									</span>
									<span class="platform-security-animation__satellite">
										<div class="platform-security-animation__satellite__leg"></div>
										<div class="platform-security-animation__satellite__core"></div>
									</span>
									<div class="platform-security-animation__rotator__core"></div>
								</div>
						</div>
					</div>
				</div>
				<div class="col-md-5 section--alternate__text">
					<h2>Data Science Powered Cloud Security</h2>
					<p>Advanced machine learning and data science techniques are applied to get deep insights about user activity with cloud services. An automated ThreatScore&#0153; is assigned based on usage patterns that can be used to trigger intelligent security actions.</p>
					<ul class="feature-list">
						<li class="feature-list__icon feature-list__icon--self-learning">Self Learning</li>
						<li class="feature-list__icon feature-list__icon--realtime">Real Time</li>
						<li class="feature-list__icon feature-list__icon--scalable">Highly Scalable</li>
					</ul>
				</div>
			</div>
		</section>



		<section class="row section--first section--alternate section--light-orange controls-hero">
			<div class="container">
				<div class="col-md-7 section--alternate__image">
					<div class="js-component-animate-on-scroll controls-hero-animation" data-animation-reset-when-above="true">
						<div class="controls-hero-animation__ratio">
							<div class="controls-hero-animation__ratio__node">
								<div class="controls-hero-animation__ratio__node">
									<div class="controls-hero-animation__ratio__node">
										<div class="controls-hero-animation__ratio__node">
											<div class="controls-hero-animation__ratio__node__leg"></div>
										</div>
										<div class="controls-hero-animation__ratio__node">
											<div class="controls-hero-animation__ratio__node__leg"></div>
										</div>
										<div class="controls-hero-animation__ratio__node__leg"></div>
									</div>
									<div class="controls-hero-animation__ratio__node">
										<div class="controls-hero-animation__ratio__node__leg"></div>
									</div>
									<div class="controls-hero-animation__ratio__node__leg"></div>
								</div>
								<div class="controls-hero-animation__ratio__node">
									<div class="controls-hero-animation__ratio__node">
										<div class="controls-hero-animation__ratio__node">
											<div class="controls-hero-animation__ratio__node__leg"></div>
										</div>
										<div class="controls-hero-animation__ratio__node">
											<div class="controls-hero-animation__ratio__node__leg"></div>
										</div>
										<div class="controls-hero-animation__ratio__node__leg"></div>
									</div>
									<div class="controls-hero-animation__ratio__node__leg">
										<div class="controls-hero-animation__ratio__node__leg"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5 section--alternate__text">
					<h2>Unified controls across cloud services</h2>
					<p>Protect your cloud services by using intuitive global policies that eliminate the complexity of definition and enforcement by automatically translating policies across multiple cloud services at the same time.  Create and enforce policies for your cloud services that prevent attacks and ensure corporate governance.</p>
				</div>
			</div>
		</section>

		<section class="row section--white section--alternate controls-ip">
			<div class="container">
				<div class="col-md-7 section--alternate__image">
					<div class="js-component-animate-on-scroll controls-ip-animation">
						<div class="controls-ip-animation__ratio">
							<div class="controls-ip-animation__ratio__label">Financial Info</div>
							<div class="controls-ip-animation__ratio__label">Designs</div>
							<div class="controls-ip-animation__ratio__label">Software</div>
							<div class="controls-ip-animation__ratio__label">Business Plans</div>
							<div class="controls-ip-animation__ratio__label">Customer Info</div>
							<div class="controls-ip-animation__ratio__label">Competitive Info</div>
							<div class="controls-ip-animation__ratio__label">Strategy Plans</div>
							<div class="controls-ip-animation__ratio__label">Company Risks</div>
						</div>
					</div>
				</div>
				<div class="col-md-5 section--alternate__text">
					<h2>Prevent Data Loss</h2>
					<p>Information is the prime asset of a company in this information age.  Leverage intelligent controls to prevent data loss when using cloud services. Rather than coarse policies that frustrate users, build very tailored policies that enable broad use of applications in a responsible way.</p>
				</div>
			</div>
		</section>



		<section class="row section--centered section--centered--full-width section--light-gray-blue controls-data-loss">
			<div class="container">
				<div class="col-md-12 section--centered__text">
					<h2>Take Care of Personally Identifiable Info</h2>
					<p>Scan your cloud activity to identify important types of data, such as Personally Identifiable Information. Build intelligent policies and controls based on this knowledge, to ensure special precautions are taken with these unique types of data.</p>
				</div>
				<div class="section--centered__image">
					<div class="js-component-animate-on-scroll controls-data-loss-animation">
						<div class="controls-data-loss-animation__container">
							<img class="controls-data-loss-animation__container__card" src="/images/controls/controls-data-loss-animation-card1.png" alt="Social Security card" />
							<img class="controls-data-loss-animation__container__card" src="/images/controls/controls-data-loss-animation-card2.png" alt="Credit card" />
							<img class="controls-data-loss-animation__container__card" src="/images/controls/controls-data-loss-animation-card3.png" alt="Drivers Licence" />
						</div>
					</div>
				</div>
			</div>
		</section>



		<section class="row section--dark section--alternate controls-fast" style="position:relative">
			<div class="container">
				<div class="col-md-7 section--alternate__image">
					<div class="js-component-animate-on-scroll controls-fast-animation">
						<div class="controls-fast-animation__ratio">
							<img src="/images/controls/controls-fast-animation-bg.png" width="575" height="336" alt="Speed-o-meter image"/>
							<div class="controls-fast-animation__ratio__needle">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 289.2 13.6" enable-background="new 0 0 289.2 13.6" xml:space="preserve">
									<path fill-rule="evenodd" clip-rule="evenodd" fill="#F4772C" d="M6.5,3l282.8-3L0,13.6L6.5,3z"/>
								</svg>
							</div>
							<div class="controls-fast-animation__ratio__rotator"></div>
						</div>
					</div>
				</div>
				<div class="col-md-5 section--alternate__text">
					<h2>Real Time Enforcement </h2>
					<p>Real-time detection is coupled with real-time enforcement. So instead of learning about attacks after the fact - you can prevent them before they occur.</p>
				</div>
			</div>
		</section>


		<section class="row section--first section--alternate section--alternate--odd section--green detect-hero">
			<div class="detect-hero__bg-left section--green"></div>
			<div class="container section--green">
				<div class="col-md-7 section--alternate__image">
					<div class="js-component-detect-hero component-detect-hero">
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
					<h1>Take the covers off Shadow IT</h1>
					<p>Audit hundreds of cloud services already adopted by your employees, whether they are accessed from desktop computers in the office or mobile devices on the road. Evaluate which applications are business-ready for your company.</p>
				</div>
			</div>
		</section>


		<section class="row section--white section--alternate detect-risks">
			<div class="container">
				<div class="col-md-7 section--alternate__image">
					<div class="js-component-animate-on-scroll detect-risks-animation" data-animation-scroll-offset="150">
						<div class="detect-risks-animation__ratio">
							<img src="/images/detect/detect-risks-animation-bg.png" width="514" height ="420"/>
							<div class="detect-risks-animation__ratio__core">
								<span class="detect-risks-animation__ratio__core__line">
									<span class="spider-graph__fill"></span>
								</span>
								<span class="detect-risks-animation__ratio__core__line">
									<span class="spider-graph__fill"></span>
								</span>
								<span class="detect-risks-animation__ratio__core__line">
									<span class="spider-graph__fill"></span>
								</span>
								<span class="detect-risks-animation__ratio__core__line">
									<span class="spider-graph__fill"></span>
								</span>
								<span class="detect-risks-animation__ratio__core__line">
									<span class="spider-graph__fill"></span>
								</span>
								<span class="detect-risks-animation__ratio__core__line">
									<span class="spider-graph__fill"></span>
								</span>
								<span class="detect-risks-animation__ratio__core__line">
									<span class="spider-graph__fill"></span>
								</span>
								<span class="detect-risks-animation__ratio__core__cap">
									<span class="spider-graph__fill"></span>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5 section--alternate__text">
					<h2>Determine Business Readiness of Apps</h2>
					<p>
					Elastica’s algorithms automatically assign a Business Readiness Rating&#0153; to the cloud services that are discovered based on a comprehensive set of criteria. These ratings can be tailored to suit your requirements, by customizing the importance of any of the criteria.
					</p>
				</div>
			</div>
		</section>

		<section class="row section--centered section--centered--full-width section--light-grey detect-visualization">
			<div class="container">
				<div class="col-md-12 section--centered__text">
					<h2>Instant Insights with Advanced Visualization</h2>
					<p>Advanced visualization allows you to instantly pivot on multiple parameters to view data from various perspectives. These views can be further refined with granular filters, enabling you
	quickly gain deep insights into your cloud app usage and take action.</p>
				</div>
				<div class="col-md-12 section--centered__image">
					<figure class="js-component-video" data-lazy-load="true" data-path="/videos/audit/" data-videos="[&#34;graph_white.mp4&#34;, &#34;graph_white.webm&#34;]" data-video-scroll-offset="-200" data-poster-image="false">
						<noscript class="js-component-video__image" data-src="/images/detect/detect-visualization-large@1x.png">
							<img src="/images/platform/platform-collaboration-large@1x.png" alt="Elastica iPhone UI"/>
						</noscript>
					</figure>
				</div>
			</div>
		</section>

		<section class="row section--darker section--alternate section--alternate--odd detect-comparison">
			<div class="container">
				<div class="col-md-7 section--alternate__image">
					<div class="js-component-animate-on-scroll detect-comparison-animation">
						<div class="detect-comparison-animation__core">
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__cap">
								<span class="spider-graph__fill"></span>
							</span>
						</div>
						<div class="detect-comparison-animation__core">
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__cap">
								<span class="spider-graph__fill"></span>
							</span>
						</div>
						<div class="detect-comparison-animation__core">
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__line">
								<span class="spider-graph__fill"></span>
							</span>
							<span class="detect-comparison-animation__core__cap">
								<span class="spider-graph__fill"></span>
							</span>
						</div>
						<div class="detect-comparison-animation__vs"></div>
						<div class="detect-comparison-animation__vs"></div>
						<img src="/images/detect/detect-comparison-animation-bg.png" width="728" height ="248"/>
					</div>
				</div>
				<div class="col-md-5 section--alternate__text">
					<h2>Compare and Choose</h2>
					<p>Elastica allows you to easily compare and contrast existing cloud apps side-by-side with similar apps, enabling you to narrow in on which may be best suited for general adoption. This comparison is supported by an extensive database containing a detailed analysis of thousands of cloud services. </p>
				</div>
			</div>
		</section>


		<section class="row section--first section--alternate section--blue forensics-hero">
			<div class="container">
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
			</div>
		</section>

		<section class="row section--white section--alternate threats-malware">
			<div class="container">
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
			</div>
		</section>

		<section class="row section--centered section--dark threats-ai">
			<div class="container">
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
			</div>
		</section>




	</article>

	<!-- Videos are embedded here -->
	<div id="home-testimonials-lightbox">
		<div class="home-testimonials-lightbox__close">
			<svg xmlns="http://www.w3.org/2000/svg" width="52.7" height="52.7"><polygon fill-rule="evenodd" clip-rule="evenodd" fill="#EDEEEE" points="52.7,0.7 52,0 26.4,25.6 0.7,0 0,0.7 25.6,26.4 0,52 0.7,52.7 26.4,27.1 52,52.7 52.7,52 27.1,26.4"/></svg>
		</div>
		<div class="home-testimonials-lightbox__video-wrapper">
		</div>
	</div>


	<?php elastica_render_modal_menu(); ?>

<?php elastica_render_html_footer() ?>

