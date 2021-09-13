<?php

namespace APP\models\post;

use SRC\model\Database;
use PDO;


class EDIT_USER_Model extends Database
{
    public function edit_user()
    {
        print_r($_POST);
        if (isset($_POST['edit_user'])) :
            if ($_POST['p_e_username'] != null and $_POST['p_e_email'] != null and $_POST['p_e_password'] != null) :
                $query = $this->db->prepare("UPDATE sy_users SET username='" . $_POST['p_e_username'] . "',email='" . $_POST['p_e_email'] . "',password='" . md5($_POST['p_e_password']) . "' WHERE id='" . $_POST['p_e_id'] . "'");
                $query->execute();
            else :
                header('Location: ../user/edit');
            endif;
            header('Location: ../user/edit');
        endif;
    }
}
