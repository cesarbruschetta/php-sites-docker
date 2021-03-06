<?php
// $Id: imagepicker.theme.inc,v 1.1.2.13 2010/01/17 18:17:21 hutch Exp $
// $Name: DRUPAL-6--2-7 $
// for D6. Version 2
/**
 * @file
 * Themimg functions for imagepicker.
 */

/**
 * theme registry
 */
function imagepicker_theme() {
  return array(
    'imagepicker' => array(
      'arguments' => array(
        'content' => NULL,
        'img'  => NULL,
        'public'  => NULL,
      ),
    ),
    'imagepicker_list' => array(
      'arguments' => array(
        'header' => array(),
        'rows' => array(),
        'max' => 50,
        'message' => "",
        'pref' => "",
        'suff' => "",
        'label' => "",
      ),
    ),
    'imagepicker_stats' => array(
      'arguments' => array(
        'header' => array(),
        'rows' => array(),
        'pref' => "",
        'suff' => "",
        'label' => "",
      ),
    ),
    'imagepicker_browser' => array(
      'arguments' => array(
        'content' => array(),
        'forms' => array(),
        'message' => "",
        'help' => "",
        'label' => "",
      ),
    ),
    'imagepicker_fullpage' => array(
      'arguments' => array(
        'image' => array(),
        'source' => "",
        'link' => 1,
      ),
    ),
    'imagepicker_quota_message' => array(
      'arguments' => array(
        'message1' => "",
        'message2' => "",
        'form' => array(),
        'label' => "",
        'help' => "",
      ),
    ),
    'imagepicker_view' => array(
      'arguments' => array(
        'img' => array(),
        'imgpath' => "",
        'info' => array(),
        'exifinfo' => array(),
      ),
    ),
    'imagepicker_image_edit_header' => array(
      'arguments' => array(
        'image' => array(),
        'source' => "",
      ),
    ),
    'imagepicker_quota' => array(
      'arguments' => array(
        'form' => array(),
        'message' => "",
        'label' => "",
      ),
    ),
    'imagepicker_upload_progress_message' => array(
      'arguments' => array(
        'message' => "",
      ),
    ),
    'imagepicker_user_config' => array(
      'arguments' => array(
        'form' => array(),
        'label' => "",
        'help' => "",
        'message1' => "",
        'message2' => "",
      ),
    ),
    'imagepicker_user_view' => array(
      'arguments' => array(
        'view' => "",
        'form1' => array(),
        'form2' => array(),
        'form3' => array(),
      ),
    ),
    'imagepicker_admin_view' => array(
      'arguments' => array(
        'view' => "",
        'form1' => array(),
        'form2' => array(),
        'form3' => array(),
      ),
    ),
    'imagepicker_insert' => array(
      'arguments' => array(
        'img' => NULL,
        'public' => NULL,
        'form1' => array(),
        'form2' => array(),
      ),
    ),
  );
}

function theme_imagepicker($content, $img='', $public=FALSE) {
  if (module_exists('admin_menu')) {
    admin_menu_suppress();
  }
  global $language, $user;
  $path = drupal_get_path('module', 'imagepicker');
  drupal_add_css($path .'/imagepicker.css');
  if ($img) {
    $settings = array(
      'imagepicker_iframe' => array(
        'imgpImageAlt' => ($img['img_title'] ? addslashes(check_plain($img['img_title'])) : t('Image') ),
        'imgpImageTitle' => ($img['img_title'] ? addslashes(check_plain($img['img_title'])) : ''),
        'imgpImageDesc' => preg_replace("/(\n|\r)/", '', nl2br($img['img_description'])),
        'imgpFileLink' => imagepicker_get_image_path($img, 'full', ($public ? array('name' => $img['name'], 'uid' => $img['uid'] ) : FALSE) ),
        'imgpThumbLink' => imagepicker_get_image_path($img, 'thumb', ($public ? array('name' => $img['name'], 'uid' => $img['uid'] ) : FALSE)),
        'imgpPageLink' => url('imagepicker/image/'. $img['img_id']),
        'isFCKeditor' => (module_exists('fckeditor') ? 'yes' : 'no' ),
        'isWysiwyg' => (module_exists('wysiwyg') ? 'yes' : 'no' ),
        'use_cssbox' => ((variable_get('imagepicker_use_cssbox', 0) && ! isset($user->imagepicker_use_cssbox) ) ? 1 : (variable_get('imagepicker_use_cssbox', 0) && isset($user->imagepicker_use_cssbox) && $user->imagepicker_use_cssbox) ? 1 : 0),
        'default_align_show' => ((variable_get('imagepicker_default_align_show', 1) && ! isset($user->imagepicker_default_align_show) ) ? 1 : (variable_get('imagepicker_default_align_show', 1) && isset($user->imagepicker_default_align_show) && $user->imagepicker_default_align_show) ? 1 : 0),
        'default_fleft' => (isset($user->imagepicker_default_fleft) ? $user->imagepicker_default_fleft : variable_get('imagepicker_default_fleft', 'style="float: left"')),
        'default_fright' => (isset($user->imagepicker_default_fright) ? $user->imagepicker_default_fright : variable_get('imagepicker_default_fright', 'style="float: right"')),
        'lightbox2_enable' => (module_exists('lightbox2') && variable_get('imagepicker_lightbox2_enable', 1)),
        'lightbox2_insert' => (isset($user->imagepicker_lightbox2_insert) ? $user->imagepicker_lightbox2_insert : variable_get('imagepicker_lightbox2_insert', 'lightbox')),
        'thickbox_enable' => (module_exists('thickbox') && variable_get('imagepicker_thickbox_enable', 1)),
      ),
    );

    drupal_add_js($settings, 'setting');
    drupal_add_js($path .'/imagepicker_iframe.js');
  }

  $vars['content'] = $content;
  $vars['head_title']  = (drupal_get_title() ? strip_tags(drupal_get_title()) : variable_get('site_name', 'Drupal'));
  $vars['styles'] = drupal_get_css();
  $vars['scripts'] = drupal_get_js();
  $vars['tabs'] = theme('menu_local_tasks');
  $vars['messages'] = imagepicker_strip_messages(theme('status_messages'));
  $vars['language'] = $language;
  $template = 'imagepicker-page.tpl.php';
  $defaulttemplate = variable_get('theme_default', '');
  if ($defaulttemplate) {
    $templatepath = drupal_get_path('theme', $defaulttemplate);
    if (file_exists($templatepath .'/'. $template)) {
      $template = $templatepath .'/'. $template;
    }
    else {
      $template = $path .'/'. $template;
    }
  }
  echo theme_render_template($template, $vars);
  exit;
}

function theme_imagepicker_list($header, $rows, $max, $message="", $pref="", $suff="", $label="") {
  $output = ($label ? '<fieldset><legend>'. $label .'</legend>' : '');
  if ($rows) {
    $pager = theme('pager', NULL, $max);
    $output .= $pref . theme('table', $header, $rows) . $pager . $suff;
  }
  else {
    $output .= '<div class="messages">'. $message .'</div>';
  }
  $output .= ($label ? '</fieldset>' : '');
  return $output;

}

function theme_imagepicker_stats($header, $rows, $pref="", $suff="", $label="") {
  $output = ($label ? '<fieldset><legend>'. $label .'</legend>' : '');
  $output .= $pref . theme('table', $header, $rows) . $suff;
  $output .= ($label ? '</fieldset>' : '');
  return $output;
}

function theme_imagepicker_browser($content, $forms='', $message='', $help='', $label='') {
  $rows = $content[0];
  $max = $content[1];
  $cols = $content[2];
  $pref1 = $content[3][0];
  $pref2 = $content[3][1];
  $suff1 = $content[4][0];
  $suff2 = $content[4][1];
  $output = ($label ? '<fieldset><legend>'. $label .'</legend>' : '');
  if ($rows) {
    // forms
    if ($forms) {
      foreach ($forms AS $form) {
        $output .= $form;
      }
    }
    // help message
    if ($help) {
      $output .= '<div class="imgp_help">'. $help . '</div>';
    }
    $pager = theme('pager', NULL, $max);
    $output .= $pref1;
    $ct = 0;
    foreach ($rows AS $row) {
      $tooltip =  $row['img_name'] .': '. $row['img_title'] .' '. $row['img_description'];
      $imglink = '<img src="'. $row['imgpath']  .'" alt="'. $row['img_title'] .'" title="'. $tooltip .'" />';
      $output .= $pref2 . l($imglink, $row['imgurl'] . $row['img_id'], array('html' => TRUE)) . $suff2;
      $ct++;
      if ($cols > 0 && $ct >= $cols) {
        $output .= $suff1 . $pref1;
        $ct = 0;
      }
    }
    $output .= $suff1 . $pager;
  }
  else {
    $output .= '<div class="messages">'. $message .'</div>';
  }
  $output .= ($label ? '</fieldset>' : '');
  return $output;
}

function theme_imagepicker_fullpage($image, $source, $link) {
  $output = '<div id="imgp_page"><div id="imgp_page_img">';
  $output .= '<a href="'. $source .'" alt="'. $image['img_title'] .'" target="_blank">';
  $output .= '<img src="'. $source .'" alt="'. $image['img_title'] .'" /></a></div>';
  $output .= ($image['img_description'] ? '<div>'. nl2br($image['img_description']) .'</div>' : '');
  $output .= ($link ? '<div><a href="#" onclick="history.back()">'. t('Return to page') .'</a></div>' : '');
  $output .= '</div>';
  return $output;
}

function theme_imagepicker_quota_message($message1, $message2, $form, $label, $help) {
  $output = ($label ? '<fieldset><legend>'. $label .'</legend>' : '');
  $output .= ($message1 ? '<p class="messages">'. $message1 .'</p>' : '') ;
  $output .= ($help ? '<div class="imgp_help">' . $help . '</div>' : '');
  $output .= $form;
  $output .= ($message2 ? '<p class="messages">'. $message2 .'</p>' : '') ;
  $output .= ($label ? '</fieldset>' : '');
  return $output;
}

function theme_imagepicker_view($img, $imgpath, $info, $exifinfo='') {
  $output = '<div id="imgp_img_view">';
  $output .= ($img['img_title'] ? '<div id="imgp_img_view_title">'. $img['img_title'] .'</div>' : '');
  $output .= '<img id="imgp_img_view_img" src="'. $imgpath .'" alt="'. $img['img_title'] .'" title="'. $img['img_name'] .'" />';
  $output .= ($img['img_description'] ? '<div id="imgp_img_view_desc">'. nl2br($img['img_description']) .'</div>' : '');
  $output .= '<div>';
  $output .= t('Width')  .": ". $info['width']     ."&nbsp;&nbsp;&nbsp;";
  $output .= t('Height') .": ". $info['height']    ."&nbsp;&nbsp;&nbsp;";
  $output .= t('Type')   .": ". $info['extension'] ."&nbsp;&nbsp;&nbsp;";
  $output .= t('Size')   .": ". $info['file_size'] . '</div>';

  if ($exifinfo) {
    $output .= '<a id="imgp_trig">'. t('Show/Hide Exif Info') .'</a>';
    $output .= '<div id="imgp_targ" >';
    if (is_array($exifinfo)) {
      // using php function exif_read_data().
      foreach ($exifinfo AS $key => $section) {
        $header = array(
          array('data' => drupal_ucfirst(drupal_strtolower($key)), 'colspan' => 2),
        );
        $rows = array();
        foreach ($section as $name => $val) {
          if ($key == 'COMMENT') {
            $a = split(':', $val);
            $rows[] = array($a[0] . ':', $a[1]);
          }
          else {
            $rows[] = array($name . ': ', $val);
          }
        }
        $output .= theme('table', $header, $rows);
        unset($header);
        unset($rows);
      }
      $output .= '</div>';
    }
    else {
      // from an external source eg exiftool
      $output .= '<pre>';
      $output .= check_plain($exifinfo);
      $output .= '</pre>';
      $output .= '</div>';
    }
  }
  $output .= '</div>';
  return $output;
}

function theme_imagepicker_image_edit_header($image, $source) {
  $output = '<div class="imgp_help">'. t('Edit image details') . '</div>';
  $output .= '<div id="imgp_img_holder"><img src="'. $source .'" alt="'. check_plain($image['img_title']) .'" /></div>';
  return $output;
}

function theme_imagepicker_quota($form, $message, $label) {
  $output = ($label ? '<fieldset><legend>'. $label .'</legend>' : '');
  $output .= ($message ? '<p class="messages">'. $message .'</p>' : '') ;
  $output .= $form;
  $output .= ($label ? '</fieldset>' : '');
  return $output;
}

function theme_imagepicker_upload_progress_message($message) {
  $output = '<div id="sending" class="progress" style="display: none;">';
  $output .= '<div class="status">'. $message .'</div>';
  $output .= '<div class="bar"></div></div>';
  return $output;
}

function theme_imagepicker_user_config($form, $label='', $help='', $message1='', $message2='') {
  $output = ($label ? '<fieldset><legend>'. $label .'</legend>' : '');
  $output .= ($help ? '<div class="imgp_help">' . $help . '</div>' : '');
  $output .= ($message1 ? '<p class="messages">'. $message1 .'</p>' : '') ;
  $output .= $form;
  $output .= ($message2 ? '<p class="messages">'. $message2 .'</p>' : '') ;
  $output .= ($label ? '</fieldset>' : '');
  return $output;
}

function theme_imagepicker_user_view($view, $form1='', $form2='', $form3='') {
  $output = "";
  $output .= $view;
  $output .= '<br />';
  $output .= ($form1 ? $form1 : '') ;
  $output .= '<br />';
  $output .= ($form2 ? $form2 : '') ;
  $output .= ($form3 ? $form3 : '') ;
  return $output;
}

function theme_imagepicker_admin_view($view, $form1='', $form2='', $form3='') {
  $output = "";
  $output .= $view;
  $output .= '<br />';
  $output .= ($form1 ? $form1 : '') ;
  $output .= '<br />';
  $output .= ($form2 ? $form2 : '') ;
  $output .= ($form3 ? $form3 : '') ;
  return $output;
}

function theme_imagepicker_insert($img='', $public=FALSE, $form1='', $form2='') {
  $output = "";
  if ($img) {
    $imgpath = imagepicker_get_image_path($img, 'browser', ($public ? array('name' => $img['name'] , 'uid' => $img['uid']) : FALSE ));
    $output .= '<div class="imgp_help">'. t('Choose the settings you want, place the cursor in the Body box above and Insert image.') .'</div>';
    if ($img['img_title']) {
      $output .= '<div id="imgp_img_holder_title">'. check_plain($img['img_title']) .'</div>';
    }
    if ($img['img_description']) {
      $output .= '<div id="imgp_img_holder_description">'. nl2br($img['img_description']) .'</div>';
    }
    $output .= '<div id="imgp_img_holder">';
    $output .= '<img id="imgp_img" src="'. $imgpath .'" alt="'. check_plain($img['img_title']) .'" title="'. $img['img_name'] .'" />';
    $output .= '</div>';
    $output .= $form1;
    $output .= $form2;
  }
  return $output;
}
