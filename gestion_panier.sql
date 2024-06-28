-- Creating table 'utilisateur'
create database Gestion_panier;
use Gestion_panier;
CREATE TABLE utilisateur (
login varchar(50),
password varchar(50),
type varchar(50)
 );
 
 INSERT INTO utilisateur (login, password, type)
VALUES ('admin', 'admin', 'admin'),
       ('fadil', '1111', 'user'),
       ('user', 'teste', 'user'),
       ('user05', '0000', 'user');
 
 create table type_produit(
type varchar(50) primary key
);

insert into type_produit(type) values
('Electronique'),
('Electricite'),
('Informatique');

CREATE TABLE produit (
    `RefPdt` VARCHAR(50),
    `libPdt` VARCHAR(25),
    `Prix` INT,
    `Qte` INT,
    `description` VARCHAR(50),
    `image` VARCHAR(50),
    foreign key(type) references type_produit(type),
    type varchar(50)
);

INSERT INTO produit (RefPdt, libPdt, Prix, Qte, description,image,type) VALUES
('P0003', 'SMART PHONE', 5780, 10, 'SMART PHONE','','Electronique'),
('P001', 'SMART TV', 4500, 5, 'Smart tv marque SONY','','Electricite'),
('P002', 'SMART TV', 5000, 3, 'Smart tv marque 1g','','Informatique');

