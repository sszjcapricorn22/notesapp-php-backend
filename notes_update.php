<?php
require 'config.php';

$input = $_POST;
if (empty($input)) {
  $raw = file_get_contents('php://input');
  $json = json_decode($raw, true);
  if (is_array($json)) $input = $json;
}

$id      = isset($input['id']) ? (int)$input['id'] : 0;
$title   = trim($input['title'] ?? '');
$content = trim($input['content'] ?? '');

if ($id <= 0 || $title === '' || $content === '') {
  http_response_code(400);
  jsend(['success' => false, 'message' => 'id, title, content are required']);
}

$stmt = $pdo->prepare("UPDATE notes
                       SET title = ?, content = ?, last_modified = NOW(), version = version + 1
                       WHERE id = ?");
$stmt->execute([$title, $content, $id]);

jsend(['success' => true, 'updated' => $stmt->rowCount()]);
