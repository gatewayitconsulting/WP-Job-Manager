<?php
/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.0.0
 * @version     1.34.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;
?>
<li <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr( $post->geolocation_long ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_lat ); ?>">
	<div class="position">
		<h1><?php wpjm_the_job_title(); ?></h1>
		<div class="company">
			<?php the_company_name( '<strong>', '</strong> ' ); ?>
			<?php the_company_tagline( '<span class="tagline">', '</span>' ); ?>
		</div>
	</div>
	<ul class="meta job-listing-meta">
		<?php do_action( 'job_listing_meta_start' ); ?>

		<?php if ( get_option( 'job_manager_enable_types' ) ) { ?>
			<?php $types = wpjm_get_the_job_types(); ?>
			<?php if ( ! empty( $types ) ) : foreach ( $types as $type ) : ?>
				<li class="job-type <?php echo esc_attr( sanitize_title( $type->slug ) ); ?>"><?php echo esc_html( $type->name ); ?></li>
			<?php endforeach; endif; ?>
		<?php } ?>

		<li class="location"><?php the_job_location(); ?></li>

		<?php do_action( 'job_listing_meta_end' ); ?>
	</ul>
	<div class="job_description">
		<?php wpjm_the_job_description(); ?>
	</div>
</li>
