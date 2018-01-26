<?php
/*
Template Name: Размещение
*/
?>

<?php get_header(); ?>

<section class="b-pageHeader">
    <div class="row">
        <h1 class="wow zoomInLeft" data-wow-delay="0.7s"><?php echo get_cat_name(15);?></h1>
    </div>
</section><!--b-pageHeader-->

<div class="b-breadCumbs s-shadow">
    <div class="container">
        <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
    </div>
</div><!--b-breadCumbs-->

<section class="b-search">
    <div class="container">
        <div class="b-search__filter">
            <div class="b-search__main-title wow zoomInUp" data-wow-delay="0.3s">
                <h2>ПОДБЕРИТЕ СЕБЕ ПАРАМЕТРЫ ОТЕЛЯ ПО ВКУСУ</h2>
            </div>
			<?
			// echo '<pre>';
			// print_r($_GET);
			// echo '</pre>';
			
			?>
            <div class="b-search__main-form wow zoomInUp" data-wow-delay="0.3s">
                <form class="filter" action="" method="GET"><!-- action пустой, чтобы ссылалось на текущую страницу  -->
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="m-firstSelects">
                                <div class="col-xs-6">
                                    <?php if( $terms = get_terms('stars', 'orderby=name', 'order=ASC') ) : // как я уже говорил, для простоты возьму рубрики category, но get_terms() позволяет работать с любой таксономией
                                        echo '<select name="hotel-stars">';
                                            echo '<option value="all">Все</option>';
                                        foreach ($terms as $term) :
                                            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // в качестве value я взял ID рубрики
                                        endforeach;
                                        echo '</select>';
                                    endif; ?>
                                    <span class="fa fa-caret-down"></span>
                                    <p>Колличество звезд</p>
                                </div>
                                <div class="col-xs-6">
                                    <?php if( $terms = get_terms('type-room', 'orderby=name', 'order=ASC') ) : // как я уже говорил, для простоты возьму рубрики category, но get_terms() позволяет работать с любой таксономией
                                        echo '<select name="type-room">';
                                        echo '<option value="all">Все</option>';
                                        foreach ($terms as $term) :
                                            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // в качестве value я взял ID рубрики
                                        endforeach;
                                        echo '</select>';
                                    endif; ?>
                                    <span class="fa fa-caret-down"></span>
                                    <p>Вид номера</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 text-left">
                            <div class="b-search__main-form-range">
                                <label class="">Цена от: <!-- Интервал значений цены -->
                                    <input type="number" name="price_ot"/>
                                </label>
                                <label>до:
                                    <input type="number" name="price_do"/>
                                </label>
                            </div>
                            <div class="b-search__main-form-submit">
                                <button type="submit" class="btn m-btn">ПОДОБРАТЬ ОТЕЛЬ<span class="fa fa-angle-right"></span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!--b-search-->

<div class="b-items">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">

                <div class="row">
                    <?php if ($_GET && !empty($_GET)) { // если было передано что-то из формы
                        // go_filter(); // запускаем функцию фильтрации
						
						if(!empty($_GET['price_ot']) and empty($_GET['price_do'])){
						$args =  array(
                        'post_type' => 'hotel_pod',
                        'orderby'      => 'modified',
                        'order'        => 'ASC',
                        // 'posts_per_page' => '-1',
						'tax_query'=>array(
							'relation' => 'AND',
								array(
									'taxonomy' => 'stars',
									'field'    => 'id',
									'terms'    => array($_GET['hotel-stars']),
									// 'terms'    => array( 103, 115, 206 ),
									'operator' => 'IN',
								),
								array(
									'taxonomy' => 'type-room',
									'field'    => 'id',
									'terms'    => array($_GET['type-room']),
									'operator' => 'IN',
								)
							),
						 'meta_query' => array(
							array(
								'key' => 'hotel-cost',
								'value' => $_GET['price_ot'],
								'compare' => '>=',
								'type' => 'NUMERIC',
							),
						),
                    );
						}elseif(empty($_GET['price_ot']) and !empty($_GET['price_do'])){
								$args =  array(
								'post_type' => 'hotel_pod',
								'orderby'      => 'modified',
								'order'        => 'ASC',
								// 'posts_per_page' => '-1',
								'tax_query'=>array(
									'relation' => 'AND',
										array(
											'taxonomy' => 'stars',
											'field'    => 'id',
											'terms'    => array($_GET['hotel-stars']),
											// 'terms'    => array( 103, 115, 206 ),
											'operator' => 'IN',
										),
										array(
											'taxonomy' => 'type-room',
											'field'    => 'id',
											'terms'    => array($_GET['type-room']),
											'operator' => 'IN',
										)
									),
								 'meta_query' => array(
									array(
										'key' => 'hotel-cost',
										'value' => $_GET['price_do'],
										'compare' => '<=',
										'type' => 'NUMERIC',
									),
								),
							);
						}elseif(!empty($_GET['price_ot']) and !empty($_GET['price_do'])){
							$args =  array(
								'post_type' => 'hotel_pod',
								'orderby'      => 'modified',
								'order'        => 'ASC',
								// 'posts_per_page' => '-1',
								'tax_query'=>array(
									'relation' => 'AND',
										array(
											'taxonomy' => 'stars',
											'field'    => 'id',
											'terms'    => array($_GET['hotel-stars']),
											// 'terms'    => array( 103, 115, 206 ),
											'operator' => 'IN',
										),
										array(
											'taxonomy' => 'type-room',
											'field'    => 'id',
											'terms'    => array($_GET['type-room']),
											'operator' => 'IN',
										)
									),
								 'meta_query' => array(
									array(
										'key' => 'hotel-cost',
										'value' => array($_GET['price_ot'], $_GET['price_do'] ),
										'compare' => 'BETWEEN',
										'type' => 'NUMERIC',
									),
								),
							);
							
							
						}elseif(($_GET['price_ot'] == 'all') and ($_GET['price_do'] == 'all')){
                            $args =  array(
                                'post_type' => 'hotel_pod',
                                'orderby'      => 'modified',
                                'order'        => 'ASC',
                                'posts_per_page' => '-1',

                            );

                        }else{
							$args =  array(
                        'post_type' => 'hotel_pod',
                        'orderby'      => 'modified',
                        'order'        => 'ASC',
                        // 'posts_per_page' => '-1',
						'tax_query'=>array(
						'relation' => 'AND',
							array(
								'taxonomy' => 'stars',
								'field'    => 'id',
								'terms'    => array($_GET['hotel-stars']),
								// 'terms'    => array( 103, 115, 206 ),
								'operator' => 'IN',
							),
							array(
								'taxonomy' => 'type-room',
								'field'    => 'id',
								'terms'    => array($_GET['type-room']),
								'operator' => 'IN',
							)
						),
						
                    );
						}
					// echo 'sdsd';
                    }else{ 
					$args =  array(
                        'post_type' => 'hotel_pod',
                        'orderby'      => 'modified',
                        'order'        => 'ASC',
                        'posts_per_page' => '-1',
						
                    );
					}
					// var_dump($args);
                    $recent = new WP_Query($args);

                    while($recent->have_posts()) : $recent->the_post(); ?>
                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <div class="b-items__cell wow zoomInUp" data-wow-delay="0.5s">
                                <div class="b-items__cars-one-img">
                                    <img class='img-responsive' src="<?php the_field('hotel-img'); ?>"/>
                                    <?php if( get_field('priority') == 'vip' ): ?>
                                        <span class="b-items__cars-one-img-type m-premium">Особая</span>
                                    <?php endif; ?>
                                    <?php if( get_field('priority') == 'new' ): ?>
                                        <span class="b-items__cars-one-img-type m-listing">Новинка</span>
                                    <?php endif; ?>
                                    <?php if( get_field('priority') == 'sale' ): ?>
                                        <span class="b-items__cars-one-img-type m-owner">Акция</span>
                                    <?php endif; ?>
                                </div>
                                <div class="b-items__cell-info">
                                    <div class="s-lineDownLeft b-items__cell-info-title">
                                        <h2 class=""><?php the_title(); ?></h2>
                                    </div>
                                    <div class="text-cut"><?php the_content(); ?></div>
                                    <?php if(has_tag()){the_tags('<div class="text-dop"><div class="meta-tags">','','</div></div>');}?>
                                    <div class="row m-smallPadding">
                                        <div class="col-xs-6">
                                            <h5 class="b-items__cell-info-price"><?php the_field('hotel-cost'); ?> </h5>
                                        </div>
                                        <div class="col-xs-6"></div>
                                    </div>
                                    <a href="<?php the_permalink() ?>" class="btn m-btn">ПОДРОБНЕЕ<span class="fa fa-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                    <?php $i++; endwhile; ?>

                </div>

                <?php the_posts_pagination( array(
                    'prev_text' => "<span class='fa fa-angle-left'></span>",
                    'next_text' => "<span class='fa fa-angle-right'></span>",
                    'end_size' => 2,
                    'mid_size' => 2
                ) ); ?>
            </div>
        </div>

    </div>
</div><!--b-items-->

<!--Content Area End-->

<?php get_footer(); ?>
