<?php

class ProductoDTO {

    private $nombre;
    private $descripcion;
    private $precio;
    private $clienteId;

    function __construct($nombre, $descripcion, $precio, $clienteId) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->clienteId = $clienteId;
    }

    // ---------------------
    //   GETTERS Y SETTERS
    // ---------------------
    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getClienteId() {
        return $this->clienteId;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setClienteId($clienteId) {
        $this->clienteId = $clienteId;
    }
}
