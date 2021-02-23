<?php

namespace lista;

class conexion{

    public $conex;
    public function __construct()
    {
        $host="localhost";
        $user="root";
        $contra="";
        $base="tareas";
        $this->conex = mysqli_connect($host, $user, $contra, $base);
    }

}
?>