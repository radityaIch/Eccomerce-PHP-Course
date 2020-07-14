<?php
    require_once 'lib/config.php';
    if(isset($_POST['login'])){
        $email = $koneksi->real_escape_string($_POST['login_email']);
        $password = $koneksi->real_escape_string($_POST['login_password']);

        if(!empty($email) && !empty($password)){
            $query_check = $koneksi->query("SELECT * FROM tb_user WHERE email_user = '$email'");
            if($query_check->num_rows > 0){
                $data_user = $query_check->fetch_assoc();
                $password_user = $data_user['password_user'];
                $level_user = $data_user['level_user'];
                if(password_verify($password, $password_user)){
                    $_SESSION['user_login']['level_user'] = $level_user;
                    $_SESSION['user_login']['id_user'] = $data_user['id_user'];
                    $_SESSION['user_login']['nama_user'] = $data_user['nama_user'];
                    $_SESSION['success_msg']['login'] = 'Login Successfull!';
                }else{
                    $_SESSION['error_msg']['login'] = 'Login Failed';
                }
            }else{
                $_SESSION['error_msg']['login'] = 'Incorrect Email or Password';
            }
        }else{
            $_SESSION['error_msg']['login'] = 'Email or Password cannot empty';
        }
    }
    header('location: login.php');
?>