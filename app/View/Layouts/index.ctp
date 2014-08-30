<?php

// View code - app/View/Posts/json/index.ctp
foreach ($posts as &$post) {
    unset($post['Post']['generated_html']);
}
echo json_encode(compact('posts', 'comments'));