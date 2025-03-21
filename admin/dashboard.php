<?php
require_once "../includes/db.php";

// Обработка подтверждения отзыва
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve'])) {
    $id = $_POST['id'];
    $sql = "UPDATE guestbook_messages SET is_published = TRUE WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Обработка удаления отзыва
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM guestbook_messages WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Получение списка отзывов на модерацию
$sql = "SELECT * FROM guestbook_messages WHERE is_published = FALSE;";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<h1>Список отзывов на модерацию</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Имя</th>
            <th>Сообщение</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($res = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($res['id']) ?></td>
                <td><?= htmlspecialchars($res['title']) ?></td>
                <td><?= htmlspecialchars($res['name']) ?></td>
                <td><?= htmlspecialchars($res['message']) ?></td>
                <td>
                    <!-- Форма для подтверждения -->
                    <form method="POST" action="" style="display: inline;">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($res['id']) ?>">
                        <button type="submit" name="approve">Подтвердить</button>
                    </form>

                    <!-- Форма для удаления -->
                    <form method="POST" action="" style="display: inline;">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($res['id']) ?>">
                        <button type="submit" name="delete" onclick="return confirm('Вы уверены, что хотите удалить этот отзыв?');">Удалить</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>