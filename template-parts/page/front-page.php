<?php
/**
 * Template part for displaying Front page content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hitandrun
 * @since  1.0.0 [<init>]
 */

?>
<div class="row row-for-content">
	<div class="col-sm col-md-10 col-xl-8 content-area content-area-1 active">
		<div class="content-module">
			<h3 class="mission-title">Our Mission</h3>
			<p>
				Hit &amp; Run Batting Cages encourages athletes development by providing opportunities for personal
				and athletic growth. Hit &amp; Run promotes sportsmanship, self-esteem, and the development of life
				skills through engaging clients in Baseball/Softball while providing a safe, healthy, positive environment
				where the athletes of our community can learn the fundamentals of the game. Our objective is to off
				you the athlete the very best in Baseball/Softball Training in our area.
			</p>
			<h3 class="we-offer-title">What We Offer</h3>
			<p>
				Seven Cages, with 2 Iron Mike Automatic Baseball machines. Speeds from 35-80+ Miles per hour. Atec
				self feeding baseball machine, 20-60 MPH. 5 Jug Softball Machines, 20-60 MPH and 1 super Jug Machine
				that pitches up to 70MPH. We also have a Tee Station cage, with 2 soft toss areas as well as a Bullpen
				for 60.6 feet and less.
			</p>
		</div> <!-- .content-module -->
	</div> <!-- .col-offset-md-2 -->
	<div class="col-sm col-md-10 content-area content-area-2">
		<div class="content-module">
			<a href="#" class="hit-trax-info">
				<img src="/wp-content/uploads/2018/02/HitTrax-Logo-TM_large-1.png" alt="hittrax logo" class="img-fluid" />
			</a>
			<a href="#" class="hit-trax-booking-btn d-none d-md-inline-block wonka-btn">
					Book a Hitting Session with Our Advanced Batting Technology!</a>
				<a href="#" class="hit-trax-booking-btn d-inline-block d-md-none wonka-btn">
					Book with what the Pros Use!</a>
			</div> <!-- .content-module -->
		</div> <!-- .col-offset-1 -->
		<div class="col-sm col-md-12 content-area content-area-3">
			<div class="content-module">
				<div class="row row-1">
					<div class="col">
					</div> <!-- .col -->
				</div> <!-- .row-1 -->
				<div class="row row-2">
					<div class="col">
					</div> <!-- .col -->
				</div> <!-- .row-2 -->
				<div class="row row-3">
					<div class="col">
					</div> <!-- .col -->
				</div> <!-- .row-3 -->
				<div class="row row-4">
					<div class="col">
					</div> <!-- .col -->
				</div> <!-- .row-4 -->
				<div class="row row-5">
					<div class="col">
					</div> <!-- .col -->
				</div> <!-- .row-5 -->
				<div class="row row-6">
					<div class="col">
					</div> <!-- .col -->
				</div> <!-- .row-6 -->
			</div> <!-- .content-module -->
		</div> <!-- .col-offset-1 -->
		<div class="col-sm col-md-10 col-xl-8 content-area content-area-4">
			<div class="content-module">
				<h2 class="train-title bold">We Train Winners.</h2>
				<p>
					Speed, Agility and Strength Training - Train with qualified trainers with
					Baseball/Softball backgrounds - We use ladders, hurdles, medicine balls,
					jump ropes. To enhance ones lateral movement, explosiveness, stamina
					and work ethic. Best place to come Hit then Run. Open to the public,
					reservations are not required but are strongly recommended. Especially
					during peak hours 5-8pm. Be alert that hours may vary during seasons
				</p>
				<!-- <a href="#" class="train-winners-link"><span class="learn-more bold">Learn More>></span></a> -->
			</div> <!-- .content-module -->
		</div> <!-- .content-area-4 -->
	</div> <!-- .row-for-content -->

	<div class="row row-for-indicators text-center">
		<div class="col">
			<ol class="indicator-list">
				<li class="indicator indicator-1"><span class="indicator-dot active"></span></li>
				<li class="indicator indicator-2"><span class="indicator-dot"></span></li>
				<li class="indicator indicator-3"><span class="indicator-dot"></span></li>
				<li class="indicator indicator-4"><span class="indicator-dot"></span></li>
			</ol> <!-- .indicator-list -->
		</div> <!-- .col -->
	</div> <!-- .row-for-indicators -->
	<div class="row row-for-ticker">
		<div class="what-happening">
			<span class="what-happening-text">What's On Deck</span>
		</div> <!-- .what-happening -->
		<div class="ticker-info">
			<ol class="ticker-list">
				<?php
				for ($i=1; $i < 6; $i++) { 
					$ticker = ( !get_theme_mod( 'ticker_'.$i ) ) ? '' : get_theme_mod( 'ticker_'.$i );
					if ( $ticker == '' ) {

					} else {
						?>	
						<li class="ticker-item"><span class="numbered"><?php echo $i; ?></span>. <?php echo $ticker; ?></li>
						<?php
					}
				}
				?>
			</ol> <!-- .ticker-list -->
		</div> <!-- .ticker-info -->

</div> <!-- .row-for-ticker -->