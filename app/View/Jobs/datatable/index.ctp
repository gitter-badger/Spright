<?php
foreach($dtResults as $result) {
    $this->dtResponse['aaData'][] = array(
        $result['Job']['id'],
        $result['Job']['fullname'],
        $result['Building']['code'],
        'actions',
    );
}