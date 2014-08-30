<?php

// View code - app/View/Posts/json/index.ctp
foreach ($users as $user) {
    unset($user['User']['fullname']);
}
echo json_encode(compact('users'));
?>