CREATE TABLE responses(
      id bigint(20) NOT NULL AUTO_INCREMENT,
      uid bigint(20),
      question varchar(255),
      response varchar(255),
      appointment_id bigint(20),
      PRIMARY KEY (id)
);