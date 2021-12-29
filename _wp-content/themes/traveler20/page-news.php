        <?php get_header(); ?>

		<!-- main -->
		<main>
			<!-- .p-page__fv -->
			<section class="p-page__fv">
				<div class="c-inner">
					<h1 class="p-page__fvTitle js-loading">
						<span id="js-fvTitle1" class="p-page__fvTitleEn"><?php echo esc_attr($post->post_name); ?></span>
						<span id="js-fvTitle2" class="p-page__fvTitleJa"><?php the_title(); ?></span>
					</h1>
				</div>
			</section>
			<!-- /.p-page__fv -->

			<!-- .p-page__content -->
			<section class="p-page__content c-section" id="content">
				<div class="c-section__inner">
					<!-- page.php -->
					<?php
						global $post;
						$args = array( 'posts_per_page' => 8 );
						$myposts = get_posts( $args );
						foreach( $myposts as $post ) {
						setup_postdata($post);
					?>
					<div class="item">
						<div class="img">
							<?php the_post_thumbnail('index_thumbnail'); ?>
						</div>
						<div class="title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
						<div class="time">
							<?php the_time('Y.m.d') ?>    
						</div>
						<div class="category">
							<?php the_category(',') ?>
						</div>
					</div>
					<?php
						}
						wp_reset_postdata();
					?>
				</div>
			</section>
			<!-- /.p-page__content -->
		</main>
		<!-- /main -->

		<?php get_footer(); ?>