<?php
/**
 * Partial template for content in cv.php
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
		<div class="col-md-12 site-background" id="cv-top-card-fix">
			
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="envs-prompt"><h2>Interests</h2></div>
						<div class="envs-response"><?php echo acf_fetch_cv_interests();?></div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="card">
						<div class="envs-prompt"><h2>Skills</h2></div>
						<div class="envs-response "><?php acf_fetch_cv_skills_data();?></div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card">
						<div class="envs-prompt"><h2>Work History</h2></div>
						<div class="envs-response"><?php echo acf_fetch_cv_work_history();?></div>
					</div>
				</div>
				
				<div class="col-md-8">
					<div class="card">
						<div class="envs-response"><h2>Academics</h2>
							<div class="row">
								<div class="col-md-6 major"><h4>Major</h4><?php echo acf_fetch_cv_academic_major();?></div>
								<div class="col-md-6 minor"><?php echo acf_fetch_cv_academic_minor();?></div>
							</div>
							<div class="row">
								<div class="col-md-12"><h4>Coursework</h4></div>
									<?php echo acf_fetch_cv_coursework_data();?>
							</div>
							<div class="row">
								<div class="envs-response">
									<h4>Expected Graduation Date</h4>
										<div class="row" id="grad-date"><?php echo acf_fetch_cv_graduation();?></div>
								</div>
							</div>
						</div>
				</div>

				<div class="col-md-4">
					
					<?php echo acf_fetch_cv_uploader();?>
					
				</div>

			</div>

			<?php the_content(); ?>

		</div><!-- .entry-content -->
	</div>

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
