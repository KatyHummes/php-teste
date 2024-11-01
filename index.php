<?php
require 'config.php';

$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Postagens</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Postagens</h1>
    <a href="create.php">Criar Novo Post</a>
    <ul>
        <?php foreach ($posts as $post): ?>
            <li>
                <a href="view.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
