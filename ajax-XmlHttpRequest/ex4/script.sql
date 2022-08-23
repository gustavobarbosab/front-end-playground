CREATE TABLE ex4endereco(
    cep VARCHAR(9),
    rua VARCHAR(200) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    PRIMARY KEY (cep)
)ENGINE = InnoDB;

INSERT INTO `ex4endereco` (cep,rua,bairro,cidade)
VALUES ("38400-100","Avenida Floriano Peixoto", "Centro", "Uberlândia");