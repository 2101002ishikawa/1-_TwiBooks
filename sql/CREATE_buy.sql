CREATE TABLE buy(
    buy_id      INT(20)         NOT NULL AUTO_INCREMENT,
    mem_mail    VARCHAR(200)    NOT NULL,
    buy_date    DATE            NOT NULL,
    buy_total   INT(20)         NOT NULL,
    PRIMARY KEY(buy_id),
    FOREIGN KEY(mem_mail)
    REFERENCES members(mem_mail)
);