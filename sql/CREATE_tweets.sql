CREATE TABLE tweets(
    tweets_id           INT(20)         NOT NULL AUTO_INCREMENT,
    mem_mail            VARCHAR(200)    NOT NULL,
    tweets_contents     VARCHAR(200)    NOT NULL,
    tweets_date         DATE            NOT NULL,
    shohin_id           INT(10)         NOT NULL,
    good                INT(8)          NOT NULL DEFAULT 0,
    bad                 INT(8)          NOT NULL DEFAULT 0,
    PRIMARY KEY(tweets_id),
    FOREIGN KEY(mem_mail)
    REFERENCES members(mem_mail),
    FOREIGN KEY(shohin_id)
    REFERENCES shohins(shohin_id)
);