<!-- post info -->
        <div class="post_info">
        <!--This entry was posted on <?php the_time('l, jS F , Y') ?> at <?php the_time() ?> and is filed under <?php the_category(', ') ?>. You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed. -->
          <?php 
            if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) 
            {
                // Both Comments and Pings are open 
                ?>
                You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.
        
            <?php } 
            elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) 
            {
                // Only Pings are Open 
                ?>
                Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.
        
            <?php } 
            elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) 
            {
                // Comments are open, Pings are not ?>
                You can skip to the end and leave a response. Pinging is currently not allowed.
        
            <?php } 
            elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) 
            {
                // Neither Comments, nor Pings are open ?>
                Both comments and pings are currently closed.
            <?php } ?>
        </div>
        <!-- post info end -->