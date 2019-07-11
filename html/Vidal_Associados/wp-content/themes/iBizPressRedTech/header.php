<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="google-site-verification" content="eVkGavF-3a6xDC9hj34dwqS7LDKY8UNJ4sCP6WhrpTs" />

<META NAME="AUTHOR" CONTENT="Cesar Augusto">

<meta name="description" content="Sua equipe de sócios e advogados associados possui destacada atuação nas mais diversas áreas do direito empresarial, tanto na condução de assuntos consultivos e na implementação de operações financeiras/empresariais, como também no patrocínio de medidas judiciais e administrativas do interesse de seus clientes." />

<meta name="keywords" content="advogados, advoc, escritório de advocacia, escritórios de advocacia, advocacia, direito, processos, Societário Contencioso , Arbitragem, Fusões e Aquisições, Recuperação de Empresas,  Falências, Mercado de Capitais, Constitucional,  Relações Governamentais, Financiamentos, Direito Bancário, Regulatório e Administrativo, Capital Estrangeiro, Infra-estrutura,  PPPs, Tributário e Planejamento Fiscal, Relações de Consumo, Direito Econômico e da Concorrência, Direito do Trabalho, Previdência Privada, serviço jurídico,  Social, Ambiental, Penal, Empresarial, Propriedade Industrial,  Intelectual Imobiliário, Comércio Exterior, Defesa Comercial, Eleitoral, Seguros,  Resseguros, Direito Aeronáutico, Direito Minerário, Direito Marítimo, Energia, Petróleo,  Gás, Direito Civil,  Contratos, Comunicações,  Telecomunicações, Recuperação de Créditos, Operações e Contratos Internacionais, Terceiro Setor,
Turismo, Esportes, Entretenimento Auditoria Legal, Tecnologia da Informação, Internet Transportes, Direitos Autorais, Família, Sucessões, Saúde, Vigilância Sanitária, Biotecnologia, Privatizações, Concessões, Advocacia de escala" />

<link rel="shortcut icon" href= "images/favicon.ico" />
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

<title>
<?php if (is_home()) { ?>
<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>
<?php } else if (is_category()) { ?>
<?php wp_title(''); ?> - <?php bloginfo('name'); ?>
<?php } else if (is_single() || is_page()) { ?>
<?php wp_title(''); ?> - <?php bloginfo('name'); ?>
<?php } else if (is_archive()) { ?>
<?php bloginfo('name'); ?> - <?php  if (is_day()) { ?> Archive for <?php the_time('F jS Y'); ?>
<?php  } elseif (is_month()) { ?>
Archive for <?php the_time('F Y'); ?>
<?php  } elseif (is_year()) { ?>
Archive for <?php the_time('Y'); ?>
<?php } ?>
<?php } ?>
</title>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jd.gallery.css" type="text/css" media="screen" charset="utf-8" />
<script src="<?php bloginfo('template_directory'); ?>/scripts/mootools-1.2.1-core-yc.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/scripts/mootools-1.2-more.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/scripts/jd.gallery.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/scripts/jd.gallery.transitions.js" type="text/javascript"></script>

<?php
	$selected_color = get_option('ibiz_tech_theme_color');
	
	if($selected_color == 'grey')
		$selected_color = "";
	else
		$selected_color = "_" . $selected_color;
?>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php wp_head(); ?>

</head>
<body>
<div id="wrapper">
  <div id="back_top"></div>
  <div id="wrapper_inside">
    <div id="content">
      <div id="header">
        <div id="logo">
          <h2><?php bloginfo('description'); ?></h2>
        </div>
        <div id="ads"><object width="468" height="60"><param name="movie" value="images/banner.swf"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="images/banner.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="468" height="60"></embed></object></div>
      </div>
      <div id="menu">
        <div id="main_menu">
          <ul>
            <li id="<?php if (is_home()) { ?>home<?php } else { ?>page_item<?php } ?>"><a href="<?php bloginfo('url'); ?>" title="Home">Home</a></li>
           <?php wp_list_pages('title_li=&depth=1'); ?>
            <li id="<?php if (is_home()) { ?>home<?php } else { ?>page_item<?php } ?>"><a href="/Sites/Vidal_Associados/?cat=3" title="Ultimas Noticias">Ultimas Noticias</a></li>
        </ul>    
        </div>
      </div>
      <div id="post_area">