<?php
    $NAMA_SERVER = 'localhost';
    $USERNAME = 'root';
    $PASSWORD = '';
    $DB_NAME = 'db_kasir';


    $con = mysqli_connect($NAMA_SERVER,$USERNAME,$PASSWORD,$DB_NAME);

    if (!$con) {
        echo mysqli_connect_error();
    }