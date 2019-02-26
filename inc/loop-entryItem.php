			<li class="entryItem">
				<a href="<?php the_permalink(); ?>">
					<div class="entryItem__thumbnail">
						<div class="entryItem__thumbnail__inner">
							<?php drenavi_the_post_thumbnail(); ?>
						</div>
					</div>
					<div class="entryItem__content">
<?php
	$bodytype_bgcolor = get_term_meta( $body_type_term_id, 'bodytype-bgcolor', true );
	$bodytype_textcolor = get_term_meta( $body_type_term_id, 'bodytype-textcolor', true );
?>
						<span class="featureSlider__car" style="background-color:<?php echo esc_attr( $bodytype_bgcolor ); ?>;color:<?php echo esc_attr( $bodytype_textcolor ); ?>"><?php echo esc_html( $body_type_term_name ); ?></span>
						<h3 class="entryItem__title"><?php the_title(); ?></h3>
					</div>
				</a>
			</li>
