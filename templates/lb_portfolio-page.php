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

	<header>
		<h1 class="entry-title">
			<?php the_title(); ?>
		</h1>
	</header>

	<div id="custom-posts-list">

	<?php
		$args = array(
			'posts_per_page' => '3',
			'post_type' => 'lb_portfolio',
			'paged' => get_query_var('page') ? get_query_var('page') : 1
		);
	?>

	<?php $lb_portfolio = new WP_Query ( $args ); ?>

	<?php if ( $lb_portfolio->have_posts () ) : ?>

	

	<?php while ( $lb_portfolio->have_posts() ) : $lb_portfolio->the_post(); ?>

	<div class="lb_portfolio">
		
	<?php if ( has_post_thumbnail() ) :?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail('medium'); ?>
		</a>
	<?php endif; ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="custom-post-title"><?php the_title(); ?></a>

	</div><!--.suesdesign_custom_post-->

	<?php endwhile; else :?>
	<?php endif; ?>
	</div><!--#custom-posts-list-->

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
