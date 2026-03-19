<?php
date_default_timezone_set('Europe/Moscow');

$student_name = 'Гаврилястый Иван Алексеевич';
$student_group = '241-352';
$page_title = 'Гаврилястый И. А. Лабораторная работа № 4';

$cols = 4;

$structure = array(
    'PHP*HTML*CSS*SQL#Функции*Циклы*Условия',
    'Первая строка*Вторая ячейка#Третья строка*Четвертая ячейка*Пятая ячейка',
    'A*B*C*D*E#1*2#x*y*z',
    '#',
    '',
    'Одна колонка#Две*колонки#Три*разных*значения',
    'Красный*Зеленый*Синий#Кот*Пес*Лиса#PHP*8.5*CLI',
    'Начало**Пустая середина#Конец*Строки',
    'Январь*Февраль*Март#Апрель*Май*Июнь#Июль*Август*Сентябрь',
    'Функции*уменьшают*дублирование*кода#Таблицы*строятся*динамически'
);

function getTR($data, $cols)
{
    if ($data === '') {
        return '';
    }

    $arr = explode('*', $data);
    $ret = '<tr>';

    for ($i = 0; $i < $cols; $i++) {
        if (array_key_exists($i, $arr)) {
            $ret .= '<td>' . htmlspecialchars(trim($arr[$i]), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</td>';
        } else {
            $ret .= '<td></td>';
        }
    }

    return $ret . '</tr>';
}

function outTable($structure, $table_number, $cols)
{
    echo '<section class="table-card">';
    echo '<h2>Таблица №' . $table_number . '</h2>';
    echo '<p class="source">Структура: <code>' . htmlspecialchars($structure, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</code></p>';

    if ($cols == 0) {
        echo '<p class="message error">Неправильное число колонок</p>';
        echo '</section>';
        return;
    }

    if ($structure === '') {
        echo '<p class="message warning">В таблице нет строк</p>';
        echo '</section>';
        return;
    }

    $strings = explode('#', $structure);
    $datas = '';
    $has_strings = false;

    for ($i = 0; $i < count($strings); $i++) {
        if ($strings[$i] !== '') {
            $has_strings = true;
        }

        $datas .= getTR($strings[$i], $cols);
    }

    if (!$has_strings) {
        echo '<p class="message warning">В таблице нет строк с ячейками</p>';
        echo '</section>';
        return;
    }

    if ($datas) {
        echo '<table><tbody>' . $datas . '</tbody></table>';
    } else {
        echo '<p class="message warning">В таблице нет строк с ячейками</p>';
    }

    echo '</section>';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="title-block">
            <h1>Лабораторная работа 4. Пользовательские функции</h1>
            <p><?php echo $student_name; ?>, группа <?php echo $student_group; ?></p>
        </div>
        <div class="meta">
            <span>Число колонок: <?php echo $cols; ?></span>
        </div>
    </header>

    <main>
        <section class="intro">
            <p>Таблицы на странице формируются по строковым структурам вида <code>C1*C2*C3#C4*C5*C6</code> с использованием пользовательских функций <code>getTR()</code> и <code>outTable()</code>.</p>
        </section>

        <?php
        for ($i = 0; $i < count($structure); $i++) {
            outTable($structure[$i], $i + 1, $cols);
        }
        ?>
    </main>

    <footer>
        Сформировано <?php echo date('d.m.Y в H:i:s'); ?>
    </footer>
</body>
</html>
