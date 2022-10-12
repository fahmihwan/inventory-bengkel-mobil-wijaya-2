<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'db_inventory_adi');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}
