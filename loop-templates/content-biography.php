<?php
/**
 * Partial template for content in biography.php
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
			<?php if (get_field('bio_question_2', 'option')):?>			
				<div class="envs-prompt"><h2>Who am I, and where am I from?</h2></div>
				<div class="envs-response"><?php echo get_field('bio_question_1', 'option');?></div>
			<?php endif;?>	

			<?php if (get_field('bio_question_2', 'option')):?>
				<div class="envs-prompt"><h2>What does Sustainability mean to me?</h2></div>
				<div class="envs-response"><?php echo get_field('bio_question_2', 'option');?></div>
			<?php endif;?>	

			<?php if (get_field('bio_question_3', 'option')):?>
				<div class="envs-prompt"><h2>How do I plan to innovate a more sustainable future?</h2></div>
				<div class="envs-response"><?php echo get_field('bio_question_3', 'option');?></div>
			<?php endif;?>
			
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
