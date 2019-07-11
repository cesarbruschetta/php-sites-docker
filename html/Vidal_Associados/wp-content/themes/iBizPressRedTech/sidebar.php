</div>
<div id="sidebar">
  <div id="sidebar_content">
  	<div class="sidebar_box">
      <h3>Busque no Nosso Site!!!</h3>
      <form method="get" id="search_form" action="<?php bloginfo ('home'); ?>">
          <input type="text" name="s" id="s" value="Busca..." onfocus="if (this.value == Busca...') {this.value = '';}" onblur="if (this.value == '') {this.value = Busca...';}" />
          <input type="submit" name="btn_search" id="btn_search" value="" />
        </form>
    </div>
    <div class="sidebar_box">
    	<h3>Video Interessante</h3>
        <div class="vid">
        <object width="285" height="231">
            <param name="movie" value="http://www.youtube.com/v/<?php echo get_option('ibiz_tech_youtube_id'); ?>&hl=en&fs=1"></param>
            <param name="allowFullScreen" value="true"></param>
            <param name="allowscriptaccess" value="always"></param>
            <embed src="http://www.youtube.com/v/<?php echo get_option('ibiz_tech_youtube_id'); ?>&hl=en&fs=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="285" height="231"></embed>
        </object>
        </div>
    </div>
    <!-- <div class="sidebar_box">
      <h3>Event &amp; News Updates</h3>
      <div class="rss_box">Sign up to receive breaking news as well as receive other site updates!</div>
      <form action="http://www.feedburner.com/fb/a/emailverify" target="popupwindow" onsubmit="window.open('http://www.feedburner.com', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" id="rss_form">
        <input type="text" name="email" id="email_rss" value="Enter your email!" onblur="if (this.value == '') {this.value = 'Enter your email!';}"  onfocus="if (this.value == 'Enter your email!') {this.value = '';}" />
          <input type="submit" name="subscribe_email_btn" id="subscribe_email_btn" value="" />
          <input type="hidden" value="http://feeds.feedburner.com/~e?ffid=<?php echo get_option('ibiz_tech_feedburner_id'); ?>" name="url" />
          <input type="hidden" value="<?php echo get_option('ibiz_tech_feedburner_url'); ?>" name="title" />
          <input type="hidden" name="loc" value="en_US"/>
      </form>
    </div> -->
    <div class="sidebar_box">
      <h3>Sobre Nos!!</h3>
      <p><?php echo get_option('ibiz_tech_about_us'); ?></p>
    </div>
    <!--
    <div class="sidebar_box">
      <h3>Our Sponsors</h3>
      <div class="img_ads"> <a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/125.gif" alt="1" width="125" height="125" /></a> <a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/125.gif" alt="1" width="125" height="125" /></a> <a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/125.gif" alt="1" width="125" height="125" /></a> <a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/125.gif" alt="1" width="125" height="125" /></a> </div>
    </div>
    <div class="sidebar_box">
      <h3>Archives</h3>
      <ul>
          <?php wp_get_archives('type=monthly&limit=12&show_post_count=0'); ?>
        </ul>
    </div>
    <div class="sidebar_box">
      <h3>Categories</h3>
      <ul>
          <?php wp_list_categories('orderby=id&show_count=0&use_desc_for_title=0&title_li='); ?>
        </ul>
    </div>
    <div class="sidebar_box">
      <h3>Recent Entries</h3>
      <ul>
          <?php get_archives('postbypost', 10); ?>
        </ul>
    </div>
    -->
  </div>
</div>