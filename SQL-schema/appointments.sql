CREATE TABLE appointments(
     id bigint(20) NOT NULL AUTO_INCREMENT,
     uid bigint(20),
     date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     diagnosis varchar(255),
     treatment varchar(255),
     completed VARCHAR(255),
     PRIMARY KEY (id)
);