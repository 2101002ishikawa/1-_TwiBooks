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
