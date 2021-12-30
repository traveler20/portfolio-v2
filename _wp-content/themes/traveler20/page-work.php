        <?php get_header(); ?>

		<!-- main -->
		<main class="p-page--page">
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
			<section class="p-page__content c-section" id="content" style="clip-path: polygon(0 0,100% 2%,100% 100%,0 100%);">
				<div class="c-section__inner">
					<ul class="p-page__cards">
					<!-- page.php -->
						<?php
							global $post;
							$args = array( 'posts_per_page' => 8 );
							$myposts = get_posts( $args );
							foreach( $myposts as $post ) {
							setup_postdata($post);
						?>
						<li class="p-page__card">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('index_thumbnail'); ?>
								<h3 class="p-page__card__title"><?php the_title(); ?></h3>
								<time class="p-page__card__time"><?php the_time('Y.m.d') ?></time>
							</a>
							<span class="p-page__card__category"><?php the_category(',') ?></span>
						</li>
						<?php
							}
							wp_reset_postdata();
						?>
					</ul>
				</div>
			</section>
			<!-- /.p-page__content -->
		</main>
		<!-- /main -->

		<?php get_footer(); ?>