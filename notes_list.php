<?php
require 'config.php';

$stmt = $pdo->prepare("SELECT id, title, content, created_at, updated_at,
                       IFNULL(last_modified, updated_at) AS last_modified,
                       deleted, version
                       FROM notes WHERE deleted = 0 ORDER BY id DESC");
$stmt->execute();
$rows = $stmt->fetchAll();

jsend([
  'data'  => $rows,
  'limit' => count($rows),
  'page'  => 1
]);
