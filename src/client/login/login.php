<?php
require "../../dbconnect.php";
session_start();

// 変数の初期化
$email = '';
$password = '';
$err_msg = array();

// POST送信があるかないか判定
if (!empty($_POST)) {
    // 各データを変数に格納
    $email = $_POST['email'];
    $password = $_POST['password'];

    // eメールアドレスバリデーションチェック
    // 空白チェック
    if ($email === '') {
        $err_msg['email'] = '入力必須です';
    }
    // 文字数チェック
    if (strlen($email) > 255) {
        $err_msg['email'] = '255文字で入力してください';
    }
    // パスワードバリデーションチェック
    // 空白チェック
    if ($password === '') {
        $err_msg['password'] = '入力してください';
    }
    // 形式チェック
    if (!preg_match("/^[a-zA-Z0-9]+$/", $password)) {
        $err_msg['password'] = '半角英数字で入力してください';
    }
    if (empty($err_msg)) {
        $logincheck="select * from login_info where email='$email';";
        $passcheck=$db->query($logincheck)->fetchAll(PDO::FETCH_ASSOC);


        if ($passcheck[0]['password'] == $password) {
            //セッションにemailアドレスを挿入する
            $_SESSION['email'] = $email;
            //マイページへ遷移
            header('Location:../studentList/studentList.php');
            exit;
        } else {
            $err_msg['email'] = 'eメールアドレスまたはパスワードが違います';
        }
    }
}


// if (!empty($_POST)) {
//     $login = $db->prepare('SELECT * FROM login_info WHERE email=? AND password=?');
//     $login->execute(array(
//         $_POST['email'],
//         sha1($_POST['password'])
//     ));
//     $user = $login->fetch();

//     if ($user) {
//         $_SESSION = array();
//         $_SESSION['user_id'] = $user['id'];
//         $_SESSION['time'] = time();
//         header('Location: http://' . $_SERVER['HTTP_HOST'] . '/client/studentList/studentList.php');
//         exit();
//     } else {
//         $error = 'fail';
//     }
// }
?>

<!DOCTYPE html>

<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>

<body>
    <h1>ログイン画面</h1>
    <form action="./login.php" method="post">
        <div class="err_msg"><?php echo $err_msg['email']; ?></div>
        <label for=""><span>メールアドレス</span>
            <input type="email" name="email" id=""><br>
        </label>
        <div class="err_msg"><?php echo $err_msg['password']; ?></div>
        <label for=""><span>パスワード</span>
            <input type="text" name="password" id=""><br>
        </label>
        <input type="submit" value="送信">
    </form>
</body>

</html>




<!-- <!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div>
        <h1>就活エージェントログイン</h1>
        <form action="./login.php" method="POST">
            <input type="email" name="email" required>
            <input type="password" required name="password">
            <input type="submit" value="ログイン">
        </form>
    </div>
</body>

</html> -->