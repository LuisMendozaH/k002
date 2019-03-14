CREATE DATABASE IF NOT EXISTS db_015E;
USE db_015E;


/*create table Country (
    id int(11) not null auto_increment primary key,
    network varchar(20),
    geoname_id int(12),
    registered_country_geoname_id int(12),
    represented_country_geoname_id int(12),
    is_anonymous_proxy int(1),
    is_satellite_provider int(1)
) engine=innodb;
alter table Country add index(network(3));
alter table Country add index(geoname_id(4));

create table CountryLocations (
    id int(11) not null auto_increment primary key,
    geoname_id int(12),
    locale_code varchar(2),
    continent_code varchar(4),
    continent_name varchar(12),
    country_iso_code char(2),
    country_name varchar(40),
    is_in_european_union int(1)
) engine=innodb;
alter table CountryLocations add index(geoname_id(4));
alter table CountryLocations add index(country_iso_code(2));

create table CountryRegions (
    id int(11) not null auto_increment primary key,
    region_code varchar(2),
    region_iso_code varchar(2),
    region_name varchar(40)
) engine=innodb;
alter table CountryRegions add index(region_code(2));
alter table CountryRegions add index(region_iso_code(2));

-- Loading the Country IP csv
LOAD DATA INFILE "GeoLite2_Country_Blocks_IPv4.csv" INTO TABLE Country  
          FIELDS TERMINATED BY ','  
          OPTIONALLY ENCLOSED BY '"' 
          LINES TERMINATED BY '\n' 
          IGNORE 1 ROWS 
       (@network, @geoname_id, @registered_country_geoname_id, @represented_country_geoname_id, @is_anonymous_proxy, @is_satellite_provider) 
       SET network = IF(@network = '', NULL, @network), 
           geoname_id = IF(@geoname_id = '', NULL, @geoname_id), 
           registered_country_geoname_id = IF(@registered_country_geoname_id = '', NULL, @registered_country_geoname_id),
           represented_country_geoname_id = IF(@represented_country_geoname_id = '', NULL, @represented_country_geoname_id),
           is_anonymous_proxy = IF(@is_anonymous_proxy = '', NULL, @is_anonymous_proxy),
           is_satellite_provider = IF(@is_satellite_provider = '', NULL, @is_satellite_provider);
-- Loading Country locations
LOAD DATA INFILE "GeoLite2-Country-Locations-es.csv" INTO TABLE CountryLocations  
          FIELDS TERMINATED BY ','  
          OPTIONALLY ENCLOSED BY '"' 
          LINES TERMINATED BY '\n' 
          IGNORE 1 ROWS 
       (@geoname_id, @locale_code, @continent_code, @continent_name, @country_iso_code, @country_name, @is_in_european_union) 
       SET geoname_id = IF(@geoname_id = '', NULL, @geoname_id), 
           locale_code = IF(@locale_code = '', NULL, @locale_code), 
           continent_code = IF(@continent_code = '', NULL, @continent_code),
           continent_name = IF(@continent_name = '', NULL, @continent_name),
           country_iso_code = IF(@country_iso_code = '', NULL, @country_iso_code),
           country_name = IF(@country_name = '', NULL, @country_name),
           is_in_european_union = IF(@is_in_european_union = '', NULL, @is_in_european_union);
-- Loading Country regions
LOAD DATA INFILE "region_codes.csv" INTO TABLE CountryRegions  
          FIELDS TERMINATED BY ','  
          OPTIONALLY ENCLOSED BY '"' 
          LINES TERMINATED BY '\n' 
          IGNORE 1 ROWS 
       (@region_code, @region_iso_code, @region_name) 
       SET region_code = IF(@region_code = '', NULL, @region_code), 
           region_iso_code = IF(@region_iso_code = '', NULL, @region_iso_code), 
           region_name = IF(@region_name = '', NULL, @region_name);

*/

CREATE TABLE IF NOT EXISTS hotel_admin (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    code VARCHAR(12) NOT NULL,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(128) NOT NULL,
    passwd VARCHAR(40) NOT NULL,
    phone VARCHAR(12) NOT NULL,
    account_token VARCHAR(255),
    is_activated INT(1) DEFAULT 0,
    UNIQUE(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS users (
    id INT(11) PRIMARY KEY,
    code VARCHAR(12) NOT NULL,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(128) NOT NULL,
    phone VARCHAR(12) NOT NULL,
    UNIQUE(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS hotels (
    id INT(11) PRIMARY KEY,
    code VARCHAR(12) NOT NULL,
    primary_name VARCHAR(40) NOT NULL, -- Nombre oficial del hotel o casa de huespedes
    short_name VARCHAR(20) NOT NULL, -- Nombre corto del hotel
    slogan VARCHAR(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, -- Eslogan
    email VARCHAR(128) NOT NULL, -- Correo electrónico de contacto
    phone VARCHAR(12) NOT NULL,  -- Número de contacto
    country CHAR(2), -- País donde se ubica
    country_state CHAR(20), -- Entidad donde se ubica
    city_name CHAR(30), -- Ciudad donde se ubica
    hotel_site_admin INT(11), -- Admin
    UNIQUE(email),
    CONSTRAINT FOREIGN KEY (hotel_site_admin) REFERENCES hotel_admin (id) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS hotels_rooms (
    id INT(11) PRIMARY KEY,
    hotel_id INT(11), -- ID del hotel
    room_number INT(4), -- Número del cuarto
    room_beds INT(1), -- Número de camas
    room_price FLOAT(6, 2),
    room_promotion INT(3) DEFAULT 0,
    room_state INT(1) DEFAULT 0, -- Estado del cuarto, 3 = fuera de servicio, 2 = reservado,  1 = ocupado, 0 = vacio
    room_description VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    CONSTRAINT FOREIGN KEY (hotel_id) REFERENCES hotels (id) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS hotel_services (
    id INT(11) PRIMARY KEY,
    hotel_id INT(11),
    service_restaurant INT(1) DEFAULT 0,
    service_small_animals_welcome INT(1) DEFAULT 0,
    service_private_parking INT(1) DEFAULT 0,
    service_24h_bar INT(1) DEFAULT 0,
    CONSTRAINT FOREIGN KEY (hotel_id) REFERENCES hotels (id) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS hotels_rooms_services (
    id INT(11) PRIMARY KEY,
    room_id INT(11),
    service_tv INT(1) DEFAULT 0,
    service_wifi INT(1) DEFAULT 0,
    service_breakfast INT(1) DEFAULT 0,
    CONSTRAINT FOREIGN KEY (room_id) REFERENCES hotels_rooms (id) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS hotels_rooms_photos (
    id INT(11) PRIMARY KEY,
    room_id INT(11),
    photo_desc VARCHAR(100),
    photo_url_x1 VARCHAR(255),
    photo_url_x2 VARCHAR(255),
    photo_url_x3 VARCHAR(255),
    CONSTRAINT FOREIGN KEY (room_id) REFERENCES hotels_rooms (id) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS room_reservation (
    id INT(11) PRIMARY KEY,
    code VARCHAR(255) NOT NULL,
    hotel_id INT(11),
    room_id INT(11),
    user_id INT(11),
    adults_count INT(1),
    childs_count INT(1),
    initial_date BIGINT(20) NOT NULL,
    final_date BIGINT(20) NOT NULL,
    CONSTRAINT FOREIGN KEY (hotel_id) REFERENCES hotels (id) ON UPDATE CASCADE ON DELETE SET NULL,
    CONSTRAINT FOREIGN KEY (room_id) REFERENCES hotels_rooms (id) ON UPDATE CASCADE ON DELETE SET NULL,
    CONSTRAINT FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS room_feedback_comments (
    id INT(11) PRIMARY KEY,
    content TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    room_id INT(11),
    user_id INT(11),
    CONSTRAINT FOREIGN KEY (room_id) REFERENCES hotels_rooms (id) ON UPDATE CASCADE ON DELETE SET NULL,
    CONSTRAINT FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;