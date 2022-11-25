CREATE TABLE members(
    mem_id          INT        NOT NULL AUTO_INCREMENT,
    mem_bunrui      INT             NOT NULL,
    mem_name        VARCHAR(200)    NOT NULL,
    mem_familyname  VARCHAR(100)    NOT NULL,
    mem_firstname   VARCHAR(100)    NOT NULL,
    mem_mail        VARCHAR(200)    NOT NULL,
    mem_pass        VARCHAR(200)    NOT NULL,
    mem_place       VARCHAR(200),
    mem_comment     VARCHAR(200) DEFAULT "よろしくお願いします。",
    mem_img        BLOB,
    PRIMARY KEY(mem_id)
);
CREATE TABLE shohins(
    shohin_id       BIGINT(10)     NOT NULL AUTO_INCREMENT,
    shohin_ISBN     BIGINT(13),
    shohin_bookcode BIGINT(13),
    shohin_mei      VARCHAR(200)    NOT NULL,
    shohin_bunrui   VARCHAR(200)    NOT NULL,
    hanbai_bi       DATE            NOT NULL,
    shohin_kakaku   INT          NOT NULL,
    shohin_writer   VARCHAR(200),
    shohin_conpany  VARCHAR(200),
    PRIMARY KEY(shohin_id)
);
CREATE TABLE shohindetails(
    shohin_id BIGINT NOT NULL,
    shohindetail_id BIGINT NOT NULL,
    shohin_img MEDIUMBLOB,
    image_name VARCHAR(256),
    image_type  VARCHAR(64),
    image_size  INT,
    created_at  DATETIME,
    KEY(shohindetail_id),
    PRIMARY KEY(shohin_id,shohindetail_id),
    FOREIGN KEY(shohin_id)
    REFERENCES shohins(shohin_id)
);
CREATE TABLE buy(
    buy_id      INT             NOT NULL AUTO_INCREMENT,
    mem_mail    VARCHAR(200)    NOT NULL,
    buy_date    DATE            NOT NULL,
    buy_total   INT             NOT NULL,
    PRIMARY KEY(buy_id),
    FOREIGN KEY(mem_mail)
    REFERENCES members(mem_mail)
);
CREATE TABLE buydetails(
    buy_id          INT     NOT NULL,
    buy_detailsid   INT     NOT NULL,
    shohin_id       BIGINT  NOT NULL,
    shohin_count    INT     NOT NULL,
    PRIMARY KEY(buy_id,buy_detailsid),
    FOREIGN KEY(buy_id)
    REFERENCES buy(buy_id),
    FOREIGN KEY(shohin_id)
    REFERENCES shohins(shohin_id)
);
CREATE TABLE carts(
    mem_mail        VARCHAR(200)    NOT NULL,
    shohin_id       BIGINT          NOT NULL,
    shohin_count    INT             NOT NULL,
    buy_flag        INT             NOT NULL,
    PRIMARY KEY(mem_mail,shohin_id),
    FOREIGN KEY(mem_mail)
    REFERENCES members(mem_mail),
    FOREIGN KEY(shohin_id)
    REFERENCES shohins(shohin_id)
);
CREATE TABLE tweets(
    tweets_id           INT        NOT NULL AUTO_INCREMENT,
    mem_mail            VARCHAR(200)    NOT NULL,
    tweets_contents     VARCHAR(200)    NOT NULL,
    tweets_date         DATE            NOT NULL,
    shohin_id           BIGINT         NOT NULL,
    good                INT          NOT NULL DEFAULT 0,
    bad                 INT          NOT NULL DEFAULT 0,
    PRIMARY KEY(tweets_id),
    FOREIGN KEY(mem_mail)
    REFERENCES members(mem_mail),
    FOREIGN KEY(shohin_id)
    REFERENCES shohins(shohin_id)
);
CREATE TABLE tweetdetails(
    tweets_id       INT         NOT NULL,
    tweetdetails_id INT         NOT NULL,
    tweets_img      MEDIUMBLOB,
    image_name      VARCHAR(256),
    image_type      VARCHAR(64),
    image_size      INT,
    created_at      DATETIME,
    KEY(tweetdetails_id),
    PRIMARY KEY(tweets_id,tweetdetails_id),
    FOREIGN KEY(tweets_id)
    REFERENCES tweets(tweets_id)
);
set global max_allowed_packet = 1000*100 * 1024 * 1024;