CREATE TABLE anstalld (
	id int(11) PRIMARY KEY AUTO_INCREMENT,
	namn varchar(50),
	persnr varchar(20)
);

CREATE TABLE genre (
	namn varchar(50) PRIMARY KEY
);

CREATE TABLE band (
	id int(11) PRIMARY KEY AUTO_INCREMENT,
	namn varchar(50),
	land varchar(50),
	genre varchar(50),
	kontaktperson int(11),
	FOREIGN KEY (kontaktperson) REFERENCES anstalld(id)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	FOREIGN KEY (genre) REFERENCES genre(namn)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

CREATE TABLE bandmedlem (
	id int(11) PRIMARY KEY AUTO_INCREMENT,
	namn varchar(50),
	fdatum varchar(20),
	band_id int(11),
	FOREIGN KEY (band_id) REFERENCES band(id)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

CREATE TABLE scen (
	id int(11) PRIMARY KEY AUTO_INCREMENT,
	namn varchar(50),
	kapacitet int(11)
);

CREATE TABLE sakerhetsansvar (
	id int(11) PRIMARY KEY AUTO_INCREMENT,
	anstalld_id int(11),
	scen_id int(11),
	starttid datetime,
	sluttid datetime,
	FOREIGN KEY (anstalld_id) REFERENCES anstalld(id)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	FOREIGN KEY (scen_id) REFERENCES scen(id)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

CREATE TABLE spelschema (
	id int(11) PRIMARY KEY AUTO_INCREMENT,
	band_id int(11),
	scen_id int(11),
	starttid datetime,
	sluttid datetime,
	FOREIGN KEY (band_id) REFERENCES band(id)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	FOREIGN KEY (scen_id) REFERENCES scen(id)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);