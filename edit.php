<?php
require 'config.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
    $stmt->execute([$title, $content, $id]);

    header("Location: view.php?id=" . $id);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Post</title>
</head>
<body>
    <h1>Editar Post</h1>
    <form action="edit.php?id=<?= $id ?>" method="POST">
        <label>Título:</label><br>
        <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required><br>
        <label>Conteúdo:</label><br>
        <textarea name="content" required><?= htmlspecialchars($post['content']) ?></textarea><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
