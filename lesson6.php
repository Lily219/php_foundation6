﻿<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表が縦横に伸びてもある程度対応できるように柔軟な作りを目指してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */


 $arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];



?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>テーブル表示</title>
<style>
table {
    border:1px solid #000;
    border-collapse: collapse;
}
th, td {
    border:1px solid #000;
}
</style>
</head>
<body>
    <!-- ここにテーブル表示 -->
    <table>
   
<?php 
 //縦合計
 $row_total = [
    'r1' => array_sum($arr['r1']),
    'r2' => array_sum($arr['r2']),
    'r3' => array_sum($arr['r3'])
 ];

 //横合計
 $column_total = [
    'c1' => array_sum(array_column($arr, 'c1')),
    'c2' => array_sum(array_column($arr, 'c2')),
    'c3' => array_sum(array_column($arr, 'c3'))
 ];

//総合計
$all_total = 0;
foreach ($column_total as $total){
    $all_total = $all_total + $total;
} 

echo '<tr><td></td><td>c1</td><td>c2</td><td>c3</td><td>横合計</td></tr>';
echo '<br>';

// r1~r3の各値
for($i = 1; $i <= count($arr); $i++){
    $row_key = "r{$i}";
    echo "<tr><td>{$row_key}</td>";
 for ($j = 1; $j <= count($arr[$row_key]); $j++) {
        $column_key = "c{$j}";
        echo "<td>{$arr[$row_key][$column_key]}</td>";
    }
 //   r1~r3の横合計
   echo "<td>{$row_total[$row_key]}</td></tr>";
   echo '<br>';
}

echo '<tr><td>縦合計</td>';

// c1〜c3の縦合計
for ($j = 1; $j <= count($column_total); $j++) {
    $column_key = "c{$j}";
    echo "<td>{$column_total[$column_key]}</td>";
}

echo "<td>{$all_total}</td></tr>";
?>

</table>
</body>
</html>