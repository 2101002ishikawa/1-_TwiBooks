CREATE TABLE shohins(
    shohin_id       VARCHAR(10)     NOT NULL AUTO_INCREMENT,
    shohin_mei      VARCHAR(200)    NOT NULL,
    shohin_bunrui   VARCHAR(200)    NOT NULL,
    hanbai_bi       DATE            NOT NULL,
    shohin_kakaku   INT(8)          NOT NULL,
    shohin_img      BLOB,
    shohin_writer   VARCHAR(200),
    shohin_conpany  VARCHAR(200),
    PRIMARY KEY(shohin_id)
);