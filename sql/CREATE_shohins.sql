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