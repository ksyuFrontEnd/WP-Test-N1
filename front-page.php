<?php get_header();?> 

<main class="main">
    <section class="banner-section section">
        <div class="container">
            <div class="swiper bannerSwiper">
                <div class="swiper-wrapper">

                    <!-- First banner slide -->
                    <div class="swiper-slide">
                        <div class="swiper-slide__img">
                            <?php 

                            $banner_image_1 = get_field('banner_image_1');
                            if( !empty( $banner_image_1 ) ): ?>
                                <img src="<?php echo esc_url($banner_image_1['url']); ?>" alt="<?php echo esc_attr($banner_image_1['alt']); ?>" />

                            <?php endif; ?>

                        </div> 
                        <div class="swiper-slide__text">
                            <h3><?php the_field('banner_title_1_small'); ?></h3>
                            <h2><?php the_field('banner_title_1_large'); ?></h2>
                            <p><?php the_field('banner_info_1'); ?></p>

                            <?php 

                            $banner_btn_link_1 = get_field('banner_btn_link_1');
                            $banner_btn_text_1 = get_field('banner_btn_text_1');
                            if( $banner_btn_link_1 ): ?>
                                <a class="swiper-slide__button" href="<?php echo esc_url( $banner_btn_link_1 ); ?>"><?php echo esc_attr( $banner_btn_text_1 ); ?></a>

                            <?php endif; ?>
                        </div>  
                    </div>

                    <!-- Second banner slide -->
                    <div class="swiper-slide">
                        <div class="swiper-slide__img">
                            <?php 

                            $banner_image_2 = get_field('banner_image_2');
                            if( !empty( $banner_image_2 ) ): ?>
                                <img src="<?php echo esc_url($banner_image_2['url']); ?>" alt="<?php echo esc_attr($banner_image_2['alt']); ?>" />

                            <?php endif; ?>

                            <div class="swiper-slide__text">
                                <h2><?php the_field('banner_title_2'); ?></h2>
                                <p><?php the_field('banner_info_2'); ?></p>
                            
                                <?php 

                                $banner_btn_link_2 = get_field('banner_btn_link_2');
                                $banner_btn_text_2 = get_field('banner_btn_text_2');
                                if( $banner_btn_link_2 ): ?>
                                    <a class="swiper-slide__button" href="<?php echo esc_url( $banner_btn_link_2 ); ?>"><?php echo esc_attr( $banner_btn_text_2 ); ?></a>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>   
                </div>
                
                <div class="banner-pagination"></div>

                <div class="banner-navigation">
                    <div class="arrow-next">
                        <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M15.0378 6.34317L13.6269 7.76069L16.8972 11.0157L3.29211 11.0293L3.29413 13.0293L16.8619 13.0157L13.6467 16.2459L15.0643 17.6568L20.7079 11.9868L15.0378 6.34317Z" fill="currentColor"/></svg>
                    </div>
                    <div class="arrow-prev">
                        <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M20.3284 11.0001V13.0001L7.50011 13.0001L10.7426 16.2426L9.32842 17.6568L3.67157 12L9.32842 6.34314L10.7426 7.75735L7.49988 11.0001L20.3284 11.0001Z" fill="currentColor"/></svg>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <section class="slots-section section">
        <div class="container">
            <div class="slots-section__heading">
                <div class="slots-section__title">
                    <?php the_field('slots-section__title'); ?>
                </div>
                <div class="slots-section__btn <?php echo get_option('csd_display_type', 'grid') == 'slider' ? 'button-slider' : 'button-grid'; ?>">

                    <?php 
                    $slots_btn_link = get_field('slots_btn_link');
                    $slots_btn_text = get_field('slots_btn_text');

                    if( $slots_btn_link ): ?>

                        <a class="slots__btn" href="<?php echo esc_url( $slots_btn_link ); ?>"><?php echo esc_attr( $slots_btn_text ); ?></a>
                    <?php endif; ?>

                </div>
            </div>
            <?php
            
            if (function_exists('custom_display_slots')) {
                custom_display_slots();
            }
            ?>

        </div>
    </section>
</main>

<?php get_footer();?>