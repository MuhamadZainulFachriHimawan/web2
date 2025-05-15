<?php
require_once '../../config/connection.php';

use config\Connection;

$pdo = Connection::make();

require_once '../../models/jenis_produk.php';
$obj = new JenisProduk($pdo);
$obj->delete($_GET['id']);

header("Location: index.php");
exit;
