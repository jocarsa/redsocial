CREATE TABLE 
comentarios 
(
    Identificador INT(10) NOT NULL AUTO_INCREMENT ,
    fecha DATE NOT NULL , 
    usuarios_usuario INT(10) NOT NULL , 
    publicaciones_texto INT(10) NOT NULL , 
    texto TEXT NOT NULL , 
    FOREIGN KEY (publicaciones_texto) REFERENCES publicaciones(Identificador), 
    FOREIGN KEY (usuarios_usuario) REFERENCES usuarios(Identificador), 
    PRIMARY KEY (Identificador) 
) ENGINE = InnoDB;