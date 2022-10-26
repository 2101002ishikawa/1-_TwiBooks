CREATE TABLE buy(
    buy_id      VARCHAR(20) NOT NULL AUTO_INCREMENT,
    mem_id      VARCHAR(8)  NOT NULL,
    buy_id      INT(20) NOT NULL AUTO_INCREMENT,
    mem_id      INT(8)  NOT NULL,
    buy_date    DATE        NOT NULL,
    buy_total   INT(20)     NOT NULL,
    PRIMARY KEY(buy_id),
    FOREIGN KEY(mem_id)
    REFERENCES members(mem_id)
);