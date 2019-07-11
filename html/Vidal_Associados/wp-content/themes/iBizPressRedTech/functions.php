<?php

////////////////////////////////////////////////////////////////////////////////
// Random post
////////////////////////////////////////////////////////////////////////////////
function gte_random_posts (){
global $wpdb, $post;
$current_title = get_the_title();
$randompostthis = $wpdb->get_results("SELECT $wpdb->posts.ID, post_title, post_name, post_date, post_type, post_status FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND post_title != '$current_title' ORDER BY RAND() limit 10");
foreach ($randompostthis as $post) {
$post_title = htmlspecialchars(stripslashes($post->post_title));
echo "<li><a href=\"".get_permalink()."\">$post_title</a></li>";
}
}

////////////////////////////////////////////////////////////////////////////////
// update post
////////////////////////////////////////////////////////////////////////////////
function gte_recent_updated_posts(){
global $wpdb, $post;

$recentupdatethis = $wpdb->get_results("SELECT $wpdb->posts.ID, post_title, post_name, post_date, post_type, post_status, post_modified FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER by post_modified_gmt DESC limit 10");
foreach ($recentupdatethis as $post) {
$post_title = htmlspecialchars(stripslashes($post->post_title));
echo "<li><a href=\"".get_permalink()."\">$post_title</a></li>";
}
}

////////////////////////////////////////////////////////////////////////////////
// Recent Comments
////////////////////////////////////////////////////////////////////////////////

function get_hottopics($limit = 12) {
    global $wpdb, $post;
    $mostcommenteds = $wpdb->get_results("SELECT  $wpdb->posts.ID, post_title, post_name, post_date, COUNT($wpdb->comments.comment_post_ID) AS 'comment_total' FROM $wpdb->posts LEFT JOIN $wpdb->comments ON $wpdb->posts.ID = $wpdb->comments.comment_post_ID WHERE comment_approved = '1' AND post_date_gmt < '".gmdate("Y-m-d H:i:s")."' AND post_status = 'publish' AND post_password = '' GROUP BY $wpdb->comments.comment_post_ID ORDER  BY comment_total DESC LIMIT $limit");
    foreach ($mostcommenteds as $post) {
			$post_title = htmlspecialchars(stripslashes($post->post_title));
			$comment_total = (int) $post->comment_total;
			echo "<li><a href=\"".get_permalink()."\">$post_title&nbsp;<strong>($comment_total)</strong></a></li>";
    }
}


////////////////////////////////////////////////////////////////////////////////
// Recent Comments
////////////////////////////////////////////////////////////////////////////////
function mw_recent_comments(
	$no_comments = 10,
	$show_pass_post = false,
	$title_length = 50, 	// shortens the title if it is longer than this number of chars
	$author_length = 30,	// shortens the author if it is longer than this number of chars
	$wordwrap_length = 50, // adds a blank if word is longer than this number of chars
	$type = 'all', 	// Comments, trackbacks, or both?
	$format = '<li>%date%: <a href="%permalink%" title="%title%">%title%</a> (von %author_full%)</li>',
	$date_format = 'd.m.y, H:i',
	$none_found = '<li>Keine Kommentare vorhanden.</li>',	// None found
	$type_text_pingback = 'Pingback von',
	$type_text_trackback = 'Trackback von',
	$type_text_comment = 'von'

	) {

	//Language...
	$mwlang_anonymous = 'Anonym'; // Anonymous
	$mwlang_authorurl_title_before = 'Webseite von &lsaquo;';
	$mwlang_authorurl_title_after = '&rsaquo; besuchen';


    global $wpdb;

    $request = "SELECT ID, comment_ID, comment_content, comment_author, comment_author_url, comment_date, post_title, comment_type
				FROM $wpdb->comments LEFT JOIN $wpdb->posts ON $wpdb->posts.ID=$wpdb->comments.comment_post_ID
				WHERE post_status IN ('publish','static')";

	switch($type) {
		case 'all':
			// add nothing
			break;
		case 'comment_only':
			//
			$request .= "AND $wpdb->comments.comment_type='' ";
			break;
		case 'trackback_only':
			$request .= "AND ( $wpdb->comments.comment_type='trackback' OR $wpdb->comments.comment_type='pingback' ) ";
			break;
	 default:
 		//
			break;

	}

	if (!$show_pass_post) $request .= "AND post_password ='' ";

	$request .= "AND comment_approved = '1' ORDER BY comment_ID DESC LIMIT $no_comments";

	$comments = $wpdb->get_results($request);
    $output = '';
	if ($comments) {
    	foreach ($comments as $comment) {

			// Permalink to post/comment
			$loop_res['permalink'] = get_permalink($comment->ID). '#comment-' . $comment->comment_ID;

			// Title of the post
			$loop_res['post_title'] = stripslashes($comment->post_title);
			$loop_res['post_title'] = wordwrap($loop_res['post_title'], $wordwrap_length, ' ' , 1);

			if (strlen($loop_res['post_title']) >= $title_length) {
				$loop_res['post_title'] = substr($loop_res['post_title'], 0, $title_length) . '&#8230;';
			}

			// Author's name only
        	$loop_res['author_name'] = stripslashes($comment->comment_author);
			$loop_res['author_name'] = wordwrap($loop_res['author_name'], $wordwrap_length, ' ' , 1);

			if ($loop_res['author_name'] == '') $loop_res['author_name'] = $mwlang_anonymous;
			if (strlen($loop_res['author_name']) >= $author_length) {
				$loop_res['author_name'] = substr($loop_res['author_name'], 0, $author_length) . '&#8230;';
			}

			// Full author (link, name)
			$author_url = $comment->comment_author_url;
			if (empty($author_url)) {
				$loop_res['author_full'] = $loop_res['author_name'];
			} else {
				$loop_res['author_full'] = '<a href="' . $author_url . '" title="' . $mwlang_authorurl_title_before . $loop_res['author_name'] . $mwlang_authorurl_title_after . '">' . $loop_res['author_name'] . '</a>';
			}

/*
			// Comment excerpt
			$comment_excerpt = strip_tags($comment->comment_content);
			$comment_excerpt = stripslashes($comment_excerpt);
			if (strlen($comment_excerpt) >= $comment_length) {
				$comment_excerpt = substr($comment_excerpt, 0, $comment_length) . '...';
			}

*/

			// Comment type
			if ( $comment->comment_type == 'pingback' ) {
				$loop_res['comment_type'] = $type_text_pingback;
			} elseif ( $comment->comment_type == 'trackback' ) {
				$loop_res['comment_type'] = $type_text_trackback;
			} else {
				$loop_res['comment_type'] = $type_text_comment;
			}

			// Date of comment
			$loop_res['comment_date'] = mysql2date($date_format, $comment->comment_date);

			// Output element
			$element_loop = str_replace('%permalink%', $loop_res['permalink'], $format);
			$element_loop = str_replace('%title%', $loop_res['post_title'], $element_loop);
			$element_loop = str_replace('%author_name%', $loop_res['author_name'], $element_loop);
			$element_loop = str_replace('%author_full%', $loop_res['author_full'], $element_loop);
			$element_loop = str_replace('%date%', $loop_res['comment_date'], $element_loop);
			$element_loop = str_replace('%type%', $loop_res['comment_type'], $element_loop);


			$output .= $element_loop . "\n";


		} //foreach

		$output = convert_smilies($output);

	} else {
		$output .= $none_found;
    }

    echo $output;
}

////////////////////////////////////////////////////////////////////////////////
// excerpt features
////////////////////////////////////////////////////////////////////////////////

function the_excerpt_feature($excerpt_length=35, $allowedtags='', $filter_type='none', $use_more_link=true, $more_link_text="...read more", $force_more_link=true, $fakeit=1, $fix_tags=true) {
	if (preg_match('%^content($|_rss)|^excerpt($|_rss)%', $filter_type)) {
		$filter_type = 'the_' . $filter_type;
	}
	$text = apply_filters($filter_type, get_the_excerpt_feature($excerpt_length, $allowedtags, $use_more_link, $more_link_text, $force_more_link, $fakeit));
	$text = ($fix_tags) ? balanceTags($text) : $text;
	echo $text;
}

function get_the_excerpt_feature($excerpt_length, $allowedtags, $use_more_link, $more_link_text, $force_more_link, $fakeit) {
	global $id, $post;
	$output = '';
	$output = $post->post_excerpt;
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_'.COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			$output = __('There is no excerpt because this is a protected post.');
			return $output;
		}
	}

	// If we haven't got an excerpt, make one.
	if ((($output == '') && ($fakeit == 1)) || ($fakeit == 2)) {
		$output = $post->post_content;
		$output = strip_tags($output, $allowedtags);
		$blah = explode(' ', $output);
		if (count($blah) > $excerpt_length) {
			$k = $excerpt_length;
			$use_dotdotdot = 1;
		} else {
			$k = count($blah);
			$use_dotdotdot = 0;
		}
		$excerpt = '';
		for ($i=0; $i<$k; $i++) {
			$excerpt .= $blah[$i] . ' ';
		}
		// Display "more" link (use css class 'more-link' to set layout).
		if (($use_more_link && $use_dotdotdot) || $force_more_link) {
			$excerpt .= "<a href=\"". get_permalink() . "#more-$id\">$more_link_text</a>";
		} else {
			$excerpt .= ($use_dotdotdot) ? '...' : '';
		}
		 $output = $excerpt;
	} // end if no excerpt
	return $output;
}
////////////////////////////////////////////////////////////////////////////////
// end
////////////////////////////////////////////////////////////////////////////////
//////////////////////////////
//option page
//////////////////////////////
add_action('admin_menu', 'my_theme_menu');

function my_theme_menu() 
{
	if(strlen(get_option('ibiz_tech_about_us')) == 0)
	{
		update_option('ibiz_tech_about_us', 'This is an area on your website where you can add text. This section can serve as an informative location on your website, where you can talk about your site.');
	}
	
	if(strlen(get_option('ibiz_tech_youtube_id')) == 0)
	{
		update_option('ibiz_tech_youtube_id', 'Y_Ip_SaJqpg');
	}
	
	if(strlen(get_option('ibiz_tech_feedburner_id')) == 0)
	{
		update_option('ibiz_tech_feedburner_id', '2378372');
	}
	
	if(strlen(get_option('ibiz_tech_feedburner_url')) == 0)
	{
		update_option('ibiz_tech_feedburner_url', 'http://feeds.feedburner.com/Izwan00');
	}
	
	if(strlen(get_option('ibiz_tech_468_60_banner')) == 0)
	{
		update_option('ibiz_tech_468_60_banner', '<a href="#"><img src="' . get_template_directory_uri() . '/images/468.jpg" width="468" height="60" border="0" /></a>');
	}
	
	for($i = 1; $i <= 5; $i++)
	{
		if(strlen(get_option('ibiz_tech_featured_title' . $i)) == 0)
		{
			update_option('ibiz_tech_featured_title' . $i, 'This is featured item #' . $i);
		}
		
		if(strlen(get_option('ibiz_tech_featured_desc' . $i)) == 0)
		{
			update_option('ibiz_tech_featured_desc' . $i, 'This is description for featured item #'.$i.'. You can change this content via theme option menu');
		}
			
		if(strlen(get_option('ibiz_tech_featured_link' . $i)) == 0)
		{	
			update_option('ibiz_tech_featured_link' . $i, '#');
		}
		
		if(strlen(get_option('ibiz_tech_featured_image' . $i)) == 0)
		{
			update_option('ibiz_tech_featured_image' . $i, get_template_directory_uri() . '/slider/slider'.$i.'.jpg');
		}
		
		if(strlen(get_option('ibiz_tech_featured_thumbnail' . $i)) == 0)
		{
			update_option('ibiz_tech_featured_thumbnail' . $i, get_template_directory_uri() . '/slider/slider'.$i.'-mini.jpg');
		}
	}

	if ( $_GET['page'] == basename(__FILE__) ) 
	{
		if (isset($_REQUEST['SaveThemeSetting']))
		{
			update_option('ibiz_tech_feedburner_id', $_REQUEST['ibiz_tech_feedburner_id']);
			update_option('ibiz_tech_feedburner_url', $_REQUEST['ibiz_tech_feedburner_url']);
			update_option('ibiz_tech_468_60_banner', $_REQUEST['ibiz_tech_468_60_banner']);		
			
			for($i = 1; $i <= 5; $i++)
			{
				update_option('ibiz_tech_featured_title' . $i, $_REQUEST['ibiz_tech_featured_title' . $i]);
				update_option('ibiz_tech_featured_desc' . $i, $_REQUEST['ibiz_tech_featured_desc' . $i]);
				update_option('ibiz_tech_featured_link' . $i, $_REQUEST['ibiz_tech_featured_link' . $i]);
				update_option('ibiz_tech_featured_image' . $i, $_REQUEST['ibiz_tech_featured_image' . $i]);
				update_option('ibiz_tech_featured_thumbnail' . $i, $_REQUEST['ibiz_tech_featured_thumbnail' . $i]);
			}		

			header("Location: themes.php?page=functions.php&saved=true");
			die;
		} 
	}
	
	add_theme_page('iBizPress Theme Settings', 'iBizPress Settings', 8, __FILE__, 'iBizPress_options');
}

function iBizPress_options() 
{
	if ( $_REQUEST['updated'] ) echo '<div id="message" class="updated fade"><p><strong>iBizPress Theme settings saved.</strong></p></div>';
	
	?>
    <div class="wrap">
        <h2>iBizPress Theme Settings</h2>
        
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options'); ?>
        
        <h3>Common Settings</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Feedburner ID</th>
                    <td><input type="text" name="ibiz_tech_feedburner_id" value="<?php echo get_option('ibiz_tech_feedburner_id'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Feedburner URL</th>
                    <td><input type="text" name="ibiz_tech_feedburner_url" value="<?php echo get_option('ibiz_tech_feedburner_url'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Top 468x60 Banner Code</th>
                    <td><textarea name="ibiz_tech_468_60_banner" id="ibiz_tech_468_60_banner" cols="45" rows="5"><?php echo get_option('ibiz_tech_468_60_banner'); ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Featured Video ID (Youtube only):</th>
                    <td><input type="text" name="ibiz_tech_youtube_id" value="<?php echo get_option('ibiz_tech_youtube_id'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">About Us</th>
                    <td><textarea name="ibiz_tech_about_us" id="ibiz_tech_about_us" cols="45" rows="5"><?php echo get_option('ibiz_tech_about_us'); ?></textarea></td>
                </tr>
            </table>
        
        <h3>Featured Listing</h3>
            <?php
				$strFeatured = "";
				for($i = 1; $i <= 5; $i++)
				{	
					?>
                    <h4>Featured #<?php echo $i?></h4>
            
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Title</th>
                        <td><input type="text" name="ibiz_tech_featured_title<?php echo $i?>" value="<?php echo get_option('ibiz_tech_featured_title'.$i); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Description</th>
                        <td><textarea name="ibiz_tech_featured_desc<?php echo $i?>" id="ibiz_tech_featured_desc<?php echo $i?>" cols="45" rows="5"><?php echo get_option('ibiz_tech_featured_desc'.$i); ?></textarea></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Link</th>
                        <td><input type="text" name="ibiz_tech_featured_link<?php echo $i?>" value="<?php echo get_option('ibiz_tech_featured_link'.$i); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Image URL (584x284)</th>
                        <td><input type="text" name="ibiz_tech_featured_image<?php echo $i?>" value="<?php echo get_option('ibiz_tech_featured_image'.$i); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Thumbnail URL (100x75)</th>
                        <td><input type="text" name="ibiz_tech_featured_thumbnail<?php echo $i?>" value="<?php echo get_option('ibiz_tech_featured_thumbnail'.$i); ?>" /></td>
                    </tr>
                </table>
                    <?php
					$strFeatured .= ',ibiz_tech_featured_title'.$i.', ibiz_tech_featured_desc'.$i.', ibiz_tech_featured_link'.$i.', ibiz_tech_featured_image'.$i.', ibiz_tech_featured_thumbnail'.$i.'';
					
				}
			?>

            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="ibiz_tech_about_us, ibiz_tech_youtube_id,ibiz_tech_feedburner_id,ibiz_tech_feedburner_url,ibiz_tech_468_60_banner <?php echo $strFeatured; ?>" />
            <p class="submit">
                <input type="submit" name="SaveThemeSetting" id="SaveThemeSetting" value="<?php _e('Save Theme Settings') ?>" />
            </p>
        </form>
    </div>

    <?php
}
?>