<?php
/**
 * Partial template for content in capstone.php
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header envs-header">

		<h1 class="entry-title">
			<?php the_title( '<span class="highlight">' , '</span>' ); ?>
		</h1>

	</header><!-- .entry-header -->

	<div class="row entry-content site-background">
		<div class="col-md-8 entry-content">
			<div class="envs-prompt"><h2>My Capstone</h2></div>
			<div class="envs-response"><?php echo acf_fetch_capstone_main();?></div>
			
			<?php the_content(); ?>

		</div><!-- .entry-content -->
		<div class="col-md-4 entry-content site-background">
			<div class="envs-notes-response"><?php echo acf_fetch_capstone_notes();?></div>
		</div>
	</div>

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
