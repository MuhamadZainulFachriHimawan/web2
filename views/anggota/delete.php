<?php
require_once '../../config/connection.php';

use config\Connection;

$pdo = Connection::make();

require_once '../../models/anggota.php';
$obj = new Anggota($pdo);
$obj->delete($_GET['id']);

header("Location: index.php");
exit;
