<?php

use SRC\model\Database;

$database = new Database();
if (isset($_GET['term'])) :
    $query = $database->db->prepare("SELECT * FROM sy_tags Where name LIKE '%" . $_GET['term'] . "%' ORDER BY name ASC");
    $query->execute();
    $tags = $query->fetchAll();
    $tag_list = array();
    foreach ($tags as $tag) :
        $tag_list[] = $tag['name'];
    endforeach;
    echo json_encode($tag_list);
endif;
