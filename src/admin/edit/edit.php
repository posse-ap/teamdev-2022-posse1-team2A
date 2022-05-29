<?php
require "../../dbconnect.php";


$ageEdit = $_GET['edit'];
$agent_data = "select * from agent_info where name='$ageEdit';";
$indus_tag = "select * from tags where id between 0 and 11;";
$areas_tag = "select * from tags where id between 12 and 17;";
$favos_tag = "select * from tags where id between 18 and 24;";


$agent_infos = $db->query($agent_data)->fetchAll(PDO::FETCH_ASSOC);
$industry_tags = $db->query($indus_tag)->fetchAll(PDO::FETCH_ASSOC);
$area_tags = $db->query($areas_tag)->fetchAll(PDO::FETCH_ASSOC);
$favo_tags = $db->query($favos_tag)->fetchAll(PDO::FETCH_ASSOC);


print_r($ageEdit);
$agent_info = $agent_infos[0];





?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集ページ</title>
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="./edit.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/3ded641fb3.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <section class="header_container">admin</section>
    </header>
    <main>
        <form action="../adminDetail/adminDetail.php" method="POST">
            <section class="application_container">
                <div class="form_title">ー　エージェント企業情報編集フォーム　ー</div>
                <section class="form_wrapper">
                    <form action="" method="post">
                        <ul class="form_list">
                            <li>
                                <div class="form_item">
                                    <label for="agent_name">企業名</label>
                                    <div class="input_wrapper">
                                        <input type="text" name="name" id="agent_name" value="<?= $agent_info['name'] ?>">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_item">
                                    <label for="agent_email">メールアドレス</label>
                                    <div class="input_wrapper">
                                        <input type="email" name="email" id="agent_email" value="<?= $agent_info['email'] ?>">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_item">
                                    <label for="cv_email">CVメールアドレス</label>
                                    <div class="input_wrapper">
                                        <input type="email" name="cv_email" id="cv_email" value="<?= $agent_info['cv_email'] ?>">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_item">
                                    <label for="rep_phone">電話番号</label>
                                    <div class="input_wrapper">
                                        <input type="tel" name="phone_number" id="rep_phone" value="<?= $agent_info['phone_number'] ?>">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_item">
                                    <label for="agent_url">HP URL</label>
                                    <div class="input_wrapper">
                                        <input type="url" name="url" id="agent_url" value="<?= $agent_info['url'] ?>">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_item">
                                    <label for="intro_text">エージェント紹介文</label>
                                    <div class="input_wrapper">
                                        <textarea name="text" id="intro_text" rows="3" cols="30" value="<?= $agent_info['text'] ?>"></textarea>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_item">
                                    <label>対応可能業界</label>
                                    <div class="input_wrapper">
                                        <?php foreach ($industry_tags as $industry_tag) : ?>
                                            <div class="option_wrapper">
                                                <input type="checkbox" name="industry[]" id="gyoukai<?= $index ?>">
                                                <label for="gyoukai<?= $index ?>"><?= $industry_tag['tag'] ?></label>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_item">
                                    <label>対応地域</label>
                                    <div class="input_wrapper">
                                        <?php foreach ($area_tags as $index => $area_tag) : ?>
                                            <div class="option_wrapper">
                                                <input type="checkbox" name="area[]" id="area<?= $index ?>">
                                                <label for="area<?= $index ?>"><?= $area_tag['tag'] ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_item">
                                    <label>こだわり条件</label>
                                    <div class="input_wrapper">
                                        <?php foreach ($favo_tags as $index => $favo_tag) : ?>
                                            <div class="option_wrapper">
                                                <input type="checkbox" name="fovo[]" id="picky<?= $index ?>">
                                                <label for="picky<?= $index?>"><?= $favo_tag['tag'] ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_item">
                                    <label>内定率</label>
                                    <div class="input_wrapper">
                                        <input type="number" name="offer_rate" id="naiteiritu" value="<?= $agent_info['offer_rate'] ?>">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_item">
                                    <label>利用者数</label>
                                    <div class="input_wrapper">
                                        <input type="number" name="population" id="user_count" value="<?= $agent_info['population'] ?>">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_item">
                                    <label>保有求人数</label>
                                    <div class="input_wrapper">
                                        <input type="number" name="Num_of_firm" id="hoyuukyuujinnsuu" value="<?= $agent_info['Num_of_firm'] ?>">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_item">
                                    <label for="postal_code">住所</label>
                                    <div class="input_wrapper">
                                        <input type="text" name="address" id="postal_code" value="<?= $agent_info['address'] ?>">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </form>
                </section>
                <div class="submit_button">

                    <button type="submit">変更を保存</button>
                </div>
            </section>
        </form>
    </main>

    <script src=""></script>
</body>

</html>