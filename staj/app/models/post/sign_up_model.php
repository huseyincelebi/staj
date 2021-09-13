<?php

namespace APP\models\post;

use SRC\model\Database;
use PDO;


class SIGN_UP_Model extends Database
{
    public function sign_up()
    {
        if (isset($_POST['sign_up'])) :
            if ($_POST['s_up_username'] != null and $_POST['s_up_email'] != null and $_POST['s_up_password'] != null) :
                $query = $this->db->prepare("INSERT INTO sy_users(username,email,password) VALUES(:username,:email,:password)");
                $query->execute(array(":username" => $_POST['s_up_username'], ":email" => $_POST['s_up_email'], ":password" => md5($_POST['s_up_password'])));
            else :
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            endif;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        endif;
    }
}
