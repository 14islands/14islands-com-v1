<?php include('../_elastica.inc.php'); ?>
<?php elastica_render_html_head('contact') ?>


	<?php elastica_render_header('Contact', '/contact'); ?>


		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvSrR1lh5iNoRTfPlpkJcqWZe7cnXBZ_c&sensor=false"></script>
	    <script>
			function initialize() {
		      var styles = [
		        {
		          'stylers': [
		            { "saturation": -100 },
		            { "lightness": -5 },
		            { "invert_lightness": true }
		          ]
		        },{
		          'featureType': 'poi',
		          'stylers': [
		            { 'visibility': 'on' },
		            { 'lightness': -60 }
		          ]
		        },{
		        }
		      ];

		      var mapOptions = {
		        center: new google.maps.LatLng(37.321366,-121.948370),
		        zoom: 17,
		        scrollwheel: false,
		        disableDefaultUI: true,
		        draggable: false,
			    zoomControl: true,
			    zoomControlOptions: {
					style: google.maps.ZoomControlStyle.DEFAULT,
					position: google.maps.ControlPosition.RIGHT_CENTER
				},
		        styles: styles
		      };

		      var map = new google.maps.Map(document.getElementById('contact-hero-map'),
		          mapOptions);

		      var marker;
		      var image = '/images/contact/contact-pin@1x.png';
		      var myLatLng = new google.maps.LatLng(37.320966,-121.948370);

			  marker = new google.maps.Marker({
				map: map,
				icon: image,
				draggable: false,
				optimized: false,
				zIndex: 3,
				animation: google.maps.Animation.DROP,
				position: myLatLng
			  });
			  google.maps.event.addListener(marker, 'click', toggleBounce);
		    }

		    function toggleBounce() {
			  if (marker.getAnimation() != null) {
			    marker.setAnimation(null);
			  } else {
			    marker.setAnimation(google.maps.Animation.BOUNCE);
			  }
			}

		    google.maps.event.addDomListener(window, 'load', initialize);
	    </script>

		<section class="row section--darkest contact-hero">
			<div id="contact-hero-map"></div>
		</section>

		<section class="row section--centered section--darkest company-contact-us">
			<div class="col-md-12">
				<h2>Contact us</h2>
				<ul>
					<li class="company-contact-us__item-hq">
						<h3>Headquarters</h3>
						<span>355 Santana Row</span>
						<span>Ste 2020 </span>
						<span>San Jose, CA 95128</span>
						<a href="mailto:info@elastica.net">info@elastica.net</a>
					</li><li class="company-contact-us__item-press">
						<h3>Press</h3>
						<span>Amber Rowland</span>
						<span>Press and Analyst Relations</span>
						<a href="mailto:press@elastica.net">press@elastica.net</a>
					</li><li class="company-contact-us__item-sales">
						<h3>Sales</h3>
						<a href="mailto:sales@elastica.net">sales@elastica.net</a>
					</li><li class="company-contact-us__item-careers">
						<h3>Careers</h3>
						<a href="mailto:jobs@elastica.net">jobs@elastica.net</a>
					</li><li class="company-contact-us__item-careers">
						<h3>Support</h3>
						<a href="mailto:support@elastica.net">support@elastica.net</a>
					</li>
					<li class="company-contact-us__item-social">
						<h3>Social</h3>
						<a href="http://www.linkedin.com/company/elastica" target="new">LinkedIn</a>
						<a href="https://twitter.com/elasticainc" target="new">Twitter</a>
						<a href="https://www.facebook.com/ElasticaInc" target="new">Facebook</a>
					</li>
				</ul>
			</div>
		</section>


		<?php elastica_render_section_signup_wp(); ?>


	<?php elastica_render_footer(); ?>


<?php elastica_render_html_footer() ?>

