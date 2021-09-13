<?php

namespace APP\models\post;

use SRC\model\Database;
use PDO;


class SIGN_IN_Model extends Database
{
    public function sign_in()
    {
        if (isset($_POST['sign_in'])) :
            $query = $this->db->prepare("SELECT * FROM sy_users WHERE username=? and password=?");
            $query->execute(array($_POST['s_in_username'], md5($_POST['s_in_password'])));
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($query->rowCount() > 0) {
                $_SESSION['user']['login'] = true;
                $_SESSION['user']['username'] = $result['username'];
                $_SESSION['user']['email'] = $result['email'];
                $_SESSION['user']['password'] = $result['password'];
                $_SESSION['user']['id'] = $result['id'];
                $_SESSION['user']['user_type'] = $result['user_type'];
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        endif;
    }
}
