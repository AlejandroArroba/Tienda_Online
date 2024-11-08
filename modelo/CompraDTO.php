<?php

class CompraDTO {

    private $idCliente;
    private $idProducto;
    private $fechaCompra;
    private $cantidad;

    public function __construct($idCliente, $idProducto, $fechaCompra, $cantidad) {
        $this->idCliente = $idCliente;
        $this->idProducto = $idProducto;
        $this->fechaCompra = $fechaCompra;
        $this->cantidad = $cantidad;
    }

    // ---------------------
    //   GETTERS Y SETTERS
    // ---------------------
    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function getFechaCompra() {
        return $this->fechaCompra;
    }

    public function setFechaCompra($fechaCompra) {
        $this->fechaCompra = $fechaCompra;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
}
