CREATE TABLE shohindetails(
    shohin_id BIGINT NOT NULL,
    shohindetail_id BIGINT NOT NULL AUTO_INCREMENT,
    shohin_img MEDIUMBLOB,
    image_name VARCHAR(256),
    image_type  VARCHAR(64),
    image_size  INT,
    created_at  DATETIME,
    KEY(shohindetail_id),
    PRIMARY KEY(shohin_id,shohindetail_id),
    FOREIGN KEY(shohin_id)
    REFERENCES shohins(shohin_id)
);