<?php

class Sentencia {
    public $sentencia;
    public $conn;
    public $tabla;
    public $resultado;

    function __construct($sentencia, $conn, $tabla) {
        $this->sentencia = $sentencia;
        $this->conn = $conn; // Asegúrate de usar $this->conn
        $this->tabla = $tabla;
    }

    // Ejecuta la consulta SQL
    public function con() {
        $this->resultado = mysqli_query($this->conn, $this->sentencia) or die('No se ejecutó la consulta a la tabla '. $this->tabla);
    }

    // Insertar, editar y borrar
    public function insertarbdo() {
        mysqli_query($this->conn, $this->sentencia) or die('No se insertó en la tabla'. $this->tabla);
    }
}
?>
