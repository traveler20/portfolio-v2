        <?php get_header(); ?>

		<!-- main -->
		<main>
			<!-- .p-page__fv -->
			<section class="p-page--single__fv">
				<div class="c-inner">
					<h1 class="p-page__fvTitle js-loading">
						<span id="js-fvTitle1"></span>
						<span id="js-fvTitle2"></span>
					</h1>
				</div>
			</section>
			<!-- /.p-page__fv -->

			<!-- .p-page__content -->
			<section class="p-page--single__content c-section" id="content">
				<div class="c-section__inner">
					<h1 class="p-page--single__title"><?php the_title(); ?></h1>
					<?php 
						if ( have_posts() ) :
						while ( have_posts() ) : the_post();
					?>
						<h2>
							<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<section>
							<p>作成日時：<?php the_time('Y年n月j日'); ?></p>
							<a href="<?php echo get_permalink(); ?>"><?php the_excerpt(); ?></a>
						</section>
						<hr>
					<?php 
						endwhile;
						endif;
					?>
				</div>
			</section>
			<!-- /.p-page__content -->
		</main>
		<!-- /main -->

		<?php get_footer(); ?>
