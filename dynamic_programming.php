<?php
// https://paiza.jp/poh/kirishima

fscanf(STDIN, "%d", $num_people);
fscanf(STDIN, "%d", $num_company);

$memo = array();
$memo[0] = 0;   // 該当の人数をそのまま入れる判定時に別処理にならなくて良いように初期値を準備

for ($i = 0; $i < $num_company; $i++) {
    $memo_tmp = $memo;  // 判定用の配列を用意しておくほうが処理速度が早い（foreachのループ毎に判定対象の配列の大きさが一定）
    fscanf(STDIN, "%d %d", $people, $cost);

    foreach ($memo as $key => $value) {
        if (!array_key_exists($key+$people, $memo_tmp)  || $memo_tmp[$key+$people] > $value + $cost) {
            $memo[$key+$people] = $value + $cost;
        }
    }
}

asort($memo);
foreach ($memo as $key => $value) {
    if ($key < $num_people) {
        continue;
    }
    echo $value;
    break;
}
