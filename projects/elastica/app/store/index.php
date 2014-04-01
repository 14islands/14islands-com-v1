<?php include('../_elastica.inc.php'); ?>
<?php elastica_render_html_head('store') ?>


	<?php elastica_render_header('Store', '/store'); ?>


		<section class="row section--first section--grey store-hero">

			<div class="store-controls">
				<form class="form-search" role="form">
					 <div class="form-group">
						<label for="search" class="sr-only">Search</label>
						<input type="search" class="form-control" id="search" placeholder="Search">
						<button class="btn btn-search"><span class="glyphicon glyphicon-search"></span></button>
					</div>
				</form>
				<div class="store-tools">
					<div class="btn-group">
						<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
							Category <span class="btn-desc">(Overview)</span> <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Category</a></li>
							<li><a href="#">Category</a></li>
							<li><a href="#">Category</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-12 section--centered__image ">
				<div class="js-component-big-carousel big-carousel">
					<div class="owl-carousel">
						<figure class="big-carousel__item">
							<a href="#" store-overlay-toggle>
								<img src="/images/store/featured/featured-uber.png" alt="App name">
							</a>
						</figure>
						<figure class="big-carousel__item">
							<a href="#" store-overlay-toggle>
								<img src="/images/store/featured/featured-uber.png" alt="App name">
							</a>
						</figure>
						<figure class="big-carousel__item">
							<a href="#" store-overlay-toggle>
								<img src="/images/store/featured/featured-uber.png" alt="App name">
							</a>
						</figure>
						<figure class="big-carousel__item">
							<a href="#" store-overlay-toggle>
								<img src="/images/store/featured/featured-uber.png" alt="App name">
							</a>
						</figure>
						<figure class="big-carousel__item">
							<a href="#" store-overlay-toggle>
								<img src="/images/store/featured/featured-uber.png" alt="App name">
							</a>
						</figure>
					</div>
				</div>
			</div>

		</section>

		<section class="row section--light-grey store-section">
			<div class="marketplace-category">
				<div class="marketplace-category-header">
					<h2>Elastica Apps</h2>
					<a href="#">See all</a>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="tile">
							<div class="tile-image">
								<img src="/images/store/elastica/discovery.png" alt="Discovery App" class="img-responsive">
							</div>
							<div class="tile-title">
								<h3>Discovery <span>6</span></h3>
							</div>
							<div class="tile-desc">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel tellus eget. felis tempor fringilla in et nisi. Cras rhoncus ut quam eget consectetur. Sed blandit hendrerit est non mollis</p>
							</div>
							<div class="tile-buttons">
								<button type="button" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus pull-right"></span> Free</button>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="tile">
							<div class="tile-image">
								<img src="/images/store/elastica/forensics.png" alt="Forensics App" class="img-responsive">
								<span class="app-added">Added</span>
							</div>
							<div class="tile-title">
								<h3>Forensics <span>5</span></h3>
							</div>
							<div class="tile-desc">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel tellus eget. felis tempor fringilla in et nisi. Cras rhoncus ut quam eget consectetur. Sed blandit hendrerit est non mollis</p>
							</div>
							<div class="tile-buttons">
								<button type="button" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus pull-right"></span> Free</button>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="tile">
							<div class="tile-image">
								<img src="/images/store/elastica/policies.png" alt="Policies App" class="img-responsive">
							</div>
							<div class="tile-title">
								<h3>Policies <span>5</span></h3>
							</div>
							<div class="tile-desc">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel tellus eget. felis tempor fringilla in et nisi. Cras rhoncus ut quam eget consectetur. Sed blandit hendrerit est non mollis</p>
							</div>
							<div class="tile-buttons">
								<button type="button" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus pull-right"></span> Free</button>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="tile">
							<div class="tile-image">
								<img src="/images/store/elastica/threats.png" alt="Threats App" class="img-responsive">
							</div>
							<div class="tile-title">
								<h3>Threats <span>5</span></h3>
							</div>
							<div class="tile-desc">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel tellus eget. felis tempor fringilla in et nisi. Cras rhoncus ut quam eget consectetur. Sed blandit hendrerit est non mollis</p>
							</div>
							<div class="tile-buttons">
								<button type="button" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus pull-right"></span> Free</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="row section--light-grey store-section">
			<div class="marketplace-category">
				<div class="marketplace-category-header">
					<h2>File Sharing</h2>
					<a href="#">See all</a>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="tile">
							<div class="tile-image">
								<img src="/images/store/file-sharing/dropbox.png" alt="Dropbox App" class="img-responsive">
							</div>
							<div class="tile-title">
								<h3>Dropbox <span>6</span></h3>
							</div>
							<div class="tile-desc">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel tellus eget. felis tempor fringilla in et nisi. Cras rhoncus ut quam eget consectetur. Sed blandit hendrerit est non mollis</p>
							</div>
							<div class="tile-buttons">
								<button type="button" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus pull-right"></span> Free</button>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="tile">
							<div class="tile-image">
								<img src="/images/store/file-sharing/box.png" alt="Box App" class="img-responsive">
							</div>
							<div class="tile-title">
								<h3>Box <span>5</span></h3>
							</div>
							<div class="tile-desc">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel tellus eget. felis tempor fringilla in et nisi. Cras rhoncus ut quam eget consectetur. Sed blandit hendrerit est non mollis</p>
							</div>
							<div class="tile-buttons">
								<button type="button" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus pull-right"></span> Free</button>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="tile">
							<div class="tile-image">
								<img src="/images/store/file-sharing/google-drive.png" alt="Google Drive App" class="img-responsive">
							</div>
							<div class="tile-title">
								<h3>Google Drive <span>5</span></h3>
							</div>
							<div class="tile-desc">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel tellus eget. felis tempor fringilla in et nisi. Cras rhoncus ut quam eget consectetur. Sed blandit hendrerit est non mollis</p>
							</div>
							<div class="tile-buttons">
								<button type="button" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus pull-right"></span> Free</button>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="tile">
							<div class="tile-image">
								<img src="/images/store/file-sharing/mozy.png" alt="Mozy App" class="img-responsive">
							</div>
							<div class="tile-title">
								<h3>Mozy <span>5</span></h3>
							</div>
							<div class="tile-desc">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel tellus eget. felis tempor fringilla in et nisi. Cras rhoncus ut quam eget consectetur. Sed blandit hendrerit est non mollis</p>
							</div>
							<div class="tile-buttons">
								<button type="button" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus pull-right"></span> Free</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="row section--light-grey store-section">
			<div class="marketplace-category">
				<div class="marketplace-category-header">
					<h2>Category Name</h2>
					<a href="#">See all</a>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="tile">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="tile">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="tile">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="tile">
						</div>
					</div>
				</div>
			</div>
		</section>


		<!-- Store Modal -->
		<div class="store-modal" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="store-modal-content">
				<h1>For registered users only</h1>
				<p>You need to be a registered Elastica user to access this section of the store</p>
				<a href="#" class="btn-medium btn-medium--outline">Sign up</a>
				<a href="#" class="btn-medium btn-medium--outline">Log in</a>
			</div>
			<a class="store-modal--close" href="#" store-overlay-toggle>
				<span>&nbsp;</span>
			</a>
		</div><!-- /.modal -->


		<?php elastica_render_section_signup_wp(); ?>


	<?php elastica_render_footer(); ?>


<?php elastica_render_html_footer() ?>
