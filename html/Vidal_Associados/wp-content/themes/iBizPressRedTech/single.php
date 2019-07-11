<?php get_header(); ?>
      <?php 
	  	if(is_home()) { include (TEMPLATEPATH . '/slider.php'); }
	  ?>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <!-- post start -->
        <div class="post_box" id="post-<?php the_ID(); ?>">
        	<h3><?php the_category(', ') ?></h3>
          <div class="post_title">
            <h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
          </div>
          <div class="post_details">
		  	 <?php the_time('jS F Y') ?> | Publicado por<?php the_author_posts_link(); ?> <?php edit_post_link('edit'); ?>
          </div>
          <?php if(function_exists('the_ratings')){ ?>
          <div class="post_rating">
            <?php the_ratings(); ?>
          </div>
          <?php } ?>
          <div class="post_content">
            <?php the_content('READ THE FULL ARTICLE >>'); ?>
          </div>
          <?php include (TEMPLATEPATH . '/post_footer.php'); ?>
        </div>
        <!-- post end -->
        
        <?php if(is_single()) { include (TEMPLATEPATH . '/post_info.php'); } ?>
        <?php if(is_single()) { comments_template(); } ?>
        <?php endwhile; ?>
        
        <?php include (TEMPLATEPATH . '/paginate.php'); ?>
      <?php else: ?>  
      	<div class="post_message">Sorry The Post You Are Looking For Had Been Deleted.</div>
      <?php endif; ?>
                
<?php get_sidebar(); ?>      
<?php get_footer(); ?>