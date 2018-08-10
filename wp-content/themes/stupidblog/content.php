<article id="post-<?php get_the_ID(); ?>">
        <div class="entry-thumbnail">
                <?php 
                while(have_posts()):the_post();?>
                <?php the_post_thumbnail();?>
                <?php
                endwhile;
                ?>
        </div>
        <header class="entry-header">
 
        </header>
        <div class="entry-content">
 
        </div>
</article>