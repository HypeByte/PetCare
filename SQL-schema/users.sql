CREATE TABLE users (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        username VARCHAR(255),
        password VARCHAR(255),
        created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
)