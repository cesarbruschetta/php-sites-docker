<div class="post_footer2"> 
    <?php 
		if(is_single())
		{
			echo "<a>";
			comments_number('No Comment', '1 Comment', '% Comments');
			echo "</a>";
		}
		else
		{
			comments_popup_link('No Comment', '1 Comment', '% Comments'); 
		}
	?>
    
    <!-- AddThis Button BEGIN -->
	<script type="text/javascript">var addthis_pub="izwan00";</script>
    <a class="post_bookmark" href="http://www.addthis.com/bookmark.php" onmouseover="return addthis_open(this, '', '<?php urlencode(the_permalink()); ?>', '<?php urlencode(the_title()); ?>')" onmouseout="addthis_close()" onclick="return addthis_sendto()">Compartilhar</a>
	<script type="text/javascript" src="http://s7.addthis.com/js/152/addthis_widget.js"></script>
    <!-- AddThis Button END -->
</div>