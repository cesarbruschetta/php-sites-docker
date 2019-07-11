<?php
/**
 * @package   Dominion Template - RocketTheme
 * @version   1.5.0 January 1, 2010
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 * These jcomment templates are based on the fantastic GNU/GPL templates created by YSergey M. Litvinov (smart@joomlatune.ru)
 *
 */
// ensure this file is being included by a parent file
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');
/*
*
* E-mail notification for administrator
*
* ������� �����-����������� ��� ���������������
*
*/
class jtt_tpl_email_administrator extends JoomlaTuneTemplate
{
	function render() 
	{
		$comment = $this->getVar('comment');
		$object_title = $this->getVar('comment-object_title');
		$object_link =  $this->getVar('comment-object_link');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta content="text/html; charset=<?php echo $this->getVar('charset'); ?>" http-equiv="content-type" />
  <meta name="Generator" content="JComments" />
</head>
<body>
<?php echo JText::_('NOTIFICATION_COMMENT_TITLE'); ?>: <?php echo $object_title; ?><br />
<?php echo JText::_('NOTIFICATION_COMMENT_LINK'); ?>: <a href="<?php echo $object_link ?>#comment-<?php echo $comment->id; ?>" target="_blank"><?php echo $object_link ?></a><br />
<?php echo JText::_('NOTIFICATION_COMMENT_DATE'); ?>: <?php echo JCommentsText::formatDate($comment->datetime, JText::_('DATETIME_FORMAT')); ?><br />
<?php echo JText::_('NOTIFICATION_COMMENT_NAME'); ?>: <?php echo $comment->name; ?><br />
<?php echo JText::_('NOTIFICATION_COMMENT_EMAIL'); ?>: <?php echo $comment->email; ?><br />
<?php echo JText::_('NOTIFICATION_COMMENT_TEXT'); ?>: <?php echo $comment->comment; ?><br />
</body>
</html>
<?php
	}
}
?>