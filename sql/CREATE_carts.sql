CREATE TABLE carts(
    mem_mail        VARCHAR(200)    NOT NULL,
    shohin_id       INT(10) NOT NULL,
    shohin_count    INT(20)     NOT NULL,
    PRIMARY KEY(mem_mail,shohin_id),
    FOREIGN KEY(mem_mail)
    REFERENCES members(mem_mail),
    FOREIGN KEY(shohin_id)
    REFERENCES shohins(shohin_id)
);