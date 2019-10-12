<?php
/*
*** LB Portfolio 1.0 ***
*/
?>

<?php 
	get_header();
	get_sidebar();
?>

<main id="maincontent" role="main">

	<header>
		<h1 class="taxonomy_title">
			<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			echo $term->name; ?>
		</h1>
	</header>

	<div id="lb_portfolio_grid">


	<?php if ( have_posts () ) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<div class="projects_overlay">
				<div class="projects_background">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('medium'); ?>
					
					<div class="projects_text" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<p class="projects_title"><?php the_title(); ?></p>
					</div>
					</a>
				</div><!--.projects_background-->
			</div><!--.projects_overlay-->
		<?php endwhile; else : ?>
		<?php endif; ?>
	</div><!--#lb_portfolio-->

	<!--bottom navigation to older and newer posts if there is more than one page of posts-->
	<div class="page-navigation">
		<?php
		/*
		** pagination

		*/
global $wp_query;
		$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
		?>

		<?php wp_reset_postdata(); ?>
	</div><!--.navigation-->

</main>

<?php get_footer(); ?>
