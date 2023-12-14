CREATE TABLE 
enlaces 
(
    Identificador INT(10) NOT NULL AUTO_INCREMENT ,
    fecha DATE NOT NULL , 
    usuarios_usuario INT(10) NOT NULL , 
    usuarios_usuario2 INT(10) NOT NULL , 
    FOREIGN KEY (usuarios_usuario) REFERENCES publicaciones(Identificador), 
    FOREIGN KEY (usuarios_usuario2) REFERENCES usuarios(Identificador), 
    PRIMARY KEY (Identificador) 
) ENGINE = InnoDB;