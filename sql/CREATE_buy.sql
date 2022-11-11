CREATE TABLE buy(
    buy_id      INT             NOT NULL AUTO_INCREMENT,
    mem_mail    VARCHAR(200)    NOT NULL,
    buy_date    DATE            NOT NULL,
    buy_total   INT             NOT NULL,
    PRIMARY KEY(buy_id),
    FOREIGN KEY(mem_mail)
    REFERENCES members(mem_mail)
);