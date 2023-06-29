<?php

const DB_USER = "ECLBDIT203";
const DB_PASSWORD = "@jxD9IKa!001";
const DB_DATABASE = "bdengcomp_high";

$conn = oci_connect(DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
