<?php

/**
 * Dinamic load CSS (header) and JSS (header/footer)
 * @author miguelra
 **/

define('DS', DIRECTORY_SEPARATOR);

if (!function_exists('_getConfig'))
{
  function _getConfig()
  {
    $CI =& get_instance();
    $CI->load->config('load');
    $config = array();
    $config['path_base'] = $CI->config->item('path_base');
    $config['path_js']   = $CI->config->item('path_js');
    $config['path_css']  = $CI->config->item('path_css');
    
    return $config;
  }
}

if(!function_exists('add_js')){
    function add_js($file='', $position = "footer")
    {
        $str = '';
        $ci = &get_instance();

        if ($position == 'header') {
          $header_js  = $ci->config->item('header_js');

          if(empty($file)){
              return;
          }

          if(is_array($file)){
              if(!is_array($file) && count($file) <= 0){
                  return;
              }
              foreach($file AS $item){
                  $header_js[] = $item;
              }
              $ci->config->set_item('header_js',$header_js);
          }else{
              $str = $file;
              $header_js[] = $str;
              $ci->config->set_item('header_js',$header_js);
          }
        } else {
          $footer_js  = $ci->config->item('footer_js');

          if(empty($file)){
              return;
          }

          if(is_array($file)){
              if(!is_array($file) && count($file) <= 0){
                  return;
              }
              foreach($file AS $item){
                  $footer_js[] = $item;
              }
              $ci->config->set_item('footer_js',$footer_js);
          }else{
              $str = $file;
              $footer_js[] = $str;
              $ci->config->set_item('footer_js',$footer_js);
          }
        }
    }
}

if(!function_exists('add_css')){
    function add_css($file='')
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');

        if(empty($file)){
            return;
        }

        if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
            foreach($file AS $item){   
                $header_css[] = $item;
            }
            $ci->config->set_item('header_css',$header_css);
        }else{
            $str = $file;
            $header_css[] = $str;
            $ci->config->set_item('header_css',$header_css);
        }
    }
}

if(!function_exists('print_header')){
    function print_header()
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css') ? $ci->config->item('header_css') : array();
        $header_js  = $ci->config->item('header_js') ? $ci->config->item('header_js') : array();

        $config = _getConfig();
        $path_css = base_url($config['path_base'].DS.$config['path_css']);
        $path_js = base_url($config['path_base'].DS.$config['path_js']);

        foreach($header_css AS $file){
            $str .= '<link rel="stylesheet" href="'.$path_css.DS.$file.'" type="text/css" />'."\n";
        }

        foreach($header_js AS $file){
            $str .= '<script type="text/javascript" src="'.$path_js.DS.$file.'"></script>'."\n";
        }

        return $str;
    }
}

if(!function_exists('print_footer')){
    function print_footer()
    {
        $str = '';
        $ci = &get_instance();
        $footer_js  = $ci->config->item('footer_js') ? $ci->config->item('footer_js') : array();

        $config = _getConfig();
        $path_js = base_url($config['path_base'].DS.$config['path_js']);

        foreach($footer_js AS $file){
            $str .= '<script type="text/javascript" src="'.$path_js.DS.$file.'"></script>'."\n";
        }

        return $str;
    }
}