<?php

$a_fibonachi[0][0] = 1;
$a_fibonachi[1][0] = 1;
$i_sum = 0;

for($j=0; $j<6; $j++){
    for ($i=0; $i<6; $i++){
        // First two elements are already filled.
        if($j===0 && $i<2)
            continue;

        // Fills array.
        $i_term_a = $i-2 >= 0 ? $a_fibonachi[$i-2][$j] : $a_fibonachi[5+$i-1][$j-1];
        $i_term_b = $i-1 >= 0 ? $a_fibonachi[$i-1][$j] : $a_fibonachi[5][$j-1];
        $a_fibonachi[$i][$j] = $i_term_a + $i_term_b;

        // Calculates sum.
        if ($i+$j === 5)
            $i_sum += $a_fibonachi[$i][$j];
    }
}

// Displays result.
echo '<table>';
for($i=0; $i<6; $i++){
    echo '<tr>';
    for ($j=0; $j<6; $j++){
        echo '<td style="border: 1px solid blue">'.$a_fibonachi[$i][$j].'</td>';
    }
    echo '</tr>';
}
echo '</table><br>';

echo 'Sum = '.$i_sum;
