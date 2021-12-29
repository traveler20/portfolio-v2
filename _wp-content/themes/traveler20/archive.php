        <?php get_header(); ?>

		<!-- main -->
		<main class="p-page--page">
			<!-- .p-page__fv -->
			<section class="p-page__fv">
				<div class="c-inner">
					<h1 class="p-page__fvTitle js-loading">
						<span id="js-fvTitle1" class="p-page__fvTitleEn">archive</span>
						<span id="js-fvTitle2"></span>
					</h1>
				</div>
			</section>
			<!-- /.p-page__fv -->

			<!-- .p-page__content -->
			<section class="p-page__content c-section" id="content">
				<div class="c-section__inner">
					
					<?php
						$categories = get_the_category();
						$tags = get_the_tags();
					?>
					<header class="p-page--archive__header">
						<h1 class="p-page--archive__title"><?php the_archive_title('','の記事');?></h1>
						<?php echo category_description();?>
					</header>
					<ul class="p-page__cards">
					<?php if(have_posts()):?>
					<?php while(have_posts()):the_post();?>
						<li class="p-page__card">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
								<h3 class="p-page__card__title">
									<?php echo the_title();?>
								</h3>
								<time class="p-page__card__time"><?php the_time('Y年n月j日'); ?></time>
							</a>
							<span class="p-page__card__category"
								><?php if (the_category()) the_category('<ul id="tag_list"><li class="tag_name">','</li><li class="tag_name">','</li></ul>'); ?></span
							>
						</li>
						<?php endwhile;?>
						<div id="pager_navigation">
							<?php posts_nav_link( '　', '<i class="fa fa-angle-left icon-left"></i>PREV', 'NEXT<i class="fa fa-angle-right icon-right"></i>' ); ?>
						</div>
						<?php endif;?>
					</ul>

				</div>
			</section>
			<!-- /.p-page__content -->
		</main>
		<!-- /main -->

		<?php get_footer(); ?>
