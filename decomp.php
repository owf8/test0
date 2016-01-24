<html>
<font size="+2"><b>

<?php
session_start();
 $number = $_POST['number'];

// 数字かどうか判定
if(strval($number) != strval(intval($number))) {
  print('申し訳ありません。2～2147483646未満の整数しか判定できません。');
?>
  <a href="./input.php"><br><br>戻る</a>
<?php
} else {

// 2以上か判定
if ($number < 2) {
  print('申し訳ありません。2～2147483646未満の整数しか判定できません。');
?>
  <a href="./input.php"><br><br>戻る</a>
<?php
} else {

 // 素数判定関数定義
 function p_judge($value) {
  $i = 2;
  $sqrtv = sqrt($value);
  while ($i <= $sqrtv) {
    $amari = $value % $i;
    if($amari == 0) {
      return false;
    } else {
    $i++;
    }
  }
  return true;
 }


 // 素数判定し、素数でないなら素因数分解
  print($number . "　は　");
  if(p_judge($number) == true) {
    print('素数です！！');
    $score = $number;
      if($score > $_SESSION['high_score']) {
        $_SESSION['high_score'] = $score;
        print('<br><br>HIGH SCORE更新： ' . $score);
      }
?>
  <a href="./input.php"><br><br>再チャレンジ</a>
<?php
  } else {
    $dividend = $number;
    $j=2;
    while($j <= $dividend) {
      if($dividend % $j == 0) {
        print($j);
        $dividend = $dividend / $j;
        if($dividend != 1) {
          print(' × ');
        }
      } else {
      $j++;
      }
    }
    print("　に素因数分解されます。");
?>
  <a href="./input.php"><br><br>再チャレンジ</a>
<?php
  }
}
}
?>
</b></font>
</html>
