CREATE TABLE(
    tweets_id           VARCHAR(20)     NOT NULL AUTO_INCREMENT,
    mem_id              VARCHAR(8)      NOT NULL,
    tweets_contents     VARCHAR(200)    NOT NULL,
    tweets_date         DATE            NOT NULL,
    tweets_img          BLOB            NOT NULL,
    shohin_id           VARCHAR(10)     NOT NULL,
    good                INT(8)          NOT NULL,
    bad                 INT(8)          NOT NULL,
    PRIMARY KEY(tweets_id),
    FOREIGN KEY(mem_id)
    REFERENCES members(mem_id),
    FOREIGN KEY(shohin_id)
    REFERENCES shohins(shohin_id)
);