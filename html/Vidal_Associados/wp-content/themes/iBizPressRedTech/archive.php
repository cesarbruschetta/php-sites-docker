<?php get_header(); ?>
      
      <div class="post_message">
        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php /* If this is a category archive */ if (is_day()) { ?>
        Archive for <?php the_time('F jS, Y'); ?>
        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        Archive for <?php the_time('F, Y'); ?>
        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        Archive for <?php the_time('Y'); ?>
        <?php } ?>
        </div>
      
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <!-- post start -->
        <div class="post_box" id="post-<?php the_ID(); ?>">
        	<h3><?php the_category(', ') ?></h3>
          <div class="post_title">
            <h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
          </div>
          <div class="post_details">
		  	 <?php the_time('F jS Y') ?> | Posted by <?php the_author_posts_link(); ?> <?php edit_post_link('edit'); ?>
          </div>
          
          <?php if(function_exists('the_ratings')){ ?>
          <div class="post_rating">
            <?php the_ratings(); ?>
          </div>
          <?php } ?>
          <div class="post_content">
            <?php the_excerpt(); ?>
            <p> <a href="<?php the_permalink() ?>" class="more-link" rel="bookmark" title="<?php the_title(); ?>">READ THE FULL ARTICLE &gt;&gt;</a></p>
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