<?php
    require_once 'lib/config.php';
    if(isset($_POST['signup'])){
        $fullname = $koneksi->real_escape_string ($_POST['signup_fullname']);
        $email = $koneksi->real_escape_string ($_POST['signup_email']);
        $password = $koneksi->real_escape_string ($_POST['signup_password']);
        $password = password_hash($password, PASSWORD_BCRYPT, [
            'cost' => 12
        ]);
        $phone = $koneksi->real_escape_string ($_POST['signup_phone']);
        $level_user = 'Member';

        if(!empty($fullname) && !empty($email) && !empty($password) && !empty($phone)){
            if(strlen($_POST['signup_password']) >= 8){
                $query_check = $koneksi->query("SELECT * FROM tb_user WHERE email_user = '$email'");
                if($query_check->num_rows == 0){
                    $query_register = $koneksi->query("INSERT INTO tb_user VALUES (NULL, '$fullname', '$email', '$password', '$phone','$level_user')");
                    if($query_register){
                        $_SESSION['success_msg']['signup'] = 'Register Success';
                    }else{
                        $_SESSION['error_msg']['signup'] = 'Register Failed';
                    }
                }else{
                    $_SESSION['error_msg']['signup'] = "email already used!";
                }
            }else{
                $_SESSION['error_msg']['signup'] = "Password Minimal 8 Characters.";
            }
        }else{
            $_SESSION['error_msg']['signup'] = "Please fill all field";
        }
    }
    header('location: signup.php');
?>