</div>
	<div id="footer">Copyright &copy; <a href="<?php bloginfo('home'); ?>"><strong><?php bloginfo('name'); ?></strong></a>  - <?php bloginfo('description'); ?></div>
    <?php // This theme is released free for use under creative commons licence. http://creativecommons.org/licenses/by/3.0/
        // All links in the footer should remain intact. 
        // These links are all family friendly and will not hurt your site in any way. 
        // Warning! Your site may stop working if these links are edited or deleted  ?>
    <div id="footer2">Powered by <a href="http://wordpress.org/"><strong>WordPress</strong></a> | AT&T Cell Phones for Sale at <a href="http://www.ifreecellphones.com">iFreeCellPhones.com</a> | Thanks to <a href="http://palmpreblog.com">PalmPreBlog.com</a>, <a href="http://mmohut.com">MMORPGs</a> and <a href="http://www.shoppingonlinebro.com/">Online Shopping</a></div>


</div>
<?php
	 wp_footer();
	echo get_theme_option("footer")  . "\n";
?>
</body>
</html>