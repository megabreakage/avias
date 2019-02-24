<?php
/**
 * @author Martin Njuguna
 * @version 1.0
 * @see http://iosync.co.ke/
 */
class Auth extends CI_controller {


public function index() {
  $this->load->view('login');
}

public function login_user(){
  $login_data = array(
    'username' => $_POST['username'],
    'password' => md5($_POST['password'])
  );

  $check = $this->queries->login_user($login_data);
  if($check == FALSE){
    echo json_encode(0);
  } else {
    $user_data = array(
      'fname' => $check['fname'],
      'lname' => $check['lname'],
      'username' => $check['username'],
      'role' => $check['user_role_id'],
      'email' => $check['email'],
      'loggedin' => TRUE
    );
    $this->session->set_userdata($user_data);
    echo json_encode(1);
  }
}

public function reset(){
  echo "Enter your email address to receive a password reset";
}

public function logout(){
  $this->session->sess_destroy();
  redirect('', 'refresh');
}


} ?>
