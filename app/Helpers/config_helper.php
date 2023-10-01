<?php

function get_config_db($nama){
    $db = db_connect();
    $data = $db->table('tbl_config')->select('value')
        ->where('nama', $nama)->get()->getRow();
    return $data->value;
}

function isCanEntriNilai() {
    $dateNow = date('Y-m-d');
    $data = false;
    if (get_config_db('APP_BATAS_ENTRI') > $dateNow) {
        $data = true;
    }
    return $data;
}

