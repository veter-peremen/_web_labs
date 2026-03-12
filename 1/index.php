<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <?php
        date_default_timezone_set('Europe/Moscow');

        $page_title = "Гаврилястый Иван. Лабораторная работа 1.";
        $current_page = "index.php"; 
    ?>
    <title><?php echo $page_title; ?></title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; font-size: 16px; color: #333; }
        header {
            position: fixed; top: 0; left: 0; width: 100%; height: 60px;
            background-color: #006400; color: #fff;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 20px; box-sizing: border-box; z-index: 1000;
        }
        footer {
            position: fixed; bottom: 0; left: 0; width: 100%; height: 40px;
            background-color: #333333; color: #cccccc;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px; z-index: 1000;
        }
        nav a { color: #fff; text-decoration: none; margin-right: 15px; }
        nav a:hover { text-decoration: underline; }
        .selected_menu { font-weight: bold; color: #ffeb3b !important; }
        
        main { padding: 80px 20px 60px 20px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        td, th { border: 1px solid #ddd; padding: 8px; text-align: left; }
        img { max-width: 300px; height: auto; border: 1px solid #ccc; }
        h1 { color: #006400; }
        h2 { color: #555; }
    </style>
</head>
<body>

    <header>
        <div>Мой Сайт на PHP</div>
        <nav>
           <?php 
                $link = "index.php"; 
                $text = "Главная"; 
                $class = ($current_page == "index.php") ? "selected_menu" : ""; 
            ?>
            <a href="<?php echo $link; ?>"<?php echo ' class="' . $class . '">' . $text; ?></a>
            
            <?php 
                $link = "page2.php"; 
                $text = "Страница 2"; 
                $class = ($current_page == "page2.php") ? "selected_menu" : ""; 
            ?>
            <a href="<?php echo $link; ?>"<?php echo ' class="' . $class . '">' . $text; ?></a>
            
            <?php 
                $link = "page3.php"; 
                $text = "Страница 3"; 
                $class = ($current_page == "page3.php") ? "selected_menu" : ""; 
            ?>
            <a href="<?php echo $link; ?>"<?php echo ' class="' . $class . '">' . $text; ?></a>
        </nav>
    </header>

    <main>
        <h1>Лабораторная работа 1. Конвертация статического контента в динамический.</h1>
        <h2>Раздел 1: Основы PHP</h2>
        <p>
            Когда-то в России и правда жило беспечальное юное поколение, которое улыбнулось лету, морю и солнцу – и выбрало «Пепси». 
            Сейчас уже трудно установить, почему это произошло. Наверно, дело было не только в замечательных вкусовых качествах этого напитка. 
            И не в кофеине, который заставляет ребятишек постоянно требовать новой дозы, с детства надежно вводя их в кокаиновый фарватер. 
            И даже не в банальной взятке – хочется верить, что партийный бюрократ, от которого зависело заключение контракта, просто взял и 
            полюбил эту темную пузырящуюся жидкость всеми порами своей разуверившейся в коммунизме души. 
            Скорей всего, причина была в том, что идеологи СССР считали, что истина бывает только одна. 
            Поэтому у поколения «П» на самом деле не было никакого выбора, и дети советских семидесятых выбирали «Пепси» точно так же, как их родители выбирали Брежнева. 
        </p>

        <h2>Раздел 2: Динамическая таблица</h2>
        <table>
            <?php echo '<tr><th>Заголовок 1</th><th>Заголовок 2</th><th>Заголовок 3</th></tr>'; ?>
            
            <tr>
                <td><?php echo "Данные"; ?></td>
                <td><?php echo "Ячейка"; ?></td>
                <td><?php echo "Тест"; ?></td>
            </tr>
        </table>

        <h2>Раздел 3: Динамические изображения</h2>
        <p>Обновите страницу, чтобы увидеть смену фото (зависит от четности секунды):</p>
        
        <?php

            $photo_suffix = date('s') % 2 + 1; 
        ?>
        <img src="photos/img<?php echo $photo_suffix; ?>.jpg" alt="Меняющаяся фотография">
        
        <img src="photos/img1.jpg" alt="Статичное фото">
    </main>

    <footer>
        Сформировано <?php echo date('d.m.Y в H-i-s'); ?>
    </footer>

</body>
</html>