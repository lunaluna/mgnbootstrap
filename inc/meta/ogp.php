<?php require_once dirname(__FILE__) . '/meta.php'; ?>
	<meta property="og:locale" content="ja_JP" />
	<meta property="og:type" content="website">
<?php
	$page = get_page_by_title( 'トップページ' );
	$toppage_id = $page -> ID;

	if ( $description ) :
?>
	<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
<?php else : ?>
	<meta property="og:description" content="<?php echo get_option( 'blogdescription' ); ?>">
<?php
	endif;

	if ( $title ) :
?>
	<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
<?php else : ?>
	<meta property="og:title" content="<?php echo get_the_title(); ?>">
<?php endif; ?>
	<meta property="og:url" content="<?php echo get_the_permalink(); ?>">
<?php
	if ( is_front_page() || is_page() ) :
		$attachment_id = get_post_meta( $toppage_id, 'ogp_image', true );
		$size = 'full';
		$ogp_image = wp_get_attachment_image_src( $attachment_id, $size );
		$ogp_image_url = $ogp_image[0];
?>
	<?php if ( $ogp_image ) : ?>
	<meta property="og:image" content="<?php echo esc_url( $ogp_image_url ); ?>">
	<?php else : ?>
	<meta property="og:image" content="<?php echo get_theme_file_uri( '/ogp.png' ); ?>">
	<?php endif; ?>
<?php
	elseif ( is_singular( 'part' ) ) :
		$product_image_url = get_the_post_thumbnail_url( $post -> ID, 'full' );

		if ( $product_image_url ) :
?>
	<meta property="og:image" content="<?php echo esc_url( $product_image_url ); ?>">
	<?php else : ?>
	<meta property="og:image" content="<?php echo get_theme_file_uri( '/ogp.png' ); ?>">
<?php
		endif;
	else :
?>
	<meta property="og:image" content="<?php echo get_theme_file_uri( '/ogp.png' ); ?>">
<?php endif; ?>
	<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
	<meta property="fb:app_id" content="551327985201226" />
	<meta name="twitter:card" content="summary_large_image" />
