<?php
require "../../dbconnect.php";

$agent_data="select * from agent_info;";

$agent_infos=$db->query($agent_data)->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="./agentDetail.css">
    <link rel="stylesheet" href="../studentCSS/header.css">
    <link rel="stylesheet" href="../studentCSS/footer.css">
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
                                <h3>リクナビ</h3>
                                <button class="modal_agent_delete">削除</button>
                            </div>
                            <div class="modal_agent_info">
                                <img src="../../materials/rikunavi.png" alt="リクナビ">
                                <p>2023年卒業予定の新卒の皆様と既卒者を対象とした学生と企業を結び付ける、新卒採用の就職情報サイトです。</p>
                            </div>
                        </section>
                        <section class="modal_agent_card">
                            <div class="modal_agent_name">
                                <h3>リクナビ</h3>
                                <button class="modal_agent_delete">削除</button>
                            </div>
                            <div class="modal_agent_info">
                                <img src="../../materials/rikunavi.png" alt="リクナビ">
                                <p>2023年卒業予定の新卒の皆様と既卒者を対象とした学生と企業を結び付ける、新卒採用の就職情報サイトです。</p>
                            </div>
                        </section>
                        <section class="modal_agent_card">
                            <div class="modal_agent_name">
                                <h3>リクナビ</h3>
                                <button class="modal_agent_delete">削除</button>
                            </div>
                            <div class="modal_agent_info">
                                <img src="../../materials/rikunavi.png" alt="リクナビ">
                                <p>2023年卒業予定の新卒の皆様と既卒者を対象とした学生と企業を結び付ける、新卒採用の就職情報サイトです。</p>
                            </div>
                        </section>
                        <section class="modal_agent_card">
                            <div class="modal_agent_name">
                                <h3>リクナビ</h3>
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
        <article class="detail_wrapper">
            <section class="detail_top">
                <div class="detail_agent_name">リクナビ</div>
                <img src="../../materials/rikunavi.png" alt="リクナビ">
                <p>2023年卒業予定の新卒の皆様と既卒者を対象とした学生と企業を結び付ける、新卒採用の就職情報サイトです。</p>
            </section>
            <section class="detail_bottom">
                <div class="detail_table_title">ー　基本情報　ー</div>
                <table class="detail_table">
                    <tr>
                        <td>エージェント名</td>
                        <td>リクナビ</td>
                    </tr>
                    <tr>
                        <td>主な業界</td>
                        <td>ITコンサル</td>
                    </tr>
                    <tr>
                        <td>拠点地域</td>
                        <td>東京</td>
                    </tr>
                    <tr>
                        <td>保有求人数</td>
                        <td>300社</td>
                    </tr>
                    <tr>
                        <td>内定率</td>
                        <td>80%</td>
                    </tr>
                    <tr>
                        <td>利用人数</td>
                        <td>2万人</td>
                    </tr>
                    <tr>
                        <td>面談形態</td>
                        <td>オンライン</td>
                    </tr>
                    <tr>
                        <td>応募者数上限</td>
                        <td>25社</td>
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