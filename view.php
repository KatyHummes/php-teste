<script>
$(document).ready(function() {
    $('.delete-post').on('click', function(e) {
        e.preventDefault();
        let confirmDelete = confirm("Tem certeza de que deseja excluir esta postagem?");
        if (confirmDelete) {
            window.location.href = $(this).attr('href');
        }
    });
});
</script>

<?php
require 'config.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post['title']) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
    <p><a href="edit.php?id=<?= $post['id'] ?>">Editar</a> | <a href="delete.php?id=<?= $post['id'] ?>">Deletar</a></p>
    <a href="index.php">Voltar para a lista</a>
    <a href="delete.php?id=<?= $post['id'] ?>" class="delete-post">Deletar</a>
</body>
</html>
