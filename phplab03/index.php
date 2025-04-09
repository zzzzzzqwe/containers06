<?php

/**
 * @var string $dir Директория, содержащая изображения.
 */
$dir = 'image/';

/**
 * @var array|false $files Массив файлов из папки $dir, полученный с помощью scandir().
 *                         Если директория не найдена, возвращает false.
 */
$files = scandir($dir);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background-color: #f8f8f8;
        }
        header {
            background: #333;
            color: white;
            padding: 15px;
            font-size: 24px;
        }
        nav {
            background: #444;
            padding: 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 10px;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 10px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            transition: transform 0.3s;
        }
        .gallery img:hover {
            transform: scale(1.1);
        }
        footer {
            background: #333;
            color: white;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    Галерея изображений
</header>

<nav>
    <a href="#">Главная</a>
    <a href="#">О нас</a>
    <a href="#">Контакты</a>
</nav>

<div class="gallery">
    <?php
    /**
     * Проверяем, удалось ли получить список файлов.
     * Если да, перебираем их и выводим изображения с расширением .jpg.
     */
    if ($files !== false) {
        foreach ($files as $file) {
            /**
             * @var string $file Имя файла из директории.
             */
            if (pathinfo($file, PATHINFO_EXTENSION) == 'jpg') {
                echo "<img src='$dir$file' alt='Изображение'>";
            }
        }
    } else {
        echo "<p>error</p>";
    }
    ?>
</div>

<footer>
    © 2025 Галерея изображений
</footer>

</body>
</html>
