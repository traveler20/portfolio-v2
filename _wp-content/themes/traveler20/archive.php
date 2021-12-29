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
					
					<?php
						$categories = get_the_category();
						$tags = get_the_tags();
					?>
					<header>
						<div id="header_layer">
							<h1 class="p-page--single__title"><?php the_archive_title('','の記事');?></h1>
							<?php echo category_description();?>		
							<nav id="header_nav">
							</nav>
						</div><!--END-header_layer-->
					</header>
					<main id="category_main" <?php post_class();?>>
						<?php if(have_posts()):?>
						<?php while(have_posts()):the_post();?>
						<section class="articles_index">
							<h2><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h2>
							<time class="date"><?php the_time('Y年n月j日'); ?></time>
							<div class="articles_index_thumbnail">
								<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
								</a>
							</div>
							<nav id="tag_navigation">	
								<?php if (the_category()) the_category('<ul id="tag_list"><li class="tag_name">','</li><li class="tag_name">','</li></ul>'); ?>
							</nav>
						</section>
						<?php endwhile;?>
						<div id="pager_navigation">
							<?php posts_nav_link( '　', '<i class="fa fa-angle-left icon-left"></i>PREV', 'NEXT<i class="fa fa-angle-right icon-right"></i>' ); ?>
						</div>
						<?php endif;?>
					</main>

				</div>
			</section>
			<!-- /.p-page__content -->
		</main>
		<!-- /main -->

		<?php get_footer(); ?>
