<?php
/**
 * @package LB Portfolio
 * @version 1.0
 *   Single Portfolio Post page
*/
?>

<?php 
	get_header();
	get_sidebar();
?>

<main id="maincontent" role="main">

<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<header>
			<h1 class="entry-title">
				<?php the_title(); ?>
			</h1>
		</header>
		<div class="entry">
			<?php the_content() ?>
		</div><!--.entry-->
	</article><!-- finish enclosing post-->
	<footer class="portfolio_taxonomies">
		<?php the_terms( $post->ID, 'portfolio_categories', 'Categories: ', ' / ' ); ?>
	</footer> 

<?php endwhile; else :?>
   
<?php endif; ?>

</main>

<?php get_footer(); ?>