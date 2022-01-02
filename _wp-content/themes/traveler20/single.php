        <?php get_header(); ?>

		<!-- main -->
		<main class="p-page--single">
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
				<div class="c-section__inner p-page__editer">
					<h1 class="p-page--single__title"><?php the_title(); ?></h1>
					<?php if(has_post_thumbnail()): ?>
						<?php the_post_thumbnail("full", array("alt" => get_the_title(), "class" => "p-page__eyecatch")); ?>
					<?php endif; ?>
					<!-- single.php -->
					<?php if (have_posts()): ?>
						<?php while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
						<?php endwhile; ?>
					<?php else: ?>
					<?php endif; ?>
				</div>
				<div class="c-button">
					<h3>その他の実績はこちら</h3>
					<a href="./../">実績一覧ページへ</a>
				</div>
			</section>
			<!-- /.p-page__content -->
		</main>
		<!-- /main -->

		<?php get_footer(); ?>
