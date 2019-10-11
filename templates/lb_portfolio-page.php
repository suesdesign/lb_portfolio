<?php
/*
*** Suesdesign Custom Posts 1.0 ***
*/
?>

<?php 
	get_header();
	get_sidebar();
?>

<main id="maincontent" role="main">

	<div id="lb_portfolio_grid">

		<?php
			$args = array(
				'post_type' => 'lb_portfolio',
				'paged' => get_query_var('page') ? get_query_var('page') : 1
			);
		?>

		<?php $lb_portfolio = new WP_Query ( $args ); ?>

		<?php if ( $lb_portfolio->have_posts () ) : ?>

		<?php while ( $lb_portfolio->have_posts() ) : $lb_portfolio->the_post(); ?>
			<div class="projects_overlay">
				<div class="projects_background">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail('medium'); ?>
				</a>
				<a class="projects_text" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<p class="projects_title"><?php the_title(); ?></p>
				</a>
			</div>
			</div><!--.projects_overlay-->
		<?php endwhile; else :?>
		<?php endif; ?>
	</div><!--#portfolio_grid-->

	<!--bottom navigation to older and newer posts if there is more than one page of posts-->
	<div class="page-navigation">
		<?php
		/*
		** pagination
		*/

		$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('page') ),
			'total' => $lb_portfolio->max_num_pages,
		) );
		?>

		<?php wp_reset_postdata(); ?>
	</div><!--.navigation-->

</main>

<?php get_footer(); ?>
