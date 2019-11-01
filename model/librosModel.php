<?php

class librosModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=biblioteca_virtual;charset=utf8','root','');
    }

    function getLibros(){
        $sentencia = $this->db->prepare("SELECT lib.id_libro, lib.titulo, aut.apellido, aut.nombre, lib.genero, lib.valoracion FROM libros lib INNER JOIN autores aut ON lib.id_autor = aut.id_autor");
        $sentencia->execute();
        $libros = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $libros;  
    }
    function agregar($titulo,$autor,$genero, $anio, $valoracion, $resenia){//tengo que tereminar este
        $sentencia=$this->db->prepare("INSERT INTO `libros`(`autor`, `titulo`, `anio`, `genero`, `resenia`, `valoracion`) VALUES ('$autor', '$titulo', '$anio', '$genero', '$resenia', '$valoracion')");
        $sentencia->execute([$titulo,$autor,$genero, $anio, $valoracion, $resenia]);
        return $this->db->lastInsertId();
    }

    function eliminarLibro($id){
        $sentencia = $this->db->prepare("DELETE FROM `libros` WHERE `libros`.`id_libro` = ?");
        $sentencia->execute(array($id));
    }

    function changeLibro($id,$titulo,$autor,$genero, $anio, $valoracion, $resenia){
        $sentencia = $this->db->prepare('UPDATE `libros` SET `titulo` = ?, `año` = ?, `genero` = ?, `reseña` = ?, `valoracion` = ? WHERE `libros`.`id_libro` = ? AND `libros`.`id_autor` = ?;');
        $sentencia->execute([$id,$titulo,$autor,$genero, $anio, $valoracion, $resenia]);

    }
    function getLibro($id){
        $query = $this->db->prepare('SELECT lib.id_libro, lib.titulo, aut.apellido, aut.nombre, lib.genero, lib.anio, lib.resenia, lib.valoracion FROM libros lib INNER JOIN autores aut ON lib.id_autor = aut.id_autor WHERE id_libro = ?');
        $query->execute([$id]);
        $libro = $query->fetch(PDO::FETCH_OBJ);
        return json_decode(json_encode($libro), True);
    }
    function categorias(){
        $query = $this->db->prepare('SELECT lib.*, aut.* FROM libros lib INNER JOIN autor aut ON lib.id_autor = aut.id_autor');
        $query->execute();
        $libros = $query->fetchAll(PDO::FETCH_ASSOC);

        return $libros; 
    }
    
}



