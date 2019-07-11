<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- comment area -->
<div class="comment_area">
<?php if ($comments) : ?>
  <h2><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h2>
 
  <?php foreach ($comments as $comment) : ?>
  <div class="comment_box" id="comment-<?php comment_ID() ?>">
    <div class="comment_header">
		<?php comment_author_link() ?> | <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?>
        <?php if ($comment->comment_approved == '0') : ?>
            <br /><em>Your comment is awaiting moderation.</em>
        <?php endif; ?>    
    </div>
    <div class="comment_details">
      <div class="comment_avatar">
      	<?php 
        $pathtotheme = get_bloginfo('stylesheet_directory');
        if(!empty($comment -> comment_author_email)) 
        {
            $md5 = md5($comment -> comment_author_email);
            $default = urlencode("$pathtotheme/images/avatar.jpg");
            echo "<img src='http://www.gravatar.com/avatar.php?gravatar_id=$md5&amp;size=50&amp;default=$default' width='50' height='50' alt='commenter' />";
        }
        ?>
      </div>
      <div class="comment_comment"> 
      <?php comment_text(); ?> 
      </div>
    </div>
  </div>
  <?php endforeach; /* end for each comment */ ?>

<?php else : // this is displayed if there are no comments so far ?>
 <?php if ('open' == $post->comment_status) : ?>
    <!-- If comments are open, but there are no comments. -->

 <?php else : // comments are closed ?>
    <!-- If comments are closed. -->
    <p class="nocomments">Comments are closed.</p>

 <?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
  <h2>Leave a Reply:</h2>
  
  <div class="comment_form">
  
  	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    
    	<?php if ( $user_ID ) : ?>
        	<div class="comment_form_left">
				<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>
            </div>
		<?php else : ?>
            <div class="comment_form_left">
              <div class="comment_form_name_desc comment_form_small_font">Name (required):</div>
              <div id="name_text_box" class="comment_form_name comment_form_field_margin">
                <input name="author" type="text" id="author" tabindex="1" value="" size="3" />
              </div>
              <div class="comment_form_email_desc comment_form_small_font">Mail (will not be published) (required):</div>
              <div id="email_text_box" class="comment_form_email comment_form_field_margin">
                <input type="text" name="email" id="email" value="" size="22" tabindex="2" />
              </div>
              <div class="comment_form_email_desc comment_form_small_font">Website:</div>
              <div id="url_text_box" class="comment_form_website comment_form_field_margin">
                <input type="text" name="url" id="url" value="" size="22" tabindex="3" />
              </div>
            </div>
         <?php endif; ?>
         
         
    <div class="comment_form_right">
      <div class="comment_form_name_desc comment_form_small_font">Comment (required):</div>
      <div id="text_area_box" class="comment_form_website comment_form_field_margin">
        <textarea name="comment" id="comment" tabindex="4" rows="3" cols="4"></textarea>
      </div>
    </div>
    <div class="comment_form_instruction"> <strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?> </code> </div>
    <div class="comment_form_submit">
      <input name="submit" type="submit" id="submit" tabindex="5" value="" />
      <?php do_action('comment_form', $post->ID); ?>
    </div>
    <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
    </form>
    <?php endif; // If registration required and not logged in ?>
    
  </div>
<?php endif; // if you delete this the sky will fall on your head ?>

</div>
<!-- end of comment area -->