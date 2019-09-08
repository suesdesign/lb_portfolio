<?php
/*
*** LB Portfolio 1.0 ***
*/

/*
*** Template name: Portfolio
*/

?>

<?php 
	get_header();
?>

<main id="maincontent" role="main">

	<header>
		<h1 class="entry-title">
			<?php the_title(); ?>
		</h1>
	</header>

	<div id="lb_portfolio">

	<?php if ( have_posts () ) : ?>

		<?php  $args = array(
			'posts_per_page' => '-1',
			'post_type' => 'lb_portfolio',
		);?>

		<?php $lb_portfolio = new WP_Query ( $args );

		while ( $lb_portfolio->have_posts() ) : $lb_portfolio->the_post(); ?>

	<div class="lb_portfolio_project">
		
	<?php if ( has_post_thumbnail() ) :?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail('medium'); ?>
		</a>
	<?php endif; ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="custom-post-title"><?php the_title(); ?></a>

	</div><!--.lb_portfolio_project-->

	<?php endwhile; else :?>
	<?php endif; ?>
	</div><!--#lb_portfolio-->

</main>

<?php get_footer(); ?>
