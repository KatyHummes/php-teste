<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->execute([$title, $content]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Post</title>
</head>
<body>
    <h1>Criar Novo Post</h1>
    <form action="create.php" method="POST">
        <label>Título:</label><br>
        <input type="text" name="title" required><br>
        <label>Conteúdo:</label><br>
        <textarea name="content" required></textarea><br>
        <button type="submit">Criar</button>
    </form>
</body>
</html>
