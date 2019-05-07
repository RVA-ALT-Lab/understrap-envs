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

	<div class="row entry-content">
		<div class="col-md-8 entry-content">
			<div class="envs-prompt"><h2>Who am I, and where am I from?</h2></div>
			<div class="envs-response"><?php echo acf_fetch_bio_question_one();?></div>

			<div class="envs-prompt"><h2>What does Sustainability mean to me?</h2></div>
			<div class="envs-response"><?php echo acf_fetch_bio_question_two();?></div>

			<div class="envs-prompt"><h2>How do I plan to innovate a more sustainable future?</h2></div>
			<div class="envs-response"><?php echo acf_fetch_bio_question_three();?></div>
			
			<?php the_content(); ?>

		</div><!-- .entry-content -->
		<div class="col-md-4 entry-content">
			<div class="bio-profile-box">
				<?php echo acf_fetch_bio_profile_picture();?>
			</div>
		</div>
	</div>

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
