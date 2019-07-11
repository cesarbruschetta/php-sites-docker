<?php

/**
* Plugin Name: WP-ContactForm
* Plugin URI: http://www.douglaskarr.com/projects/wp-contactform/
* Description: Originally developed by <a href="http://ryanduff.net/projects/wp-contactform/">Ryan Duff</a>, modified and enhanced by <a href="http://www.douglaskarr.com">Doug Karr</a>.
* Author: Douglas Karr
* Author URI: http://www.douglaskarr.com
* Version: 3.1.8
*/

	load_plugin_textdomain('wpcf',$path='wp-content/plugins/wp-contact-form');

	// Declare strings that change depending on input. This also resets them so errors clear on resubmission.
	$wpcf_strings=array(
	'name'=>'<input class="field" type="text" name="wpcf_your_name" id="wpcf_your_name" maxlength="50" tabindex="11" value="'.htmlentities($_POST['wpcf_your_name']).'" />',
	'email'=>'<input class="field" type="text" name="wpcf_email" id="wpcf_email" maxlength="50" tabindex="12" value="'.htmlentities($_POST['wpcf_email']).'" />',
	'response'=>'<input class="field" type="text" name="wpcf_response" id="wpcf_response" maxlength="50" tabindex="13" value="'.htmlentities($_POST['wpcf_response']).'" />',	
	'usersubject'=>'<input class="field" type="text" name="wpcf_usersubject" id="wpcf_usersubject" tabindex="15" maxlength="50" value="'.htmlentities($_POST['wpcf_usersubject']).'" />',
	'msg'=>'<textarea name="wpcf_msg" id="wpcf_msg" cols="'.htmlentities($_POST['wpcf_cols']).'" rows="'.htmlentities($_POST['wpcf_rows']).'" tabindex="16">'.htmlentities($_POST['wpcf_msg']).'</textarea>',
	'error'=>''
	);

	function wpcf_is_malicious($input) {
        if (empty($input)) return true;
        $bad_inputs=array("\r", "mime-version", "content-type", "cc:", "to:");
        foreach ($bad_inputs as $bad_input) {
                if (strpos(strtolower($input), strtolower($bad_input)) !== false) {
                    return true;
                }
        }
        return false;
    }

	function wpcf_is_challenge($input) {
		$answer=get_option('wpcf_answer');
		$answer=stripslashes(trim($answer));
		if (get_option('wpcf_casesensitive')=='TRUE') {
			return (strtoupper($input)== strtoupper($answer));
		} else {
			return ($input== $answer);
		}
	}

	// This function checks for errors on input and changes $wpcf_strings if there are any errors. Shortcircuits if there has not been a submission
	function wpcf_check_input() {
		if (isset($_POST['wpcf_stage'])) {
			$wpcf_your_name = stripslashes(trim($_POST['wpcf_your_name']));
			$wpcf_email = stripslashes(trim($_POST['wpcf_email']));
			$wpcf_response = stripslashes(trim($_POST['wpcf_response']));
			$wpcf_website = stripslashes(trim($_POST['wpcf_website']));
			$wpcf_usersubject = stripslashes(trim($_POST['wpcf_usersubject']));
			$wpcf_msg = stripslashes(trim($_POST['wpcf_msg']));
			$wpcf_cols = stripslashes(trim($_POST['wpcf_cols']));
			$wpcf_rows = stripslashes(trim($_POST['wpcf_rows']));
			
			global $wpcf_strings;
			
			$reason=false;
			if (empty($_POST['wpcf_your_name'])) {
				$reason='empty';
				$wpcf_strings['name']='<input type="text" name="wpcf_your_name" class="field error" id="wpcf_your_name" maxlength="50" tabindex="11" value="'.htmlentities($wpcf_your_name).'" class="contacterror" />';
			}
			if (!is_email($_POST['wpcf_email'])) {
				$reason='empty';
				$wpcf_strings['email']='<input type="text" name="wpcf_email" class="field error" id="wpcf_email" maxlength="50" tabindex="12" value="'.htmlentities($wpcf_email).'" class="contacterror" />';
			}
			if (empty($_POST['wpcf_response'])) {
				$reason='empty';
				$wpcf_strings['response']='<input type="text" name="wpcf_response" class="field error" id="wpcf_response" tabindex="13" maxlength="50" value="'.htmlentities($wpcf_response).'" class="contacterror" />';
			}
			if (!wpcf_is_challenge($_POST['wpcf_response'])) {
				$reason='wrong';
				$wpcf_strings['response']='<input type="text" name="wpcf_response" class="field error" id="wpcf_response" tabindex="13" maxlength="50" value="'.htmlentities($wpcf_response).'" class="contacterror" />';
			}
			if (empty($_POST['wpcf_usersubject']) && (get_option('wpcf_showsubject')=='TRUE')) {
				$reason='empty';
				$wpcf_strings['usersubject']='<input type="text" name="wpcf_usersubject" class="field error" id="wpcf_usersubject" tabindex="15" maxlength="50" value="'.htmlentities($wpcf_usersubject).'" class="contacterror" />';
			}
			if (empty($_POST['wpcf_msg'])) {
				$reason='empty';
				$wpcf_strings['msg']='<textarea name="wpcf_msg" class="error" id="wpcf_message" tabindex="16" cols="'.htmlentities($wpcf_cols).'" rows="'.htmlentities($wpcf_rows).'" class="contacterror">'.htmlentities($wpcf_msg).'</textarea>';
			}
			if (wpcf_is_malicious($wpcf_your_name) || wpcf_is_malicious($wpcf_email)) {
				$reason='malicious';
			}
			if ($reason) {
				if ($reason== 'malicious') {
					$wpcf_strings['error']='<p class=\"alert\">'.__('You can not use any of the following in the Name or Email fields: a linebreak, or the phrases &acute;mime-version&acute;,&acute;content-type&acute;,&acute;cc:&acute; or &acute;to:&acute;','wpcf').'</p>';
				}
				elseif($reason== 'empty') {
					$wpcf_strings['error']='<p class="alert">'. stripslashes(get_option('wpcf_error_msg')).'.</p>';
				}
				elseif($reason== 'wrong') {
					$wpcf_strings['error']='<p class=\"alert\">'.__('You answered the challenge question incorrectly.','wpcf').'</p>';
				}
				return false;
			}
			return true;
		}
		return false;
	}

	// Wrapper function which calls the form.
	function wpcf_callback($content) {
		global $wpcf_strings;
		if (strpos($content,'%%wpcontactform%%')!== false) {
			if (wpcf_check_input()) {
				$recipient = get_option('wpcf_email');
				if(strpos(get_option('wpcf_subject'),"|")>0) {
					$subject = $_POST['wpcf_usersubject'];
				} else {
					if(strlen(get_option('wpcf_subject'))>0) {
						$subject = get_option('wpcf_subject').' '.$_POST['wpcf_usersubject'];
					} else {
						$subject = $_POST['wpcf_usersubject'];
					}
				}
				$success_msg = get_option('wpcf_success_msg');
				$success_msg = stripslashes($success_msg);
				$name=$_POST['wpcf_your_name'];
				$email=$_POST['wpcf_email'];
				$website=$_POST['wpcf_website'];
				$msg=stripslashes($_POST['wpcf_msg']);
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "From: ".$name." <".$email.">\r\n";
				$headers .= "Content-Type: text/plain; charset=\"".get_settings('blog_charset')."\"\r\n";
				$fullmsg = $name." <".$email."> wrote:\n";
				$fullmsg .= wordwrap($msg, 80, "\n")."\n\n";
				$fullmsg .= "Website: ".$website."\n";
				$fullmsg .= "IP: ".getip();
				wp_mail($recipient, $subject, $fullmsg, $headers);
				if($_POST['copy']=='true') {
					wp_mail($email, $subject, $fullmsg, $headers);
				}
				$form='<div style="font-weight: bold;">'.$success_msg.'</div>';
				
			} else {
				$question = stripslashes(get_option('wpcf_question'));
				$wpcf_legend = get_option('wpcf_legend');
				
				$form .= '<div id="wpcf">';
				$form .= '<fieldset>';
				if(strlen($wpcf_legend)>0) {
					$form .= '<legend>'.$wpcf_legend.'</legend>';
				}
				$form .= '<form action="'.get_permalink().'" name="wpcf_form" method="post">';
				$form .= '<input type="hidden" value="process" name="wpcf_stage"/>'; 
				$form .= $wpcf_strings['error'];
				$form .= '<p><label for="wpcf_your_name">'. __('Seu Nome:','wpcf').'</label>';
				$form .= $wpcf_strings['name'].'</p>';
				$form .= '<p><label for="wpcf_email">'. __('E-mail:','wpcf').'</label>';
				$form .= $wpcf_strings['email'].'</p>';
				$form .= '<p><label>'.__('Challenge:','wpcf').'</label><span class="Pergunta de segurança">'. __($question, 'wpcf').'</span></p>';
				$form .= '<p><label for="wpcf_response">'. __('Resposta:','wpcf').'</label>';
				$form .= $wpcf_strings['response'].'</p>';
				$form .= '<p><label for="wpcf_website">'. __('Seu Site:','wpcf').'</label>';
				$form .= '<input class="field" type="text" name="wpcf_website" id="wpcf_website" maxlength="100" tabindex="14" value="'.htmlentities($_POST['wpcf_website']).'" /></p>';
				$form .= '<p><label for="wpcf_usersubject">'. __('Assunto:','wpcf').'</label>';
				if(strpos(get_option('wpcf_subject'),"|")>0) {
					$subjectarray = array();
					$subjectarray = explode("|",get_option('wpcf_subject'));
						$form .= '<select class="field" name="wpcf_usersubject" id="wpcf_usersubject" tabindex="15">';
						for ($i=0; $i<count($subjectarray);$i++ ) {
							$arrayoption = '';
							$arrayoption = trim($subjectarray[$i]);
							if ($arrayoption!='') {
								$form .= '<option value="'.trim($subjectarray[$i]).'">'.trim($subjectarray[$i]).'</option>';
							}
						}
						$form .= '</select>';
					} else {
					if (get_option('wpcf_showsubject')=="TRUE") {
						$form.= $wpcf_strings['usersubject'];
					}
				}
				$form .= '</p>';
				$form .= '<p><label for="wpcf_msg">'. __('Sua Mensagem:','wpcf').'</label>';
				$form .= $wpcf_strings['msg'].'</p>';
				if (get_option('wpcf_copy')=='TRUE') {
					$form .= '<p><label for="wpcf_copy">'. __('Copy','wpcf').'</label>';
					$form .= '<input id="copy" type="checkbox" tabindex="17" value="true" name="copy" title="'. __('Send me a copy','wpcf').'"/></p>';
				}
				$form .= '<p class="button"><input id="contactsubmit" type="submit" value="'. __('Enviar','wpcf').'" tabindex="18" name="Submit"/></p>';
				$form .= '</form></fieldset></div>';
			}
			$content = str_replace('%%wpcontactform%%', $form, $content);
			//return str_replace('%%wpcontactform%%', $form, $content);
		}
		return $content;
	}

	// Can't use WP's function here, so lets use our own
	function getip() {
		return (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : (isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : $_SERVER['REMOTE_ADDR']));
	}

	// Add the options page
	function wpcf_add_options_page() {
		add_options_page('Contact Form Options','Contact Form','manage_options','wp-contact-form/options-contactform.php');
	}
	
	function wpcontactform() {
		echo wpcf_callback('%%wpcontactform%%');
	}
	
	function wpcf_add_css() {
		$style = get_option('wpcf_style');
		$style = '<style type="text/css">'.$style;
		$style .= '</style>';
		echo $style;
	}

	// Action calls for all functions
	add_action('wp_head','wpcf_add_css');
	add_action('admin_head','wpcf_add_options_page');
	add_filter('the_content','wpcf_callback', 7);
?>