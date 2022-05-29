<?php
require "../../dbconnect.php";


if (isset($_POST)) {
    $chosen_compares = $_POST['compare'];

    $agent_images = array();
    $agent_names = array();
    $agent_industrys = array();
    $agent_areas = array();
    $agent_hass = array();
    $agent_rates = array();
    $agent_popus = array();



    foreach ($chosen_compares as $chosen_compare) {
        $agent_data = "select * from agent_info where name='$chosen_compare';";
        $agent_infos = $db->query($agent_data)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($agent_infos as $agent_info) {
            array_push($agent_images, $agent_info['image']);
            array_push($agent_names, $agent_info['name']);
            array_push($agent_hass, $agent_info['Num_of_firm']);
            array_push($agent_rates, $agent_info['offer_rate']);
            array_push($agent_popus, $agent_info['population']);
        }
        $agent_tag1 = "select * from tags inner join info_tags on tags.id=info_tags.tag_id where agent_name = '$chosen_compare' and tag_id between 0 and 11;";
        $agent_tag2 = "select * from tags inner join info_tags on tags.id=info_tags.tag_id where agent_name = '$chosen_compare' and tag_id between 12 and 17;";
        $first_tags = $db->query($agent_tag1)->fetchAll(PDO::FETCH_ASSOC);
        $second_tags = $db->query($agent_tag2)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($first_tags as $first_tag) {
            $industry0 = array();
            array_push($industry0, $first_tag['tag']);
        }
        // print_r($indutry0);
        array_push($agent_industrys, $industry0);
        foreach ($second_tags as $second_tag) {


            $area0 = array();
            array_push($area0, $second_tag['tag']);
        }
        array_push($agent_areas, $area0);
    }
    // print_r($agent_infos);
    // print_r($agent_industry);
}


?>





<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>compare</title>
    <!-- css -->
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="../studentCSS/header.css">
    <link rel="stylesheet" href="../studentCSS/footer.css">
    <link rel="stylesheet" href="./compare.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/3ded641fb3.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <section class="header_container">
            <div class="header_logo">
                <img src="../../materials/syukatudotcom_logo_white.png" alt="就活.com">
            </div>
            <div class="list_icon">
                <a href="#modal">
                    <i class="fa-solid fa-table-list fa-lg"></i>
                    <p>申し込み</p>
                </a>
            </div>
        </section>
        <!-- modal ここから-->
        <div class="modal_wrapper" id="modal">
            <a f="#!" class="modal_overlay"></a>
            <div class="modal_window">
                <div class="modal_content">
                    <h2>ー　リスト内容　ー</h2>
                    <section class="modal_agent_list_wrapper">
                        <section class="modal_agent_card">
                            <div class="modal_agent_name">
                                <a href="../agentDetail/agentDetail.html" target="_blank" rel="noopener noreferrer">
                                    <h3>リクナビ</h3>
                                </a>
                                <button class="modal_agent_delete">削除</button>
                            </div>
                            <div class="modal_agent_info">
                                <img src="../../materials/rikunavi.png" alt="リクナビ">
                                <p>2023年卒業予定の新卒の皆様と既卒者を対象とした学生と企業を結び付ける、新卒採用の就職情報サイトです。</p>
                            </div>
                        </section>
                        <section class="modal_agent_card">
                            <div class="modal_agent_name">
                                <a href="../agentDetail/agentDetail.html" target="_blank" rel="noopener noreferrer">
                                    <h3>リクナビ</h3>
                                </a>
                                <button class="modal_agent_delete">削除</button>
                            </div>
                            <div class="modal_agent_info">
                                <img src="../..//materials/rikunavi.png" alt="リクナビ">
                                <p>2023年卒業予定の新卒の皆様と既卒者を対象とした学生と企業を結び付ける、新卒採用の就職情報サイトです。</p>
                            </div>
                        </section>
                        <section class="modal_agent_card">
                            <div class="modal_agent_name">
                                <a href="../agentDetail/agentDetail.html" target="_blank" rel="noopener noreferrer">
                                    <h3>リクナビ</h3>
                                </a>
                                <button class="modal_agent_delete">削除</button>
                            </div>
                            <div class="modal_agent_info">
                                <img src="../../materials/rikunavi.png" alt="リクナビ">
                                <p>2023年卒業予定の新卒の皆様と既卒者を対象とした学生と企業を結び付ける、新卒採用の就職情報サイトです。</p>
                            </div>
                        </section>
                        <section class="modal_agent_card">
                            <div class="modal_agent_name">
                                <a href="../agentDetail/agentDetail.html" target="_blank" rel="noopener noreferrer">
                                    <h3>リクナビ</h3>
                                </a>
                                <button class="modal_agent_delete">削除</button>
                            </div>
                            <div class="modal_agent_info">
                                <img src="../../materials/rikunavi.png" alt="リクナビ">
                                <p>2023年卒業予定の新卒の皆様と既卒者を対象とした学生と企業を結び付ける、新卒採用の就職情報サイトです。</p>
                            </div>
                        </section>
                    </section>
                    <section class="modal_bottom">
                        <p>リストの中身を確認し、「まとめて無料申し込み」ボタンを押してください。</p>
                        <button>確認して無料申し込み</button>
                    </section>
                </div>
                <a href="#!" class="modal_close">×</a>
            </div>
        </div>
        <!-- modal ここまで -->
    </header>
    <main>
        <article>
            <div class="page_back"><button onclick="history.back()">戻る</button></div>
            <section class="compare_table_container">
                <table class="compare_table">
                    <tr class="logo">
                        <th>ロゴ</th>
                        <?php foreach ($agent_images as $agent_image) : ?>
                            <td><img src="../../materials/<?= $agent_image ?>" alt="mynavi_logo"></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr class="agent_name">
                        <th>エージェント名</th>
                        <?php foreach ($agent_names as $agent_name) : ?>
                            <td><?=$agent_name?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr class="main_industry">
                        <th>主な業界</th>
                        <?php foreach ($agent_industrys as $agent_industry) : ?>
                            <td><?=$agent_industry[0]?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr class="main_area">
                        <th>拠点地域</th>
                        <?php foreach ($agent_areas as $agent_area) : ?>
                            <td><?=$agent_area[0]?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr class="owned_job_offer_number">
                        <th>保有求人数</th>
                        <?php foreach ($agent_hass as $agent_has) : ?>
                            <td><?=$agent_has?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr class="informal_job_offer_rate">
                        <th>内定率</th>
                        <?php foreach ($agent_rates as $agent_rate) : ?>
                            <td><?=$agent_rate?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr class="interview_stlye">
                        <th>利用者数</th>
                        <?php foreach ($agent_popus as $agent_popu) : ?>
                            <td><?=$agent_popu?></td>
                        <?php endforeach; ?>
                    </tr>
                </table>
            </section>
        </article>
    </main>
    <footer>
        <ul>
            <li>プライバシーポリシー</li>
            <li>会社概要</li>
            <li>ご利用規約</li>
            <li>お問合せ</li>
        </ul>
        <div class="footer_logo">
            <img src="../../materials/boozer_logo_white.png" alt="boozer Inc.">
        </div>
    </footer>
    <script src=""></script>
</body>

</html>