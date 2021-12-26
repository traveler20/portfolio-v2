        <?php get_header(); ?>

		<!-- main -->
		<main>
			<!-- .p-page__fv -->
			<section class="p-page__fv">
				<div class="c-inner">
					<h1 class="p-page__fvTitle js-loading">
						<span id="js-fvTitle1" class="p-page__fvTitleEn">Work</span>
						<span id="js-fvTitle2" class="p-page__fvTitleJa">実績の一覧</span>
					</h1>
				</div>
			</section>
			<!-- /.p-page__fv -->

			<!-- .p-page__content -->
			<section class="p-page__content c-section" id="content">
				<div class="c-section__inner">
					<!-- page.php -->
                    <?php //固定ページ内容
                    get_template_part('tmp/page-contents'); ?>
				</div>
			</section>
			<!-- /.p-page__content -->
		</main>
		<!-- /main -->

		<?php get_footer(); ?>