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
		<h1 class="entry-title">
			<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			echo $term->name; ?>
		</h1>
	</header>

	<div id="lb_portfolio">


	<?php if ( have_posts () ) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>" role="article">
				<header>
					<h2 class="entry-title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
						<?php the_title(); ?></a>
					</h2>
				</header>
				<div class="entry">
				<?php
					if ( has_post_thumbnail() ) {
					the_post_thumbnail('medium');
					}
				?>
				</div><!--.entry-->
				<footer>
					<p class="postmetadata">
						<?php the_terms( $post->ID, 'portfolio_categories', 'Categories: ', ' / ' ); ?>
					</p><!-- .metadata-->
				</footer>
			</article><!-- finish enclosing post-->  
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
