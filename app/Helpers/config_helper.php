<?php

function get_config_db($nama){
    $db = db_connect();
    $data = $db->table('tbl_config')->select('value')
        ->where('nama', $nama)->get()->getRow();
    return $data->value;
}

