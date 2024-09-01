<?php
/*
Template Name: mystery-drops
*/
get_header();

?>

<main class="mystery-drops">
    <section class="mystery-drops__section section">
        <div class="container">
            
                <?php if( have_rows('mystery-drops__slots') ): ?>
                    <div class="mystery-drops__wrapper">
                        <?php while( have_rows('mystery-drops__slots') ) : the_row(); ?>
                        

                            <div class="mystery-drops__slot">
                            <?php 
                            $mystery_drops_img = get_sub_field('mystery-drops__img');
                            if ( $mystery_drops_img ): ?>
                                <img src="<?php echo $mystery_drops_img; ?>" alt="Mystery Drops Image" />
                            <?php endif; ?>
                            </div>
    
                        <?php endwhile; ?>
                    </div>
                
                <?php else :
                    echo 'No slots found';
                endif;

                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>