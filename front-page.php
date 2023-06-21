<?php get_header(); ?>

<section class="banner">
      <div class="container">
        <div class="banner__wrapper">
          <h1>The Blog</h1>
          <div class="banner__grid">
            <div class="banner__main">
                <?php $cardLg = new WP_Query(array(
                    'post_type' => 'post',
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
              <article class="banner__story">
                <?php the_post_thumbnail(); ?>
            
                <div class="banner__story__content">
                <small><?php echo get_the_date('M d, Y'); ?></small>
                  <h2><?php the_title(); ?></h2>
                  <p>
                    <?php the_content(); ?>
                  </p>
                  <a href="<?php the_permalink(); ?>">Read More...</a>
                </div>
              </article>
            <?php endwhile;
            else : 
                echo "wala nang post";
            endif; 

            wp_reset_postdata();         
            ?>


            </div>

            <div class="banner__sidebar">
            <?php $cardSm = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
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
              <div class="card__sm">
              <?php echo get_the_post_thumbnail(); ?>
                <div class="card__sm__content">
                <small><?php echo get_the_date('M d, Y'); ?></small>
                  <h3><?php the_title(); ?></h3>
                  <a href="#">Read More...</a>
                </div>
              </div>

              <?php endwhile;
            else : 
                echo "wala nang post";
            endif; 

            wp_reset_postdata();         
            ?>

            </div>
          </div>
        </div>
      </div>
    </section>


<?php get_footer(); ?>