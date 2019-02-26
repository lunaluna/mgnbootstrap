<?php
	$site_title = "キャンピングカーナビ";
	$sep = "｜";

	$title = '';
	$description = '';

	if ( is_singular( 'car' ) ) {
		$body_type_term = $terms = get_the_terms( $post -> ID, 'body_type' );
		$body_type = $body_type_term[0] -> name;
		$body_type_slug = $body_type_term[0] -> slug;

		// $genre_term = $terms = get_the_terms( $post -> ID, 'part-type' );
		// $genre = $genre_term[0] -> name;

		$maker_term = $terms = get_the_terms( $post -> ID, 'maker' );
		$maker = $maker_term[0] -> name;

		// $brand = get_post_meta( $post -> ID, 'brand_katakana', true );

		$article_title = get_the_title( $post -> ID );

		// $title = $body_type . ' ' . $genre . ' ' . $maker . ' ' . $brand . ' ' . $article_title . $sep . $site_title;
		$title = $body_type . ' ' . $maker . ' ' . $article_title . $sep . $site_title;

		$post_obj = get_post( $post -> ID, 'OBJECT', 'display' );
		$post_content = $post_obj -> post_content;
		if ( $post_content != '' ) {
			$description = $post_content;
		} else {
			$description = 'このページでは' . $body_type . 'の' . $genre . 'の' . $maker . 'の' . $article_title . 'を紹介しています。';
		}
	} elseif ( is_front_page() ) {
		$title = $site_title . $sep . 'キャンピングカーのカタログならキャンピングカーナビ！';

		$description = 'キャンピングカーのボディタイプ別webカタログなら掲載点数が豊富なキャンピングカーナビが一番！';
	} elseif ( is_404() ) {
		$title = $site_title . $sep . 'キャンピングカーのカタログならキャンピングカーナビ！';

		$description = 'キャンピングカーのボディタイプ別webカタログなら掲載点数が豊富なキャンピングカーナビが一番！';
	} elseif ( is_page() ) {
		if ( is_page( 'maker' ) || is_page( 'recommend' ) ) {
			if ( $_GET ) {
				$body_type = $_GET['body_type'];
				if ( null == ( $_GET['body_type'] ) ) {
					$body_type = $_GET['q'];

					$body_type_obj = get_page_by_path( $body_type_slug, 'OBJECT', 'page' );
					$body_type_name = $body_type_obj -> post_title;
					$page_title = $body_type_name . 'の' . get_the_title();
				} else {
					$page_title = get_the_title();
				}
				$title = $page_title . $sep . $site_title;

				if ( is_page( 'maker' ) ) {
					$description = 'このページでは' . $body_type . 'に関連するメーカーを一覧表示しています。';
				} elseif ( is_page( 'recommend' ) ) {
					$description = 'このページでは' . $page_title . 'を紹介しています。';
				}
			}
		} else {
			$title = get_the_title() . $sep . $site_title;

			if ( $_GET ) {
				$body_type = $_GET['body_type'];
				if ( null == ( $_GET['body_type'] ) ) {
					$body_type = get_the_title();
				}
			} else {
				$body_type = get_the_title();
			}

			$post_obj = get_post( $post -> ID, 'OBJECT', 'display' );
			$post_content = $post_obj -> post_content;
			if ( $post_content != '' ) {
				$description = $post_content;
			} else {
				$description = 'このページは' . $body_type . 'に関連するキャンピングカーを紹介しています。';
			}
		}
	} elseif ( is_tax() ) {
		if ( isset( $_GET['maker'] ) && !empty( $_GET['maker'] ) ) {
			$uri = rawurldecode( $_SERVER["REQUEST_URI"] );
			$trimed_part = substr( $uri, 0, strcspn( $uri, '?' ) );
			$part_slug = str_replace( '/archives/part-type/', '', $trimed_part );

			$car = $_GET['car'];
			$car_obj = get_page_by_path( $car, 'OBJECT', 'page' );
			$car_name = $car_obj -> post_title;

			$title = $maker . 'の' . $car_name . 'の' . $part_slug . 'のキャンピングカー一覧' . $sep . $site_title;
			$description = 'このページは' . $maker . 'の' . $car . 'の' . $part_slug . 'のキャンピングカーを紹介しています。';
		} elseif ( isset( $_GET['car'] ) && !empty( $_GET['car'] ) ) {
			$term_name = single_term_title( "", false );
			$car = $_GET['car'];
			$car_obj = get_page_by_path( $car, 'OBJECT', 'page' );
			$car_name = $car_obj -> post_title;

			$title = $car_name . 'の' . $term_name . 'のキャンピングカー一覧' . $sep . $site_title;
			$description = 'このページは' . $car . 'の' . $term_name . 'のキャンピングカーを紹介しています。';
		} else {
			$term_name = single_term_title( "", false );

			$title = $term_name . 'のキャンピングカー一覧' . $sep . $site_title;
			$description = 'このページは掲載されている' . $term_name . 'のキャンピングカーすべてを紹介しています。';
		}
	} else {
		$title = get_the_title() . $sep . $site_title;
	}

	echo '	<title>' . esc_attr( $title ) . '</title>' . "\n";
	if ( $description ) {
		echo '	<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	}
