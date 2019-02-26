<?php get_header(); ?>
	<div class="mainContainer sitetop">
		<div class="primaryContainer">
			<div class="entryTitle__outer">
				<h2><?php the_archive_title(); ?></h2>
			</div>
<?php if ( have_posts() ) : ?>
			<ul class="entryList" id="entryList">
	<?php
		while ( have_posts() ) :
			the_post();
	?>
				<li class="entryItem">
					<a href="<?php the_permalink(); ?>">
						<div class="entryItem__thumbnail">
							<div class="entryItem__thumbnail__inner"></div>
						</div>
						<div class="entryItem__content">
							<span class="entryItem__date"><?php the_time( 'Y年m月d日' ); ?></span>
							<h3 class="entryItem__title"><?php the_title(); ?></h3>
							<div class="entryItem__excerpt">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</a>
				</li>
	<?php endwhile; ?>
			</ul>
<?php endif; ?>
<?php
	the_posts_pagination(
						array(
							'prev_text' => '前へ',
							'next_text' => '次へ',
							'mid_size'  => 2
						)
					);
?>
		</div>
<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
