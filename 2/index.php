<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гаврилястый И. И. Группа 241-352. Лабораторная работа № 2. Вариант 7</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <div class="logo">
            <img src="images/logo.png" alt="Логотип университета">
        </div>
        <div class="info">
            <div>Гаврилястый Иван Алексеевич</div>
            <div>Группа: 241-352</div>
            <div>Лабораторная работа № 2, Вариант 7</div>
        </div>
    </header>

    <main>

        <?php
       
        $x_start = -10;      // Начальное значение аргумента
        $count = 50;         // Количество вычисляемых значений
        $step = 2;           // Шаг изменения аргумента
        $min_value = -1000;  // Минимальное значение функции (стоп-критерий)
        $max_value = 1000;   // Максимальное значение функции (стоп-критерий)
        $type = 'D';         // Тип вёрстки: 'A', 'B', 'C', 'D', или 'E'
        
        $sum = 0;
        $min_f = null;
        $max_f = null;
        $actual_count = 0;
        
        $results = [];
        
        $x = $x_start;
        
        
        for ($i = 0; $i < $count; $i++, $x += $step) {
            
            if ($x <= 10) {
                if ($x - 5 == 0) {
                    $f = 'error';  
                } else {
                    $f = 6/($x - 5)*$x - 5;
                }
            } elseif ($x > 10 && $x < 20) {
                $f = (pow($x, 2) - 1) * $x + 7;
            } else {
                $f = 4*$x + 5;
            }
            
            if ($f !== 'error') {
                $f = round($f, 3);
            }
            
            if ($f !== 'error' && ($f < $min_value || $f > $max_value)) {
                break;  
            }
            
            $results[] = ['x' => $x, 'f' => $f];
            
            if ($f !== 'error') {
                $sum += $f;
                $actual_count++;
                
                if ($min_f === null || $f < $min_f) {
                    $min_f = $f;
                }
                if ($max_f === null || $f > $max_f) {
                    $max_f = $f;
                }
            }
        }
        
        $average = ($actual_count > 0) ? round($sum / $actual_count, 3) : 0;
        
       
        echo '<h1>Табулирование функции (Вариант 7)</h1>';
        echo '<p>Тип вёрстки: <strong>' . $type . '</strong></p>';
        echo '<p>Диапазон: x от ' . $x_start . ' с шагом ' . $step . '</p>';
        echo '<hr>';
        
        switch ($type) {
            case 'A':
                echo '<div class="layout-A">';
                foreach ($results as $index => $item) {
                    $f_display = ($item['f'] === 'error') ? 'error' : $item['f'];
                    echo 'f(' . $item['x'] . ') = ' . $f_display;
                    if ($index < count($results) - 1) {
                        echo '<br>';
                    }
                }
                echo '</div>';
                break;
                
            case 'B':
                echo '<div class="layout-B"><ul>';
                foreach ($results as $item) {
                    $f_display = ($item['f'] === 'error') ? 'error' : $item['f'];
                    echo '<li>f(' . $item['x'] . ') = ' . $f_display . '</li>';
                }
                echo '</ul></div>';
                break;
                
            case 'C':
                echo '<div class="layout-C"><ol>';
                foreach ($results as $item) {
                    $f_display = ($item['f'] === 'error') ? 'error' : $item['f'];
                    echo '<li>f(' . $item['x'] . ') = ' . $f_display . '</li>';
                }
                echo '</ol></div>';
                break;
                
            case 'D':
                echo '<div class="layout-D">';
                echo '<table>';
                echo '<tr><th>№</th><th>x</th><th>f(x)</th></tr>';
                foreach ($results as $index => $item) {
                    $f_display = ($item['f'] === 'error') ? 'error' : $item['f'];
                    echo '<tr><td>' . ($index + 1) . '</td>';
                    echo '<td>' . $item['x'] . '</td>';
                    echo '<td>' . $f_display . '</td></tr>';
                }
                echo '</table></div>';
                break;
                
            case 'E':
                echo '<div class="layout-E">';
                foreach ($results as $item) {
                    $f_display = ($item['f'] === 'error') ? 'error' : $item['f'];
                    echo '<div>f(' . $item['x'] . ') = ' . $f_display . '</div>';
                }
                echo '</div>';
                break;
                
            default:
                echo '<p>Неверный тип вёрстки!</p>';
        }
        
        echo '<div class="statistics">';
        echo '<h2>Статистика вычислений</h2>';
        echo '<p><strong>Сумма всех значений:</strong> ' . round($sum, 3) . '</p>';
        echo '<p><strong>Минимальное значение:</strong> ' . ($min_f !== null ? $min_f : 'нет данных') . '</p>';
        echo '<p><strong>Максимальное значение:</strong> ' . ($max_f !== null ? $max_f : 'нет данных') . '</p>';
        echo '<p><strong>Среднее арифметическое:</strong> ' . $average . '</p>';
        echo '<p><strong>Количество вычислений:</strong> ' . $actual_count . '</p>';
        echo '</div>';
        ?>
        
    </main>

    <footer>
        <?php
        date_default_timezone_set('Europe/Moscow');
        echo 'Тип вёрстки: ' . $type . ' | Сформировано ' . date('d.m.Y в H-i-s');
        ?>
    </footer>

</body>
</html>