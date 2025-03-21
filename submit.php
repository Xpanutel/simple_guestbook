<?php

require_once "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if (isset($_POST["title"], $_POST["username"], $_POST["review"])) { 
        $title = $_POST["title"];
        $username = $_POST["username"];
        $review = $_POST["review"];

        if (empty($title) || empty($username) || empty($review)) { 
            echo "Необходимо заполнить все данные";
            exit();
        }

        $stmt = $conn->prepare("INSERT INTO guestbook_messages(title,name,message) VALUES (?,?,?);");
        $stmt->bind_param("sss", $title, $username, $review);

        if ($stmt->execute()) { 
            echo "Сообщение успешно отправлено на модерацию!"; 
            header("Location: index.php");
            exit();
        } else {
            echo "Произошла ошибка при добавлении сообщения. Попробуйте позже.";
        }
        $stmt->close();
    } else {
        echo "Ошибка: данные формы не были переданы.";
        exit();
    }
}

?>
