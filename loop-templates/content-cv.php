<?php
/**
 * Partial template for content in cv.php
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header envs-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="row entry-content">
		<div class="col-md-8 entry-content">
			<div class="envs-prompt"><h2>Name</h2></div>
			<div class="envs-response"><?php echo acf_fetch_cv_name();?></div>
			
			<div class="envs-prompt"><h2>Interests</h2></div>
			<div class="envs-response"><?php echo acf_fetch_cv_interests();?></div>

			<div class="envs-prompt"><h2>Skills</h2></div>
			<div class="envs-response"><?php echo acf_fetch_cv_skills();?></div>

			<div class="envs-prompt"><h2>Academics</h2></div>
			<div class="envs-response"><?php echo acf_fetch_cv_academics();?></div>

			<div class="envs-prompt"><h2>Work History</h2></div>
			<div class="envs-response"><?php echo acf_fetch_cv_work_history();?></div>
			
			<?php the_content(); ?>

		</div><!-- .entry-content -->
	</div>

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
