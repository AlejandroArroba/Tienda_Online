<?php

class ProductoDTO {

    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $clienteId;

    function __construct($id, $nombre, $descripcion, $precio, $clienteId) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->clienteId = $clienteId;
    }

    // ---------------------
    //   GETTERS Y SETTERS
    // ---------------------
    function getId() {
        return $this->id;
    }

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

    function setId($id) {
        $this->id = $id;
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
