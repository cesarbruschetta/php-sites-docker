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
* Comments list template. Displays comments list with header and navigation (pagination) 
*
* ������ ��� ����������� ������ ������������. 
*
* ������ ������ ���������� ��������������� ������.
* ������ ����������� ���������� ����������� (�������� ������) ��������� � ����� tpl_comment.php
*
* � ������ ������ ��� �������������� �������� �������� � ���������� comments-items, 
* ���� � comment-item (���� ��������� ���������� ���� ������� ������, ��. ����������� ����)
*
*/
class jtt_tpl_list extends JoomlaTuneTemplate
{
	function render() 
	{
		$comments = $this->getVar('comments-items');

		if (isset($comments)) {
			// display full comments list with navigation and other stuff
			// �������� ����� �������. ���������� ������ ������������ � ��������� (�������, ������) � �.�.
			$this->getHeader();

			if ($this->getVar('comments-nav-top') == 1) {
?>
<center><div id="nav-top"><?php echo $this->getNavigation(); ?></div></center>
<?php
			}
?>
<div id="comments-list" class="comments-list">
<?php
			$i = 0;
			
			foreach($comments as $id => $comment) {
?>
        <div class="<?php echo ($i%2 ? 'odd' : 'even'); ?>" id="comment-item-<?php echo $id; ?>"><?php echo $comment; ?></div>
<?php
				$i++;
			}
?>
</div>
<?php
			if ($this->getVar('comments-nav-bottom') == 1) {
?>
<center><div id="nav-bottom"><?php echo $this->getNavigation(); ?></div></center>
<?php
			}
?>
<div id="comments-list-footer"><?php echo $this->getFooter();?></div>
<?php
		} else {
			// display single comment item (works when new comment is added)

			// ���� �������� ������� ��������, ���� �������� ����� �����������
			// � ��������� ���������� ���������. � ���� ������ ����������� �� ���� ������,
			// � ������ ���� ������ ����������� � ������.

			$comment = $this->getVar('comment-item');

			if (isset($comment)) {
				$i = $this->getVar('comment-modulo');
				$id = $this->getVar('comment-id');

?>
	<div class="<?php echo ($i%2 ? 'odd' : 'even'); ?>" id="comment-item-<?php echo $id; ?>"><?php echo $comment; ?></div>
<?php
			} else {
?>
<div id="comments-list" class="comments-list"></div>
<?php
			}
		}
	}

	/*
	*
	* Display comments header and small buttons: rss and refresh
	*
	* ���������� ��������� ������������ � 2 ��������� ������: RSS � Refresh. �� ����� �� ������ Refresh ���������
	* ������� jcomments.showPage, ������� ������ �������� � ������� ������� �������� ������ ������������.
	*
	*/
	function getHeader()
	{
		$object_id = $this->getVar('comment-object_id');
		$object_group = $this->getVar('comment-object_group');

		$btnRSS = '';
		$btnRefresh = '';
		
		if ($this->getVar('comments-refresh', 1) == 1) {
			$btnRefresh = '<a class="refresh" href="#" title="'.JText::_('REFRESH').'" onclick="jcomments.showPage('.$object_id.',\''. $object_group . '\',0);return false;">&nbsp;</a>';
		}

		if ($this->getVar('comments-rss') == 1) {
			$link = $this->getVar('rssurl');
			$btnRSS = '<a class="rss" href="'.$link.'" title="'.JText::_('RSS').'" target="_blank">&nbsp;</a>';
		}
?>
<h2 class="title comments-title"><?php echo JText::_('COMMENTS'); ?><?php echo $btnRSS; ?><?php echo $btnRefresh; ?></h2>
<?php
	}

	/*
	*
	* Display RSS feed and/or Refresh buttons after comments list
	*
	* ���������� ������ � ������� �� RSS-����� �/��� ������ "�������� ������ ������������"
	* ����� ������ ������������ �������� �������. ������ RSS ������������ ������ � ��� ������, 
	* ���� � ���������� ���������� �������� ������� ������������ � RSS.
	*
	*/
	function getFooter()
	{
		$footer = '';

		$object_id = $this->getVar('comment-object_id');
		$object_group = $this->getVar('comment-object_group');

		$lines = array();

		if ($this->getVar('comments-refresh', 1) == 1) {
			$lines[] = '<a class="refresh" href="#" title="'.JText::_('REFRESH').'" onclick="jcomments.showPage('.$object_id.',\''. $object_group . '\',0);return false;">'.JText::_('REFRESH').'</a>';
		}

		if ($this->getVar('comments-rss', 1) == 1) {
			$link = $this->getVar('rssurl');
			$lines[] = '<a class="rss" href="'.$link.'" target="_blank">'.JText::_('RSS').'</a>';
		}

		if ($this->getVar('comments-can-subscribe', 0) == 1) {
			$isSubscribed = $this->getVar('comments-user-subscribed', 0);

			$text = $isSubscribed ? JText::_('Unsubscribe') : JText::_('Subscribe');
			$func = $isSubscribed ? 'unsubscribe' : 'subscribe';

			$lines[] = '<a id="comments-subscription" class="subscribe" href="#" title="' . $text . '" onclick="jcomments.' . $func . '('.$object_id.',\''. $object_group . '\');return false;">'. $text .'</a>';
		}

		if (count($lines)) {
			$footer = implode('<br />', $lines);			
		}

		return $footer;
	}

	/*
	*
	* Display comments pagination
	*
	* ���������� ������������ ��������� ��� ������ ������������.
	*
	*/
	function getNavigation()
	{
		if ($this->getVar('comments-nav-top') == 1 
		||  $this->getVar('comments-nav-bottom') == 1) {
			$active_page = $this->getVar('comments-nav-active', 1);
			$first_page = $this->getVar('comments-nav-first', 0);
			$total_page = $this->getVar('comments-nav-total', 0);

			if ($first_page != 0 && $total_page != 0) {
				$object_id = $this->getVar('comment-object_id');
				$object_group = $this->getVar('comment-object_group');

				$content = '';

				for ($i=$first_page; $i <= $total_page; $i++) {
					if ($i == $active_page) {
						$content .= '<span class="activepage"><b>'.$i.'</b></span>';
					} else {
						$content .= '<span onclick="jcomments.showPage('.$object_id.', \''.$object_group.'\', '.$i.');" class="page" onmouseover="this.className=\'hoverpage\';" onmouseout="this.className=\'page\';" >'.$i.'</span>';
					}
				}	
				return $content;
			}
		}
		return '';
	}
}
?>