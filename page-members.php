<?php get_header()?>
<div class="page__hero" style="background-image:
    linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.9)),
    url(<?php echo get_post_meta(get_the_id(), 'page-banner', true)?>
)">    <h1><?php the_title() ?></h1>
</div>



<section class="team">
<div class="container">
    <h3>Meet the Team</h3>
    <div class="team__grid">

    <?php $member = new WP_Query(array(
                    'post_type' => 'members',
                    'posts_per_page' => 4,
                  
    ));
                
                ?>
                 <?php if($member->have_posts()) : while($member->have_posts()) : $member->the_post()?>
        <div class="team__card">
        <?php if(has_post_thumbnail()){
                        the_post_thumbnail();
                    }
                    ?>
                    <p><?php the_title()?></p>
            <h4>  <?php echo get_post_meta(get_the_ID(), 'Work', true)?></h4>
            
            <ul>
                <li><a href="<?php the_title()?> <?php echo get_post_meta(get_the_ID(), 'facebook', true)?>"><i class="fab fa-facebook"></i></a></li>
                <li><a href="<?php the_title()?> <?php echo get_post_meta(get_the_ID(), 'twitter', true)?>"><i class="fab fa-twitter"></i></a></li>
                <li><a href="<?php the_title()?> <?php echo get_post_meta(get_the_ID(), 'linkedIn', true)?>"><i class="fa-brands fa-linkedin"></i></a></li>
                <li><a href="<?php the_title()?> <?php echo get_post_meta(get_the_ID(), 'email', true)?>"><i class="fas fa-envelope"></i></a></li>
            </ul>
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