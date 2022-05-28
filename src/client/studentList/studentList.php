<?php
require "../../dbconnect.php";

$student_data = "select * from student_list;";

$student_infos = $db->query($student_data)->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生一覧</title>
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="./studentlist.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/3ded641fb3.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <section class="header_container">admin - username</section>
    </header>
    <main>
        <section class="option_container_1">
            <div class="admin_username_box">user name</div>
            <div class="admin_search_box">
                <form action="">
                    <input type="search" name="admin_search" placeholder="キーワードを入力">
                    <input type="submit" name="admin_search_submit" value="検索">
                </form>
            </div>
        </section>
        <section class="option_container_2">
            <div class="admin_agent_sort_box">並び替える</div>
            <section class="admin_month_container">
                <i class="fa-solid fa-angle-left"></i>
                <p>2022 10月</p>
                <i class="fa-solid fa-angle-right"></i>
            </section>
        </section>
        <section class="agent_list_container">
            <table class="detail_table">
                <thead>
                    <tr>
                        <td>氏名</td>
                        <td>大学・学部</td>
                        <td>メールアドレス</td>
                        <td>申し込み日時</td>
                        <td>　</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($student_infos as $student_info):?>
                    <tr>
                        <td><?=$student_info['last_name']?><?=$student_info['first_name']?></td>
                        <td><?=$student_info['college']?></td>
                        <td><?=$student_info['student_email']?></td>
                        <td><?=$student_info['apply_time']?></td>
                        <td>
                            <form action="../studentDetail/studentDetail.php" method="GET">
                                <input type="hidden" name="detail" value="<?=$student_info['student_phone']?>">
                                <input type="submit" value="詳細">
                            </form>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <div class="footer">
                <p class="student_count">表示中：3/3人</p>
                <!-- <div class="page_count_container">
                    <i class="fa-solid fa-angle-left"></i>
                    <p class="page_count">1/1 page</p>
                    <i class="fa-solid fa-angle-right"></i>
                </div> -->
            </div>
        </section>
    </main>
    <script src=""></script>
</body>
</html>