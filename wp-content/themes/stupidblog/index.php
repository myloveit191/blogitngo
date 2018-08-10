<?php
    get_header();?>
    <div class = "col-md-5">
<?php
if (have_posts()):
    while (have_posts()): the_post(); 
?>
    <h2><?php the_title(); ?></h2>
    <h2><?php the_content(); ?></h2>
    <!-- <?php the_post_thumbnail();?> -->
<?php endwhile;
    blogit_pagination();
    else:
        echo "<p>Don't any post</p>";
    endif;
?>
   </div>
<?php 
    get_footer();
?>
