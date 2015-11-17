<?php
// snippet from http://stackoverflow.com/questions/3678798/codeigniter-check-for-user-session-in-every-controller
function is_logged_in() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    // We need to use $CI->session instead of $this->session
    $user = $CI->session->userdata('logged_in');
    if (!isset($user)) { return false; } else { return true; }
}
?>
