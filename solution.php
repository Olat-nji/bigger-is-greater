    <?php
// Test Cases
    $words = [
        'ab',
        'bb',
        'hefg',
        'dhck',
        'dkhc',
    ];
    foreach ($words as $key => $value) {
        print_r(biggerIsGreater($value) . '<br>');
    }

    function biggerIsGreater($w)
    {
// Actual Solution
        $arr = str_split($w);
        $i = count($arr);


        for ($end = $i - 1; $end > 0; $end--) {
            if (strcmp($arr[$end - 1], $arr[$end]) < 0) {
                break;
            }
        }
        if ($end == 0) {
            return 'no answer';
        } else {
            $firstChar = $arr[$end - 1];
            $next = $end;
            for ($start = $end + 1; $start < $i; $start++) {
                if (strcmp($arr[$start], $firstChar) > 0 && strcmp($arr[$start], $arr[$next]) < 0) {
                    $next = $start;
                }
            }

            $temp = $arr[$end - 1];
            $arr[$end - 1] = $arr[$next];
            $arr[$next] = $temp;
            $arr2 = array_slice($arr, $end);
            sort($arr2);
            for ($i = 0; $i < count($arr2); $i++) {
                $arr[$end + $i] = $arr2[$i];
            }

            return implode($arr);
        }
    }
