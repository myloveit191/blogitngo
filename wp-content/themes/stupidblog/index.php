<?php
    get_header();?>
    <div class = "col-md-5">
<?php
if (have_posts()):
    while (have_posts()): the_post(); 
?>
    <h2><?php the_title(); ?></h2>
    <h2><?php the_content(); ?></h2>
<?php endwhile; ?>
<?php 
    else:
        echo "sai roi ban oi";
    endif;
?>
   </div>
<?php 
    get_footer();
?>
