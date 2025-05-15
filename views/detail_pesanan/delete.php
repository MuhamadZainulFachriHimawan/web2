<?php
require_once '../../config/connection.php';

use config\Connection;

$pdo = Connection::make();

require_once '../../models/detail_pesanan.php';
$obj = new DetailPesanan($pdo);
$obj->delete($_GET['id']);

header("Location: index.php");
exit;
