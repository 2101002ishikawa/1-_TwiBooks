CREATE TABLE members(
    mem_id          VARCHAR(8)      NOT NULL AUTO_INCREMENT,
    mem_bunrui      INT             NOT NULL,
    mem_name        VARCHAR(200)    NOT NULL,
    mem_familyname  VARCHAR(100)    NOT NULL,
    mem_firstname   VARCHAR(100)    NOT NULL,
    mem_place       VARCHAR(200),
    mem_comment     VARCHAR(200),
    mem_img        BLOB,
    PRIMARY KEY(mem_id)
);