DROP SCHEMA IF EXISTS shukatsu;

CREATE SCHEMA shukatsu;

USE shukatsu;

DROP TABLE IF EXISTS login_info;

CREATE TABLE login_info
(
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
INSERT INTO login_info (email,password) values 
("rikunavi@gmail.com","aaa"),
("mainavi@gmail.com","bbb"),
("levetech@gmail.com","ccc"),
("careerticket@gmail.com","ddd"),
("type@gmail.com","eee"),
("careerstart@gmail.com","fff"),
("irodas@gmail.com","ggg"),
("jobspring@gmail.com","hhh"),
("athlete@gmail.com","iii"),
("kyarisen@gmail.com","jjj"),
("neo@gmail.com","kkk");

DROP TABLE IF EXISTS admin_login;

CREATE TABLE admin_login
(
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
INSERT INTO admin_login (name,password) values 
("craftbeer","cracrayeah");


DROP TABLE IF EXISTS events;

CREATE TABLE events (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO events SET title = "666";
INSERT INTO events SET title = "yuji";
INSERT INTO events SET title = "ゆうじ";
INSERT INTO events SET title = "ユウジ";

-- エージェント情報テーブル

DROP TABLE IF EXISTS agent_info;

CREATE TABLE agent_info
(
  id INT AUTO_INCREMENT,
  es_advise INT,
  interview_support INT,
  seminer INT,
  line_consult INT,
  online_consult INT,
  offer_rate INT(99),
  population INT(99),
  Num_of_firm INT(99),
  women_customer INT(99),
  foreign_company INT(99),
  listed_company INT(99),
  contract_date DATE,
  name VARCHAR(200),
  url VARCHAR(200),
  address VARCHAR(200),
  representative VARCHAR(200),
  phone_number VARCHAR(200),
  email VARCHAR(200),
  image VARCHAR(200),
  text VARCHAR(200),
  responsible_division VARCHAR(200),
  cv_email VARCHAR(200),
  PRIMARY KEY(id)
);

INSERT INTO agent_info (es_advise,interview_support,seminer,line_consult,online_consult,offer_rate,population,Num_of_firm,women_customer,foreign_company,listed_company,contract_date,name,url,address,representative,phone_number,email,image,text,responsible_division,cv_email) VALUES 
(1,0,1,1,0,30,30000,900,30,110,20,"20220713","リクナビ","https://job.rikunabi.com/2023/","東京","藤井裕史","849-4783-2489","rikunavi@gmail.com","rikunavi.png","yeahwow","execution","ugki@gmail.com"),
(1,0,1,1,0,40,60000,100,20,60,40,"20220614","マイナビ","https://job.mynavi.jp/2023/","京都","藤田裕史","523-4783-2489","mainavi@gmail.com","maynavi.png","yeahwow","execution","ugki@gmail.com"),
(1,0,1,1,0,50,10000,800,50,50,80,"20220915","キャリアチケット","https://careerticket.jp/","大阪","藤岡裕史","623-4783-2489","careerticket@gmail.com","careerticket.png","yeahwow","execution","ugki@gmail.com"),
(1,0,1,1,0,60,90000,200,90,80,10,"20220416","レバテックルーキー","https://rookie.levtech.jp/","福岡","藤ヶ崎裕史","624-4783-2489","levetech@gmail.com","levetech.jpg","yeahwow","execution","ugki@gmail.com"),
(1,0,1,1,0,70,70000,700,10,90,40,"20220515","type","https://typeshukatsu.jp/","栃木","藤裕史","256-4783-2489","type@gmail.com","img_type.png","yeahwow","execution","ugki@gmail.com"),
(1,0,1,1,0,80,20000,300,130,30,60,"20220814","キャリアスタート","https://www.sonymusic.co.jp/artist/MichaelJackson/","California","藤間裕史","278-4783-2489","careerstart@gmail.com","career start.png","yeahwow","execution","ugki@gmail.com"),
(1,0,1,1,0,90,50000,400,10,20,50,"20220317","イロダスサロン","https://marvel.disney.co.jp/","Rome","藤間裕行","836-4783-2489","irodas@gmail.com","irodas.jpg","yeahwow","execution","ugki@gmail.com"),
(1,0,1,1,0,90,40000,600,40,50,70,"20220317","Job Spring","https://marvel.disney.co.jp/","Rome","藤間裕尾","836-4783-2489","jobspring@gmail.com","Job spring.png","yeahwow","execution","ugki@gmail.com"),
(1,0,1,1,0,90,80000,500,50,70,60,"20220317","アスリートエージェント","https://marvel.disney.co.jp/","Rome","藤間裕紀","836-4783-2489","athlete@gmail.com","athleteAgent.jpg","yeahwow","execution","ugki@gmail.com"),
(1,0,1,1,0,90,5000,1000,60,20,40,"20220317","キャリセン","https://marvel.disney.co.jp/","Rome","藤間裕吾","836-4783-2489","kyarisen@gmail.com","kyarisen.png","yeahwow","execution","ugki@gmail.com"),
(1,0,1,1,0,90,7000,900,70,30,70,"20220317","neo","https://marvel.disney.co.jp/","Rome","藤間裕須","836-4783-2489","neo@gmail.com","neo.png","yeahwow","execution","ugki@gmail.com");


-- エージェント契約情報テーブル

-- DROP TABLE IF EXISTS agent_contract_info;

-- CREATE TABLE agent_contract_info (
--   id INT AUTO_INCREMENT,
--   contract_date DATE,
--   name VARCHAR(200),
--   url VARCHAR(200),
--   address VARCHAR(200),
--   representative VARCHAR(200),
--   phone_number VARCHAR(200),
--   email VARCHAR(200),
--   image VARCHAR(200),
--   text VARCHAR(200),
--   responsible_division VARCHAR(200),
--   cv_email VARCHAR(200),
--   PRIMARY KEY(id)
-- );
-- INSERT INTO agent_contract_info (contract_date,name,url,address,representative,phone_number,email,image,text,responsible_division,cv_email)values 
-- ("20220713","リクルート","https://job.rikunabi.com/2023/","東京","藤井裕史","849-4783-2489","ugg@gmail.com","rikunavi.png","yeahwow","execution","ugki@gmail.com"),
-- ("20220614","マイナビ","https://job.mynavi.jp/2023/","京都","藤田裕史","523-4783-2489","ugg@gmail.com","maynavi.png","yeahwow","execution","ugki@gmail.com"),
-- ("20220915","キャリアチケット","https://careerticket.jp/","大阪","藤岡裕史","623-4783-2489","ugg@gmail.com","careerticket.png","yeahwow","execution","ugki@gmail.com"),
-- ("20220416","レバテックルーキー","https://rookie.levtech.jp/","福岡","藤ヶ崎裕史","624-4783-2489","ugg@gmail.com","levetech.jpg","yeahwow","execution","ugki@gmail.com"),
-- ("20220515","type","https://typeshukatsu.jp/","栃木","藤裕史","256-4783-2489","ugg@gmail.com","img_type.png","yeahwow","execution","ugki@gmail.com"),
-- ("20220814","ugg-inc","https://www.sonymusic.co.jp/artist/MichaelJackson/","California","藤間裕史","278-4783-2489","ugg@gmail.com","rikunavi.png","yeahwow","execution","ugki@gmail.com"),
-- ("20220317","ujs-inc","https://marvel.disney.co.jp/","Rome","藤間裕行","836-4783-2489","ugg@gmail.com","rikunavi.png","yeahwow","execution","ugki@gmail.com");


-- 申し込み数計測テーブル

DROP TABLE IF EXISTS agent_count;

CREATE TABLE agent_count (
  id INT AUTO_INCREMENT,
  apply_time DATETIME DEFAULT CURRENT_TIMESTAMP,
  agent_name VARCHAR(300),
  PRIMARY KEY(id)
);
INSERT INTO agent_count (apply_time,agent_name) values 
("20010915","リクナビ"),
("20010915","マイナビ"),
("20010915","マイナビ"),
("20010915","マイナビ"),
("20010915","マイナビ"),
("20010915","リクナビ"),
("20010915","リクナビ"),
("20010915","レバテックルーキー"),
("20010915","レバテックルーキー"),
("20010915","レバテックルーキー"),
("20010915","キャリアチケット"),
("20010915","type"),
("20010915","type");

DROP TABLE IF EXISTS student_list;

CREATE TABLE student_list (
  id INT AUTO_INCREMENT,
  apply_time DATETIME DEFAULT CURRENT_TIMESTAMP,
  last_name VARCHAR(200),
  first_name VARCHAR(200),
  student_email VARCHAR(200),
  student_phone VARCHAR(200),
  birth_year VARCHAR(200),
  birth_month VARCHAR(200),
  birth_day VARCHAR(200),
  college VARCHAR(200),
  faculty VARCHAR(200),
  department VARCHAR(200),
  graduation_year VARCHAR(200),
  post_code VARCHAR(200),
  address1 VARCHAR(200),
  address2 VARCHAR(200),
  address3 VARCHAR(200),
  address4 VARCHAR(200),
  PRIMARY KEY(id)
);
INSERT INTO student_list (last_name,first_name,student_email,student_phone,birth_year,birth_month,birth_day,college,faculty,department,graduation_year,post_code,address1,address2,address3,address4) values 
("藤間","裕史","ugkirin@gmail.com","080-4432-3456","2001","9","15","スタンフォード大学","CS","CS","24","3930483","東京都","港区","3-4-23","グランドメゾン"),
("井戸","宗達","sohtatsu@gmail.com","090-3422-3996","2001","11","28","ハーバード大学","経済","経済","24","3648902","東京都","渋谷区","2-5-78","スペシャルタウン"),
("尾関","なな海","nanami@gmail.com","080-1312-1246","2000","12","9","東京大学","商","商","24","3289532","東京都","千代田区","2-4-67","ゴッドバレー"),
("西山","直樹","naoki@gmail.com","030-4552-3456","2001","5","10","N予備校","tiktok","tiktok","24","2364689","栃木県","栃木市","6-2-45","中田荘");



-- 学生が申し込んだエージェントテーブル

DROP TABLE IF EXISTS apply_agent;

CREATE TABLE apply_agent (
  id INT AUTO_INCREMENT,
  agent VARCHAR(200),
  PRIMARY KEY(id)
);
INSERT INTO apply_agent (agent) values 
("リクナビ"),
("マイナビ"),
("キャリアチケット"),
("レバテックルーキー"),
("type"),
("キャリアスタート"),
("イロダスサロン"),
("Job Spring"),
("アスリートエージェント"),
("キャリセン"),
("neo");



DROP TABLE IF EXISTS student_tags;

CREATE TABLE student_tags (
  id INT AUTO_INCREMENT,
  tag_id INT(99),
  email VARCHAR(200),
  PRIMARY KEY(id)
);

INSERT INTO student_tags (tag_id,email) values 
(1,"ugkirin@gmail.com"),
(2,"ugkirin@gmail.com"),
(3,"ugkirin@gmail.com"),
(4,"ugkirin@gmail.com"),
(5,"ugkirin@gmail.com"),
(6,"ugkirin@gmail.com"),
(7,"ugkirin@gmail.com"),
(8,"sohtatsu@gmail.com"),
(9,"sohtatsu@gmail.com"),
(10,"sohtatsu@gmail.com"),
(11,"sohtatsu@gmail.com"),
(1,"nanami@gmail.com"),
(3,"nanami@gmail.com"),
(5,"nanami@gmail.com"),
(7,"nanami@gmail.com"),
(9,"nanami@gmail.com"),
(11,"nanami@gmail.com"),
(2,"naoki@gmail.com"),
(4,"naoki@gmail.com"),
(6,"naoki@gmail.com"),
(8,"naoki@gmail.com"),
(10,"naoki@gmail.com");



-- 検索タグテーブル

DROP TABLE IF EXISTS tags;

CREATE TABLE tags (
  id INT AUTO_INCREMENT,
  tag VARCHAR(200),
  PRIMARY KEY(id)
);
INSERT INTO tags (tag) values 
("建設・住宅・不動産"),
("広告・出版・マスコミ"),
("金融・銀行"),
("医療・福祉"),
("旅行・観光"),
("機械"),
("情報処理・ソフトウェア・ゲームソフト"),
("水産・食品"),
("商社"),
("調査・コンサルタント"),
("官公庁・団体"),
("北海道・東北"),
("中部"),
("関東"),
("近畿"),
("中国・四国"),
("九州・沖縄"),
("ECアドバイス"),
("面接対策"),
("LINE相談"),
("オンライン面談"),
("海外で働きたい"),
("経験値の高い担当者が多い"),
("大手企業で働きたい");




DROP TABLE IF EXISTS info_tags;

CREATE TABLE info_tags (
  id INT AUTO_INCREMENT,
  tag_id INT(99),
  agent_name VARCHAR(200),
  PRIMARY KEY(id)
);
INSERT INTO info_tags (tag_id,agent_name) values 
(1,"リクナビ"),
(2,"マイナビ"),
(3,"レバテックルーキー"),
(4,"キャリアチケット"),
(5,"type"),
(6,"リクナビ"),
(7,"マイナビ"),
(8,"レバテックルーキー"),
(9,"キャリアチケット"),
(10,"type"),
(11,"リクナビ"),
(12,"リクナビ"),
(13,"リクナビ"),
(14,"レバテックルーキー"),
(15,"type"),
(16,"マイナビ"),
(17,"キャリアチケット"),
(18,"マイナビ"),
(19,"レバテックルーキー"),
(20,"キャリアチケット"),
(21,"リクナビ"),
(22,"マイナビ"),
(23,"type");










