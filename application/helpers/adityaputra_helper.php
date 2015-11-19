<?php
function pour($arr){
  echo "<pre>";
  print_r($arr);
  echo "</pre>";
}

function get_user_avatar_url($email){
  $CI = get_instance();
  $CI->load->model('admin/M_user');
  $user = $CI->M_user->get(array('email' => $email));
  if(!empty($user))$user = $user[0];
  // pour($CI->session);
  // pour($user); exit;
  if(empty($user['avatar_loc'])){
    return 'http://placehold.it/400/4444AA?text=BD';
  }
  else{
    return(base_url().AVATAR_DIR.$user['avatar_loc']);
  }
  // exit;
}
?>
