USE db;
CREATE TABLE IF NOT EXISTS product(
    prd_id int(4) AUTO_INCREMENT,
    prd_sku varchar(20) NOT NULL,
    prd_name varchar(50) NOT NULL,
    prd_price varchar(15) NOT NULL,
    prd_qtd varchar(5) NOT NULL,
    prd_category varchar(12) NOT NULL,
    prd_descricao varchar(250) NOT NULL,
    PRIMARY KEY (prd_id) 
);
