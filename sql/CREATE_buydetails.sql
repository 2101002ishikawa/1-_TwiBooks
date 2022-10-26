CREATE TABLE buydetails(
    buy_id          VARCHAR(20) NOT NULL,
    buy_id          INT(20) NOT NULL,
    buy_detailsid   INT(20)     NOT NULL,
    shohin_id       VARCHAR(10) NOT NULL,
    shohin_id       INT(10) NOT NULL,
    shohin_count    INT(20)     NOT NULL,
    PRIMARY KEY(buy_id,buy_detailsid),
    FOREIGN KEY(buy_id)
    REFERENCES buy(buy_id),
    FOREIGN KEY(shohin_id)
    REFERENCES shohins(shohin_id)
);