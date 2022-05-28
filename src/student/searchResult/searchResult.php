<?php

require "../../dbconnect.php";

$agent_data="select * from agent_info;";

$agent_infos=$db->query($agent_data)->fetchAll(PDO::FETCH_ASSOC);

session_start();
$tag_infos=$_SESSION['tags'];

?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="../../reset.css" />
    <link rel="stylesheet" href="../studentCSS/header.css" />
    <link rel="stylesheet" href="../studentCSS/footer.css" />
    <link rel="stylesheet" href="./searchResult.css">
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
            <a href="#!" class="modal_overlay"></a>
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
        <div class="search_result_title">
            <div class="search_result_title_text">ー検索結果ー</div>
            <div class="search_result_title_counts">(10件)</div>
        </div>
        <?php foreach($agent_infos as $agent_info):?>
        <div class="search_result_card">
            <img src="../../materials/<?=$agent_info['image']?>" alt="" class="search_result_card_img">
            <div class="search_result_card_explanation">
                <div class="search_result_card_title">
                    <p><?= $agent_info['name']?></p>
                </div>
                <div class="search_result_card_text">
                    <p><?=$agent_info['text']?></p>
                </div>
                <div class="search_result_card_buttons">
                    <div class="search_result_card_comparison">
                        <button class="button_comparison">比較</button>
                    </div>
                    <div class="search_result_card_cart">
                        <button>カートに入れる</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
        
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
    <script src="searchResult.js"></script>
</body>

</html>