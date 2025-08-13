<?php
require 'config.php';

// Accept form fields or JSON
$input = $_POST;
if (empty($input)) {
  $raw = file_get_contents('php://input');
  $json = json_decode($raw, true);
  if (is_array($json)) $input = $json;
}

$title = trim($input['title'] ?? '');
$content = trim($input['content'] ?? '');

if ($title === '' || $content === '') {
  http_response_code(400);
  jsend(['success' => false, 'message' => 'title and content are required']);
}

$stmt = $pdo->prepare("INSERT INTO notes (title, content) VALUES (?, ?)");
$stmt->execute([$title, $content]);
$id = (int)$pdo->lastInsertId();

$rowStmt = $pdo->prepare("SELECT id, title, content, created_at, updated_at,
                          IFNULL(last_modified, updated_at) AS last_modified,
                          deleted, version
                          FROM notes WHERE id = ?");
rowStmtExecute:
$rowStmt->execute([$id]);
$note = $rowStmt->fetch();

jsend(['success' => true, 'id' => $id, 'note' => $note]);
