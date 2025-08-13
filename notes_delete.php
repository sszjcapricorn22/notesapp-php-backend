<?php
require 'config.php';

$input = $_POST;
if (empty($input)) {
  $raw = file_get_contents('php://input');
  $json = json_decode($raw, true);
  if (is_array($json)) $input = $json;
}

$id = isset($input['id']) ? (int)$input['id'] : 0;
if ($id <= 0) {
  http_response_code(400);
  jsend(['success' => false, 'message' => 'id is required']);
}

$stmt = $pdo->prepare("UPDATE notes SET deleted = 1, last_modified = NOW() WHERE id = ?");
$stmt->execute([$id]);

jsend(['success' => true, 'deleted' => $stmt->rowCount()]);
