<?php

$name     = $_POST['name']     ?? '';
$age      = $_POST['age']      ?? '';
$phone    = $_POST['phone']    ?? '';
$email    = $_POST['email']    ?? '';
$address  = $_POST['address']  ?? '';
$question = $_POST['question'] ?? '';
$sex      = $_POST['sex']      ?? '';

$errors = [];

if ($name === '') {
  $errors[] = '名前が未入力です';
}
if ($age === '') {
  $errors[] = '年齢が未入力です';
}
if ($phone === '') {
  $errors[] = '電話番号が未入力です';
}
if ($email === '') {
  $errors[] = 'メールアドレスが未入力です';
}
if ($address === '') {
  $errors[] = '住所が未入力です';
}

if ($name !== '' && !preg_match('/^[ぁ-んァ-ン一-龥a-zA-Z]+$/u', $name)) {
  $errors[] = '名前はひらがな・カタカナ・漢字・英字のみ使用できます';
}
if ($age !== '' && ($age < 0 || $age > 150)) {
  $errors[] = '年齢は0〜150の間で入力してください';
}
if ($phone !== '' && !preg_match('/^[0-9\-]+$/', $phone)) {
  $errors[] = '電話番号は半角数字とハイフンのみ使用できます';
}
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = 'メールアドレスの形式が正しくありません';
}
if ($address !== '' && !preg_match('/^[ぁ-んァ-ン一-龥a-zA-Z]+$/u', $address)) {
  $errors[] = '住所はひらがな・カタカナ・漢字・英字のみ使用できます';
}

if (!empty($errors)) {
  $content = '<h2>入力エラーがあります</h2>';
  foreach ($errors as $error) {
    $content .= '<p style="color:red;">' . $error . '</p>';
  }
  $content .= '<a href="form.php">入力画面に戻る</a>';
} else {
    $content = '<h1>入力内容確認</h1>';
    $content .= '<p>名前：' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</p>';
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>入力内容確認</title>
</head>
<body>

<h1>入力内容確認</h1>

<p>名前：<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></p>
<p>年齢：<?php echo htmlspecialchars($age, ENT_QUOTES, 'UTF-8'); ?></p>
<p>電話番号：<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?></p>
<p>メールアドレス：<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></p>
<p>住所：<?php echo htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); ?></p>
<p>質問：<?php echo htmlspecialchars($question, ENT_QUOTES, 'UTF-8'); ?></p>
<p>性別：<?php echo htmlspecialchars($gender, ENT_QUOTES, 'UTF-8'); ?></p>

</body>
</html>