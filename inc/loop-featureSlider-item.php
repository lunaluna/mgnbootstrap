			<li class="swiper-slide item featureSlider__item">
				<a href="<?php the_permalink(); ?>">
					<div class="featureSlider__thumbnail">
						<?php the_post_thumbnail( 'thumb', array( 'class' => 'object-fit-image, featureSlider__image' ) ); ?>
					</div>
					<div class="featureSlider__content">
<?php
	$bodytype_bgcolor = get_term_meta( $body_type_term_id, 'bodytype-bgcolor', true );
	$bodytype_textcolor = get_term_meta( $body_type_term_id, 'bodytype-textcolor', true );
?>
						<span class="featureSlider__car" style="background-color:<?php echo esc_attr( $bodytype_bgcolor ); ?>;color:<?php echo esc_attr( $bodytype_textcolor ); ?>"><?php echo esc_html( $body_type_term_name ); ?></span>
						<h3 class="featureSlider__title"><?php the_title(); ?></h3>
					</div>
				</a>
			</li>
