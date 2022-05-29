<?php
require "../../dbconnect.php";
session_start();

// 変数の初期化
$name = '';
$password = '';
$err_msg = array();

// POST送信があるかないか判定
if (!empty($_POST)) {
    // 各データを変数に格納
    $name = $_POST['name'];
    $password = $_POST['password'];

    // eメールアドレスバリデーションチェック
    // 空白チェック
    if ($name === '') {
        $err_msg['name'] = '入力必須です';
    }
    // 文字数チェック
    if (strlen($name) > 255) {
        $err_msg['name'] = '255文字で入力してください';
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
        $logincheck="select * from admin_login where name='$name';";
        $passcheck=$db->query($logincheck)->fetchAll(PDO::FETCH_ASSOC);


        if ($passcheck[0]['password'] == $password) {
            //セッションにnameを挿入する
            $_SESSION['admin_name'] = $name;
            //マイページへ遷移
            header('Location: ../adminList/adminlist.php');
            exit;
        } else {
            $err_msg['name'] = 'eメールアドレスまたはパスワードが違います';
        }
    }
}


// if (!empty($_POST)) {
//     $login = $db->prepare('SELECT * FROM login_info WHERE name=? AND password=?');
//     $login->execute(array(
//         $_POST['name'],
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
    <link rel="stylesheet" href="./adminLogin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../student/studentCSS/header.css">
    <title>test</title>
</head>

<body>
    <header>
        <section class="header_container">
            <div class="header_logo">
                <img src="../../materials/boozer_logo_white.png" alt="">
            </div>
        </section>
    </header>
    <!-- <h1>ログイン画面</h1> -->
    <main>
        <form action="./adminLogin.php" method="post">
            <div class="err_msg"><?php echo $err_msg['name']; ?></div>
            <div class="mail_address_wrapper">
                <div class="mail_address">ユーザーネーム</div>
                <input type="text" class="email" name="name">
            </div>
            <div class="err_msg"><?php echo $err_msg['password']; ?></div>
            <div class="password_title_wrapper">
                <div class="password_title">パスワード</div>
                <input type="text" name="password" class="password">
            </div>
            <div class="login_wrapper">
                <div class="login_box">
                    <input type="submit" class="login" value="LOGIN">
                </div>
            </div>
        </form>
    </main>
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
            <input type="name" name="name" required>
            <input type="password" required name="password">
            <input type="submit" value="ログイン">
        </form>
    </div>
</body>

</html> -->