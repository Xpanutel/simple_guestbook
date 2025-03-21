<?php
require_once "includes/db.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUESTBOOK</title>
    <link rel="stylesheet" href="css/styles.css?v=<?php echo filemtime('css/styles.css'); ?>">
</head>
<body>
    <!-- Шапка сайта -->
    <?php include "includes/header.php" ?>

    <!-- Основной контент -->
    <main class="main">
        <div class="container">
            <section class="intro">
                <h2 class="intro__title">Добро пожаловать!</h2>
                <p class="intro__text">Данный сайт нужен для составления отзывов о сервисах. <br>
                    Ниже предоставлена форма для написания отзывов, а под ней список всех отзывов от других пользователей.</p>
            </section>

            <!-- Форма для отправки отзыва -->
            <section class="review-form">
                <h2 class="review-form__title">Оставить отзыв</h2>
                <form action="submit.php" method="POST" class="review-form__form">
                    <div class="form-group">
                        <label for="title">Заголовок отзыва:</label>
                        <input type="text" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Ваше имя:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="review">Текст отзыва:</label>
                        <textarea id="review" name="review" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="review-form__submit">Отправить отзыв</button>
                </form>
            </section>

            <!-- Блок с отзывами -->
            <section class="reviews">
                <h2 class="reviews__title">Отзывы пользователей</h2>
                <div class="review">
                    <h3 class="review__title">Отличный сервис!</h3>
                    <p class="review__author">Автор: Иван Иванов</p>
                    <p class="review__text">Очень доволен качеством обслуживания. Всё быстро и чётко!</p>
                </div>
                <!-- Здесь будут добавляться новые отзывы -->
            </section>
        </div>
    </main>

    <!-- Подвал сайта -->
    <?php include "includes/footer.php" ?>
</body>
</html>