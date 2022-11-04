CREATE TABLE tweetdetails(
    tweets_id       INT(20)         NOT NULL,
    tweetdetails_id VARCHAR(200)    NOT NULL,
    tweets_img      BLOB,
    PRIMARY KEY(tweets_id,tweetdetails_id),
    FOREIGN KEY(tweets_id)
    REFERENCES tweets(tweets_id)
);