CREATE TABLE carts(
    mem_id          VARCHAR(8)  NOT NULL,
    shohin_id       VARCHAR(10) NOT NULL,
    mem_id          INT(8)  NOT NULL,
    shohin_id       INT(10) NOT NULL,
    shohin_count    INT(20)     NOT NULL,
    PRIMARY KEY(mem_id,shohin_id),
    FOREIGN KEY(mem_id)
    REFERENCES members(mem_id),
    FOREIGN KEY(shohin_id)
    REFERENCES shohins(shohin_id)
);