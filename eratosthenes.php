<?php
/**
 * エラトステネスの篩
 */

$max = (int)fgets(STDIN);
$limit = (int)sqrt($max);
$org_list = range(2, $max);

for ($i = 0; $i < count($org_list); $i++) {
    if ($limit < $i) {
        break;
    }

    if ($org_list[$i] == null) {
        continue;
    }

    for ($j = $i + 1; $j < count($org_list); $j++) {
        if ($org_list[$j] == null) {
            continue;
        }

        if ($org_list[$j] % $org_list[$i] === 0) {
            $org_list[$j] = null;
        }
    }
}

// 歯抜けを削除
$prime_list = array_merge(array_filter($org_list));

// 結果表示
$num_prime = count($prime_list);
echo "max:{$max}, num:{$num_prime}\n";
foreach ($prime_list as $value) {
    echo "{$value} ";
}
