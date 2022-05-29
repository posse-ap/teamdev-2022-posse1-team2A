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
        <section class="application_container">
            <div class="form_title">ー　エージェント企業情報編集フォーム　ー</div>
            <section class="form_wrapper">
                <form action="" method="post">
                    <ul class="form_list">
                        <li>
                            <div class="form_item">
                                <label for="agent_name">企業名</label>
                                <div class="input_wrapper">
                                    <input type="text" name="agent_name" id="agent_name">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label for="rep_name">担当者名</label>
                                <div class="input_wrapper">
                                    <input type="text" name="rep_name" id="rep_name">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label for="agent_email">メールアドレス</label>
                                <div class="input_wrapper">
                                    <input type="email" name="agent_email" id="agent_email">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label for="cv_email">CVメールアドレス</label>
                                <div class="input_wrapper">
                                    <input type="email" name="cv_email" id="cv_email">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label for="rep_phone">電話番号</label>
                                <div class="input_wrapper">
                                    <input type="tel" name="rep_phone" id="rep_phone">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label for="agent_url">HP URL</label>
                                <div class="input_wrapper">
                                    <input type="url" name="agent_url" id="agent_url">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label for="intro_text">エージェント紹介文</label>
                                <div class="input_wrapper">
                                    <textarea name="intro_text" id="intro_text" rows="3" cols="30"></textarea>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label>対応可能業界</label>
                                <div class="input_wrapper">
                                    <div class="option_wrapper">
                                        <input type="checkbox" name="responsible_division" id="gyoukai0">
                                        <label for="gyoukai0">建設・住宅・不動産</label>
                                    </div>
                                    <div class="option_wrapper">
                                        <input type="checkbox" name="responsible_division" id="gyoukai1">
                                        <label for="gyoukai1">広告・出版・マスコミ</label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label>対応地域</label>
                                <div class="input_wrapper">
                                    <div class="option_wrapper">
                                        <input type="checkbox" name="responsible_area" id="area0">
                                        <label for="area0">北海道・東海</label>
                                    </div>
                                    <div class="option_wrapper">
                                        <input type="checkbox" name="responsible_area" id="area1">
                                        <label for="area1">中部</label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label>こだわり条件</label>
                                <div class="input_wrapper">
                                    <div class="option_wrapper">
                                        <input type="checkbox" name="picky" id="picky0">
                                        <label for="picky0">ECアドバイス</label>
                                    </div>
                                    <div class="option_wrapper">
                                        <input type="checkbox" name="picky" id="picky1"><label for="picky1">面接対策</label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label>内定率</label>
                                <div class="input_wrapper">
                                    <input type="number" name="naiteiritu" id="naiteiritu">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label>利用者数</label>
                                <div class="input_wrapper">
                                    <input type="number" name="user_count" id="user_count">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label>保有求人数</label>
                                <div class="input_wrapper">
                                    <input type="number" name="hoyuukyuujinnsuu" id="hoyuukyuujinnsuu">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label for="postal_code">郵便番号</label>
                                <div class="input_wrapper">
                                    <input type="text" name="postal_code" id="postal_code">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label for="student_address">住所</label>
                                <div class="input_wrapper input_address"><p>都道府県</p>
                                    <input type="text" name="address_1" id="address_1">
                                </div>
                                <div class="input_wrapper input_address"><p>市区町村</p>
                                    <input type="text" name="address_2" id="address_2">
                                </div>
                                <div class="input_wrapper input_address"><p>番地等</p>
                                    <input type="text" name="address_3" id="address_3">
                                </div>
                                <div class="input_wrapper input_address"><p>建物名・部屋番号等</p>
                                    <input type="text" name="address_4" id="address_4">
                                </div>
                            </div>
                        </li>
                    </ul>
                </form>
            </section>
            <div class="submit_button">
                <button type="submit" class="">変更を保存</button>
            </div>
        </section>
    </main>

    <script src=""></script>
</body>
</html>