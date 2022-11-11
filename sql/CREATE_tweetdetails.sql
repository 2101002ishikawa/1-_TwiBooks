CREATE TABLE tweetdetails(
    tweets_id       INT         NOT NULL,
    tweetdetails_id INT         NOT NULL AUTO_INCREMENT,
    tweets_img      MEDIUMBLOB,
    image_name      VARCHAR(256),
    image_type      VARCHAR(64),
    image_size      INT,
    created_at      DATETIME,
    KEY(tweetdetails_id),
    PRIMARY KEY(tweets_id,tweetdetails_id),
    FOREIGN KEY(tweets_id)
    REFERENCES tweets(tweets_id)
);