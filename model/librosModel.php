<?php

class librosModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=biblioteca_virtual;charset=utf8','root','');
    }

    function getLibros(){
        $sentencia = $this->db->prepare("select * from libro");
        $sentencia->execute();
        $libros = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $libros;  
    }
    function agregar($titulo,$autor,$genero, $anio, $valoracion, $resenia){

        $sentencia=$this->db->prepare('INSERT INTO libro(titulo, autor, genero, año, valoracion, reseña) values(??????)');
        $sentencia->execute([$titulo,$autor,$genero, $anio, $valoracion, $resenia]);
        
        return $this->db->lastInsertId();
    }

    function eliminarLibro($id){
        $sentencia = $this->db->prepare("DELETE FROM libro WHERE id=?");
        $sentencia->execute(array($id));
    }

    function changeLibro($id,$titulo,$autor,$genero, $anio, $valoracion, $resenia){//no termine todavia de hacer esta funcion 

        $sentencia = $this->db->prepare('UPDATE `libro` SET `titulo` = ?, `año` = ?, `genero` = ?, `reseña` = ?, `valoracion` = ? WHERE `libro`.`id_libro` = ? AND `libro`.`id_autor` = ?;');
        $sentencia->execute([$id,$titulo,$autor,$genero, $anio, $valoracion, $resenia]);

    }
    function getLibro($id){
        $query = $this->db->prepare('SELECT * FROM libro WHERE id_libro = ?');
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
 
    }
    
}


