<?php
/*
*** LB Portfolio 1.0 ***
*/
?>

<?php 
	get_header();
?>

<main id="maincontent" role="main">

	<header>
		<h1 class="entry-title">
			<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			echo $term->name; ?>
		</h1>
	</header>

	<div id="lb_portfolio">

	<?php  $args = array(
			'posts_per_page' => '-1',
			'post_type' => 'lb_portfolio',
		);?>

	<?php $lb_portfolio = new WP_Query ( $args ); ?>

	<?php if ( have_posts () ) : ?>

	<?php if ( ($lb_portfolio->post_count) > 1 ) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>" role="article">
				<header>
					<h2 class="entry-title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
						<?php the_title(); ?></a>
					</h2>
					<p class="author">By <?php the_author(); ?></p>
					<time class="date"><?php the_time('F jS, Y') ?></time>
				</header>
				<div class="entry">
				<?php
					if ( has_post_thumbnail() ) {
					the_post_thumbnail('medium');
					}
				?>
				<?php the_excerpt();  ?>
				</div><!--.entry-->
				<footer>
					<p class="postmetadata">
						<?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?><br>
						<?php the_tags('Tags: ', ', ', '<br />'); ?>
					</p><!-- .metadata-->
				</footer>
			</article><!-- finish enclosing post-->  
		<?php endwhile; else : ?>

		<?php while (have_posts()) : the_post(); ?>
		<!-- Do your post header stuff here for single post-->
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>" role="article">
			<header>
				<h2 class="entry-title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
					<?php the_title(); ?></a>
				</h2>
				<p class="author">By <?php the_author(); ?></p>
				<time class="date"><?php the_time('F jS, Y') ?></time>
			</header>
			<div class="entry">
				<?php
					if ( has_post_thumbnail() ) {
					the_post_thumbnail('medium');
					}
				?>
				<?php the_content() ?>
			</div><!--.entry-->
			<footer>
			<p class="postmetadata">
				<?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?><br>
				<?php the_tags('Tags: ', ', ', '<br />'); ?>
				</p><!-- .metadata-->
			</footer>
     
			</article>  <!-- finish enclosing post-->
			<?php endwhile; endif; else :?>

		<!-- Stuff to do if there are no posts-->
		<h2 class="entry-title">Not found</h2>
		<p>Sorry, no posts matched your criteria. Perhaps searching will help</p>
		<?php get_search_form(); ?>
	<?php endif; ?>
	</div><!--#lb_portfolio-->

</main>

<?php get_footer(); ?>
