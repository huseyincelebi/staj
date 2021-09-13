<?php

namespace APP\models\post;

use SRC\model\Database;
use PDO;


class FOLLOW_TAG_Model extends Database
{
    public function follow_tag()
    {
        if (isset($_POST['follow_tag'])) :
            $query = $this->db->prepare("INSERT INTO sy_follows(tag_id,user_id) VALUES(:tag_id,:user_id)");
            $query->execute(array(":tag_id" => $_POST['f_t_id'], ":user_id" => $_SESSION['user']['id']));
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        endif;
    }

    public function unfollow_tag()
    {
        if (isset($_POST['unfollow_tag'])) :
            $query = $this->db->prepare("DELETE FROM sy_follows WHERE tag_id='" . $_POST['f_t_id'] . "' and user_id='" . $_SESSION['user']['id'] . "'");
            $query->execute();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        endif;
    }
}
