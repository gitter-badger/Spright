<?php


// View code - app/View/Posts/json/index.ctp
foreach ($questions as $post) {
     unset($post['question']['id']);
}


echo json_encode($questions,JSON_PRETTY_PRINT);



?>