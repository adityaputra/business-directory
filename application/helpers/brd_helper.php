<?php

// snippet from http://thephpx.com/2010/05/codeigniter-helper-create-breadcrumb-from-url/
if(!function_exists('create_breadcrumb')){
function create_breadcrumb(){
  $ci = &get_instance();
  $i=1;
  $uri = $ci->uri->segment($i);
  $link = '<ol class="breadcrumb"><li><a href="'.base_url().'" target="_blank"><i class="fa fa-dashboard"></i> Home</a></li>';

  while($uri != ''){
    $prep_link = '';
  for($j=1; $j<=$i;$j++){
    $prep_link .= $ci->uri->segment($j).'/';
  }

  if($ci->uri->segment($i+1) == ''){
    $link.='<li class="active"><a href="#"><b>';
    $link.=$ci->uri->segment($i).'</b></a></li> ';
  }else{
    $link.='<li> <a href="'.site_url($prep_link).'">';
    $link.=$ci->uri->segment($i).'</a></li> ';
  }

  $i++;
  $uri = $ci->uri->segment($i);
  }
    $link .= '</ol>';
    return $link;
  }
}
?>
