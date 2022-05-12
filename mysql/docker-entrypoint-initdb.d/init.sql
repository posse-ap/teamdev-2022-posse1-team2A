DROP SCHEMA IF EXISTS shukatsu;

CREATE SCHEMA shukatsu;

USE shukatsu;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO
  users
SET
  email = "test@posse-ap.com",
  password = sha1("password");

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
  women_customer INT(99),
  foreign_company INT(99),
  listed_company INT(99),
  PRIMARY KEY(id)
);

INSERT INTO agent_info (es_advise,interview_support,seminer,line_consult,online_consult,women_customer,foreign_company,listed_company) VALUES 
(1,0,1,1,0,17,73,79),
(1,0,1,1,0,17,73,79),
(1,0,1,1,0,17,73,79),
(1,0,1,1,0,17,73,79),
(1,0,1,1,0,17,73,79),
(1,0,1,1,0,17,73,79),
(1,0,1,1,0,17,73,79);


-- エージェント契約情報テーブル

DROP TABLE IF EXISTS agent_contract_info;

CREATE TABLE agent_contract_info (
  id INT AUTO_INCREMENT,
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
INSERT INTO agent_contract_info (contract_date,name,url,address,representative,phone_number,email,image,text,responsible_division,cv_email)values 
("20220713","リクルート","https://job.rikunabi.com/2023/","東京","藤井裕史","849-4783-2489","ugg@gmail.com","rikunavi.png","yeahwow","execution","ugki@gmail.com"),
("20220614","マイナビ","https://job.mynavi.jp/2023/","京都","藤田裕史","523-4783-2489","ugg@gmail.com","maynavi.png","yeahwow","execution","ugki@gmail.com"),
("20220915","キャリアチケット","https://careerticket.jp/","大阪","藤岡裕史","623-4783-2489","ugg@gmail.com","careerticket.png","yeahwow","execution","ugki@gmail.com"),
("20220416","レバテックルーキー","https://rookie.levtech.jp/","福岡","藤ヶ崎裕史","624-4783-2489","ugg@gmail.com","levetech.jpg","yeahwow","execution","ugki@gmail.com"),
("20220515","type","https://typeshukatsu.jp/","栃木","藤裕史","256-4783-2489","ugg@gmail.com","img_type.png","yeahwow","execution","ugki@gmail.com"),
("20220814","ugg-inc","https://www.sonymusic.co.jp/artist/MichaelJackson/","California","藤間裕史","278-4783-2489","ugg@gmail.com","rikunavi.png","yeahwow","execution","ugki@gmail.com"),
("20220317","ujs-inc","https://marvel.disney.co.jp/","Rome","藤間裕行","836-4783-2489","ugg@gmail.com","rikunavi.png","yeahwow","execution","ugki@gmail.com");

-- 申し込み学生情報テーブル

DROP TABLE IF EXISTS student_list;

CREATE TABLE student_list (
  id INT AUTO_INCREMENT,
  apply_time DATE,
  student_name VARCHAR(200),
  student_email VARCHAR(200),
  student_phone VARCHAR(200),
  college VARCHAR(200),
  department VARCHAR(200),
  graduation_year VARCHAR(200),
  student_address VARCHAR(200),
  PRIMARY KEY(id)
);
INSERT INTO student_list (apply_time,student_name,student_email,student_phone,college,department,graduation_year,student_address) values 
("20010915","藤間裕史","htt://yuji.com","アメリカ合衆国","藤間裕史","849-4783-2489","ugg@gmail.com","picture");


-- list情報情報

DROP TABLE IF EXISTS apply_list;

CREATE TABLE apply_list (
  id INT AUTO_INCREMENT,
  PRIMARY KEY(id)

);
-- INSERT INTO student_list values (20010915,"藤間裕史","http://yuji.com","アメリカ合衆国California","藤間裕史","849-4783-2489","ugg@gmail.com","picture");