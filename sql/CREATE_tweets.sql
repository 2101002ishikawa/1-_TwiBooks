CREATE TABLE tweets(
    tweets_id           INT        NOT NULL AUTO_INCREMENT,
    mem_mail            VARCHAR(200)    NOT NULL,
    tweets_contents     VARCHAR(200)    NOT NULL,
    tweets_date         DATE            NOT NULL,
    shohin_id           BIGINT         NOT NULL,
    good                INT          NOT NULL DEFAULT 0,
    bad                 INT          NOT NULL DEFAULT 0,
    PRIMARY KEY(tweets_id),
    FOREIGN KEY(mem_mail)
    REFERENCES members(mem_mail),
    FOREIGN KEY(shohin_id)
    REFERENCES shohins(shohin_id)
);