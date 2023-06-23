<?php get_header()?>


<div class="banner__single">
    <div class="container">
        <div class="banner__top">
            <h1><?php the_title ();?></h1>
            <ul>
                <li><?php echo get_the_date('M j, Y')?></li>
                <li><?php echo get_the_author_meta('display_name');?></li>
            </ul>
        </div>

        <div class="banner__bottom">
            <p><?php echo get_the_excerpt()?></p>
            <!-- <img src="http://via.placeholder.com/600x400" alt=""> -->
            <?php if(has_post_thumbnail()) {
               the_post_thumbnail(); 
               }?>
        </div>
    </div>
</div>

<article class="article__single">
    <div class="container">
        <div class="article__wrapper">
            <div class="article__info">
                <div>
                    <h3>Category</h3>
                    <p><?php echo get_the_category()[0]->name ?></p>
                    </div>
                    <div>
                <h3>Tags</h3>
                <ul>
                    <?php 
                        $post_tags = get_the_tags();

                        if ( $post_tags ) {
                            foreach( $post_tags as $tag ) { ?>
                                <li><?php echo $tag->name; ?></li>
                          <?php  }
                        }
                    ?>
                    </ul>
            </div>
            <div>
                <h3>Author</h3>
                <p>Loverboy</p>
            </div>
            <div>
                <h3>Reading</h3>
                <p><?php echo get_post_meta(get_the_ID(), 'reading_time', true)?></p>
            </div>
            </div>
            
   



            <div class="article__body">
                        <?php the_content();?>

                        <ul class= "single__navigation">
                            <li><?php previous_post_link ();?></li>
                            <li><?php next_post_link ();?></li>
                        </ul>
            </div>
        </div>
        
    </div>
</article>

<section class="feature_single">
    <div class="container">
        <div class="feature_grid">
            <div class="feature__single__sidebar">

            <?php $cardSm = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'tax_query'=> array(
                        array(
                          'taxonomy' => 'category',
                          'field' => 'slug',
                          'terms' => 'minicard',
                          'include_children' => false,
                        ),
                      )
                ))
                
                ?>
                 <?php if($cardSm->have_posts()) : while($cardSm->have_posts()) : $cardSm->the_post()?>
                <div class="feature__single_sm">
                <small><?php echo get_the_date('M d, Y'); ?></small>
                    <h3><?php the_title();?></h3>
                    <a href="<?php the_permalink(); ?>">Read More...</a>
                </div>

                <?php endwhile;
            else : 
                echo "wala nang post";
            endif; 

            wp_reset_postdata();         
            ?>
            </div>

            <?php $cardLg = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'tax_query'=> array(
                        array(
                          'taxonomy' => 'category',
                          'field' => 'slug',
                          'terms' => 'large',
                          'include_children' => false,
                        ),
                      )
                ))
                
                ?>
                <?php if($cardLg->have_posts()) : while($cardLg->have_posts()) : $cardLg->the_post()?>

            <div class="feature__single__main"
                style="background-image:
                linear-gradient(rgba(0,0,0,0), rgba(0,0,0, 0.8)), 
                url(<?php echo get_the_post_thumbnail_url(get_the_ID())?>)"
                >
                <article>
                    <h2><?php the_title()?></h2>
                    <p><?php echo wp_trim_words(get_the_excerpt(),)?></p>
                    <a href="<?php the_permalink(); ?>">Read More...</a>
                </article>
            </div>

            <?php endwhile;
            else : 
                echo "wala nang post";
            endif; 

            wp_reset_postdata();         
            ?>


        </div>
    </div>
 </section>


<?php get_footer()?>