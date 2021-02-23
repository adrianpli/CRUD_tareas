<?php

require "app/Models/consultas.php";
require "app/Models/conexion.php";

use lista\conexion;
use lista\consultas;

class sistemaController
{
public function tabla(){
    $model = new consultas();
    $model -> ordenarID();
    $model -> verTodo();

}
public function crearTarea(){
    $model = new consultas();
    $model -> nombre = $_POST["titulo"];
    $model -> descripcion = $_POST["descripcion"];
    $model -> fecha = $_POST["fecha"];
    $model -> hora = $_POST["hora"];
    $model -> registrar();

}
public function actualizar(){
    $model = new consultas();
    $model -> nombre = $_POST["titulo_ac"];
    $model -> descripcion = $_POST["descripcion_ac"];
    $model -> fecha = $_POST["fecha_ac"];
    $model -> hora = $_POST["hora_ac"];
    $model -> actualizar($_POST["id_ac"]);


}
public function eliminar(){
    $model = new consultas();
    $model -> eliminaTarea($_POST["id_el"]);

}
}