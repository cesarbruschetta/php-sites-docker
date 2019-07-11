<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );
// load and inititialize gantry class
require_once('lib/gantry/gantry.php');
$gantry->init();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $gantry->language; ?>" lang="<?php echo $gantry->language;?>" >
<head>
<meta name="google-site-verification" content="rnO9zXYsAKZF8Nae_6JQWO7O3v_JdmgYwpbzBaAw8-k" />
	<?php 
		$gantry->displayHead();
		$gantry->addStyles(array('template.css','joomla.css','style.css','typography.css'));
	?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17278922-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>
	<body <?php echo $gantry->displayBodyTag(array('backgroundLevel','bodyLevel')); ?>>
		<div id="rt-background"><div id="rt-background2"><div id="rt-background3">
			<div class="rt-container">
				<?php /** Begin Drawer **/ if ($gantry->countModules('drawer')) : ?>
				<div id="rt-drawer">
					<?php echo $gantry->displayModules('drawer','standard','standard'); ?>
					<div class="clear"></div>
				</div>
				<?php /** End Drawer **/ endif; ?>
				<?php /** Begin Top **/ if ($gantry->countModules('top')) : ?>
				<div id="rt-top">
					<?php echo $gantry->displayModules('top','standard','standard'); ?>
					<div class="clear"></div>
				</div>
				<?php /** End Top **/ endif; ?>
				<div id="rt-header">
					<?php /** Begin Header **/ if ($gantry->countModules('header')) : ?>
					<div id="rt-header-overlay">
						<?php echo $gantry->displayModules('header','standard','standard'); ?>
						<div class="clear"></div>
					</div>
					<?php /** End Header **/ endif; ?>
					<?php /** Begin Menu **/ if ($gantry->countModules('navigation')) : ?>
					<div id="rt-menu">
						<div id="rt-menu-overlay">
							<?php echo $gantry->displayModules('navigation','basic','basic'); ?>
							<div class="clear"></div>
						</div>
					</div>
					<?php /** End Menu **/ endif; ?>
				</div>
				<?php /** Begin Showcase **/ if ($gantry->countModules('showcase')) : ?>
				<div id="rt-showcase">
					<?php echo $gantry->displayModules('showcase','standard','standard'); ?>
					<div class="clear"></div>
				</div>
				<?php /** End Showcase **/ else : ?>
				<div id="rt-header2"></div>
				<?php endif; ?>
				<div id="rt-main-surround">
					<?php /** Begin Main Body **/ ?>
					<div class="rt-main-overlay">
						<?php /** Begin Feature **/ if ($gantry->countModules('feature')) : ?>
						<div id="rt-feature">
							<?php echo $gantry->displayModules('feature','standard','standard'); ?>
							<div class="clear"></div>
						</div>
						<?php /** End Feature **/ endif; ?>
						<?php if ($gantry->countModules('feature')==0 and $gantry->countModules('breadcrumb')==0) : ?>
						<div class="rt-main-spacer"></div>
						<?php endif; ?>
						<?php /** Begin Breadcrumbs **/ if ($gantry->countModules('breadcrumb')) : ?>
						<div id="rt-breadcrumbs">
							<?php echo $gantry->displayModules('breadcrumb','basic','breadcrumbs'); ?>
							<div class="clear"></div>
						</div>
						<?php /** End Breadcrumbs **/ endif; ?>
						<?php /** Begin Main Top **/ if ($gantry->countModules('maintop')) : ?>
						<div id="rt-maintop">
							<?php echo $gantry->displayModules('maintop','standard','full'); ?>
							<div class="clear"></div>
						</div>
						<?php /** End Main Top **/ endif; ?>
						<?php /** Begin Main Body Columns **/ ?>
					    <?php echo $gantry->displayMainbody('mainbody','sidebar','full','standard','full','standard','full'); ?>
						<?php /** End Main Body Columns **/ ?>
						<?php /** Begin Main Bottom **/ if ($gantry->countModules('mainbottom')) : ?>
						<div id="rt-mainbottom">
							<?php echo $gantry->displayModules('mainbottom','standard','full'); ?>
							<div class="clear"></div>
						</div>
						<?php /** End Main Bottom **/ endif; ?>
					</div>
					<?php /** End Main Body **/ ?>
					<?php /** Begin Bottom **/ if ($gantry->countModules('bottom')) : ?>
					<div id="rt-bottom">
						<div class="rt-main-overlay">
							<?php echo $gantry->displayModules('bottom','standard','full'); ?>
							<div class="clear"></div>
						</div>
					</div>
					<?php /** End Bottom **/ endif; ?>
					<?php /** Begin Footer **/ if ($gantry->countModules('footer')) : ?>
					<div id="rt-footer">
						<div class="rt-main-overlay">
							<?php echo $gantry->displayModules('footer','standard','full'); ?>
							<div class="clear"></div>
						</div>
					</div>
					<?php /** End Footer **/ endif; ?>
				</div>
				<?php /** Begin Copyright **/ if ($gantry->countModules('copyright')) : ?>
				<div id="rt-copyright">
 <p font color="ffffff" align="center">&copy; 2009 <a href="sobre.html" target="popupwindow" onclick='window.open("sobre.html", "popupwindow", "scrollbars=yes,width=590,height=360");return true'>Cesar Augusto</a> - Todos os direitos reservados</p> <br /><br />
<p align="center">
<!-- Start 1FreeCounter.com code -->
    <script language="JavaScript">
  var data = '&r=' + escape(document.referrer)
	+ '&n=' + escape(navigator.userAgent)
	+ '&p=' + escape(navigator.userAgent)
	+ '&g=' + escape(document.location.href);

  if (navigator.userAgent.substring(0,1)>'3')
    data = data + '&sd=' + screen.colorDepth 
	+ '&sw=' + escape(screen.width+'x'+screen.height);

  document.write('<a href="http://www.1freecounter.com/stats.php?i=50672" target=\"_blank\" >');
  document.write('<img alt="Free Counter" border=0 hspace=0 '+'vspace=0 src="http://www.1freecounter.com/counter.php?i=50672' + data + '">');
  document.write('</a>');
  </script>
<!-- End 1FreeCounter.com code --></p>
					<?php echo $gantry->displayModules('copyright','standard','standard'); ?>
					<div class="clear"></div>
				</div>
				<?php /** End Copyright **/ endif; ?>
				<?php /** Begin Debug **/ if ($gantry->countModules('debug')) : ?>
				<div id="rt-debug">
					<?php echo $gantry->displayModules('debug','standard','standard'); ?>
					<div class="clear"></div>
				</div>
				<?php /** End Debug **/ endif; ?>
			</div>
		</div></div></div>
	</body>
</html>
<?php 
$gantry->finalize();
?>