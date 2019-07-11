<?php 
$post_per_page = get_option('posts_per_page');
$numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post'");
if (0 < $numposts) $numposts = number_format($numposts); 

if($numposts > $post_per_page)
{ 
?>
<?php if (is_single()) { ?>
<?php } else if (is_page()) { ?>
<div id="post-navigator">
<?php link_pages('<strong>Paginas:</strong> ', '', 'number'); ?>
</div>
<?php } else { ?>
<div id="post-navigator">
<?php if (function_exists('wp_pagenavi')) : ?>
<?php wp_pagenavi(); ?>
<?php else : ?>
<table border="0">
  <tr>
    <td><div class="alignleft"><?php next_posts_link('&laquo; Noticias Antigas'); ?></div></td>
    <td width="370">&nbsp;</td>
    <td><div class="alignright"><?php previous_posts_link('Noticias Recentes &raquo;'); ?></div></td>
  </tr>
</table>
<?php endif; ?>
</div>
<?php } ?>
<?php
}
?>