CREATE TABLE 
publicaciones 
(
    Identificador INT(10) NOT NULL AUTO_INCREMENT ,
    fecha DATE NOT NULL , 
    usuarios_usuario INT(10) NOT NULL , 
    imagen VARCHAR(100) NOT NULL , 
    texto TEXT NOT NULL , 
    FOREIGN KEY (usuarios_usuario) REFERENCES usuarios(Identificador), 
    PRIMARY KEY (Identificador) 
) ENGINE = InnoDB;