<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<?php
	$day        = strtolower( date( 'l' ) ); // phpcs:ignore
	$open_hours = get_field( "wld_work_time.$day", 'options' ) ?: ( WLD_IS_ORLANDO_STYLE ? '' : '--:--' );
	?>
	<!--suppress CommaExpressionJS -->
	<script id="mcjs">
		! function( c, h, i, m, p ) {
			m = c.createElement( h ), p = c.getElementsByTagName( h )[0], m.async = 1, m.src = i, p.parentNode.insertBefore( m,
				p )
		}( document, "script",
			"https://chimpstatic.com/mcjs-connected/js/users/82814457d40831c930bf6e376/96aff08a1da3cbdb4857b451e.js" );
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php echo '<div class="container">'; ?>

<aside class="menu-wrap" aria-hidden="true">
	<?php if ( $open_hours ) : ?>
		<div class="work-time">
			<span><?php esc_html_e( 'Open:', 'parent-theme' ); ?> </span>
			<?php echo $open_hours; ?>
		</div>
	<?php endif; ?>
	<div class="phone-wrapper">
		<?php echo get_field( 'wld_phone', 'options' ); ?>
	</div>
	<div class="search"><?php the_header_search_form(); ?></div>
	<?php wld_the_nav( 'Header Main', true ); ?>
	<?php wld_the_nav( 'Header Second', true ); ?>
	<ul class="second-nav mobile-nav">
		<?php while ( wld_loop( 'wld_header_menu' ) ) : ?>
			<li><?php wld_the( 'link' ); ?></li>
		<?php endwhile; ?>
	</ul>
	<div class="right">
		<?php the_header_buttons(); ?>
	</div>
	<?php the_social_links(); ?>
	<button class="close-button" id="close-button">
		<span class="screen-reader-text"><?php _e( 'Close Menu', 'parent-theme' ); ?></span>
	</button>
</aside>

<?php echo '<div class="content-wrap">'; ?>

<header class="header">
	<div id="sticky-header" class="unfixed">
		<?php
		if (
			$open_hours ||
			wld_has( 'wld_phone', 'wld_social_links' ) ||
			has_nav_menu( WLD_Nav::get_location( 'Header Main' ) )
		) :
			?>
			<div class="top">
				<div class="inner">
					<?php if ( ! WLD_IS_ORLANDO_STYLE ) : ?>
						<?php wld_the_logo(); ?>
					<?php endif; ?>
					<div class="left">
						<div class="header-hour">
							<div class="phone-wrapper">
								<?php the_field( 'wld_phone', 'options' ); ?>
							</div>

							<?php if ( $open_hours ) : ?>
								<div class="work-time">
									<span><?php esc_html_e( 'Open:', 'parent-theme' ); ?></span>
									<?php echo $open_hours; ?>
								</div>
							<?php endif; ?>

						</div>
						<?php the_social_links(); ?>
					</div>
					<div class="right">
						<?php wld_the_nav( 'Header Main' ); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( wld_has( 'wld_header_logo', 'wld_header_buttons' ) ) : ?>
			<div class="middle">
				<div class="inner">
					<?php if ( WLD_IS_ORLANDO_STYLE ) : ?>
						<?php wld_the_logo(); ?>
					<?php endif; ?>
					<div class="search"><?php the_header_search_form(); ?></div>
					<div class="right">
						<?php the_header_buttons(); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( has_nav_menu( WLD_Nav::get_location( 'Header Second' ) ) ) : ?>
			<div class="bottom">
				<div class="inner">
					<?php wld_the_nav( 'Header Second' ); ?>
				</div>
			</div>
		<?php endif; ?>
		<button class="menu-button" id="open-button">
			<span class="screen-reader-text"><?php _e( 'Menu', 'parent-theme' ); ?></span>
			<?php do_action( 'wld_the_cart_count' ); ?>
		</button>
	</div>
</header>

<?php echo '<main class="main">'; ?>
