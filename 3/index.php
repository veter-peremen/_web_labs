<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ЛР3: Виртуальная клавиатура</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>Виртуальная клавиатура (ЛР3)</h1>
    </header>

    <main>
        <?php
        
        if (!isset($_GET['store'])) {
            $_GET['store'] = '';
        } 
        elseif (isset($_GET['key'])) {
            $_GET['store'] .= $_GET['key'];
        }

        echo '<div class="result">' . $_GET['store'] . '</div>';
        ?>

        <div class="keyboard">
            <?php for ($i = 0; $i <= 8; $i+=2): ?>
                <a href="?key=<?= $i ?>&store=<?= $_GET['store'] ?>" class="key"><?= $i ?></a>
            <?php endfor; ?>
        </div>

        <div class="keyboard">
            <?php for ($i = 1; $i <= 9; $i+=2): ?>
                <a href="?key=<?= $i ?>&store=<?= $_GET['store'] ?>" class="key"><?= $i ?></a>
            <?php endfor; ?>
        </div>


        <a href="?" class="reset">СБРОС</a>
    </main>

    <footer>
        <?php
        $clicks = strlen($_GET['store']);
        date_default_timezone_set('Europe/Moscow');
        echo "Нажатий: $clicks | " . date('d.m.Y в H-i-s');
        ?>
    </footer>

</body>
</html>