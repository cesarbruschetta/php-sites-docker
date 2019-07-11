<?php
class JConfig {
	var $offline = '0';
	var $editor = 'tinymce';
	var $list_limit = '20';
	var $helpurl = 'http://help.joomla.org';
	var $debug = '0';
	var $debug_lang = '0';
	var $sef = '0';
	var $sef_rewrite = '0';
	var $sef_suffix = '0';
	var $feed_limit = '10';
	var $secret = 'laWmATBXppcdfUTt';
	var $gzip = '0';
	var $error_reporting = '-1';
	var $xmlrpc_server = '0';
	var $log_path = './logs';
	var $tmp_path = './logs/tmp';
	var $live_site = '';
	var $force_ssl = '0';
	var $offset = '0';
	var $caching = '0';
	var $cachetime = '15';
	var $cache_handler = 'file';
	var $memcache_settings = array();
	var $ftp_enable = '0';
	var $ftp_host = '127.0.0.1';
	var $ftp_port = '21';
	var $ftp_user = '';
	var $ftp_pass = '';
	var $ftp_root = '';
	var $dbtype = 'mysql';
	var $host = $_ENV['MYSQL_HOST'];
	var $user = $_ENV['MYSQL_USER'];
	var $db = 'cesarbru_bd_lords_of_games';
	var $dbprefix = 'jos_';
	var $mailer = 'mail';
	var $mailfrom = 'mensagens@cabinformatica.com';
	var $fromname = '.::Lords Of Games::.';
	var $sendmail = '/usr/sbin/sendmail';
	var $smtpauth = '0';
	var $smtpuser = '';
	var $smtppass = '';
	var $smtphost = 'localhost';
	var $MetaAuthor = '1';
	var $MetaTitle = '1';
	var $lifetime = '15';
	var $session_handler = 'none';
	var $password = $_ENV['MYSQL_PASS'];
	var $sitename = '.::Lords Of Games::.';
	var $MetaDesc = 'Joomla! - O sistema dinâmico de portais e gerenciador de conteúdo';
	var $MetaKeys = 'joomla, Joomla';
	var $offline_message = 'Este site está em manutenção. Por favor, retorne mais tarde.';
}
?>