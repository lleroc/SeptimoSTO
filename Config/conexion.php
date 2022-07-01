<?php
session_start();
class ClaseConectar
{
    public $conexion;
    protected $db;
    private $host = 'localhost';
    private $uid = 'root';
    private $pwd = 'root';
    private $base = 'septimo_sto';

    public function ProcedimientoConectar()
    {
        $this->conexion = mysqli_connect($this->host, $this->uid, $this->pwd, $this->base);
        mysqli_query($this->conexion, "SET NAMES 'utf8");
        if ($this->conexion == 0) die('Error al conectarse con mysql');
        $this->db = mysqli_select_db($this->conexion, $this->base);
        if ($this->base == 0) die("error con la base de datos");
        return $this->conexion;
    }
}
