<?php

class Entrada {
    public $id;
    public $titulo;
    public $texto;
    public $imagen;
    public $fecha;

    public function guardar($datos = ['titulo' => '', 'texto' => '', 'imagen' => '']) {
        $this->titulo = $datos['titulo'];
        $this->texto = $datos['texto'];
        $this->imagen = $datos['imagen'];
        $db = new DB();
        return $db->insert("Insert into entradas (id, titulo, texto, imagen) VALUES (?, ?, ?, ?)", [null, $this->titulo, $this->texto, $this->imagen]);
    }

    public function editar($datos = ['titulo' => '', 'texto' => '', 'imagen' => '']) {
        $this->titulo = $datos['titulo'] ? $datos['titulo'] : $this->titulo;
        $this->texto = $datos['texto'] ? $datos['texto'] : $this->texto;
        $this->imagen = $datos['imagen'] ? $datos['imagen'] : $this->imagen;
        $db = new DB();
        return $db->update("update entradas set titulo = ?, texto = ?, imagen = ? where id = ?", [$this->titulo, $this->texto, $this->imagen, $this->id]);
    }

    public function borrar() {
        $db = new DB();
        return $db->delete("delete from entradas where id = ?", [$this->id]);
    }

    public function buscar($id) {
        $db = new DB();
        $buscar_sql = $db->fetch("Select * from entradas where id = ?", [$id]);
        if(!empty($buscar_sql)) {
            $this->id = $buscar_sql['id'];
            $this->titulo = $buscar_sql['titulo'];
            $this->texto = $buscar_sql['texto'];
            $this->imagen = $buscar_sql['imagen'];
            $this->fecha = $buscar_sql['fecha'];
            return true;
        } else {
            return false;
        }
    }

    public static function buscarTodas() {
        $db = new DB();
        $entradas = array();
        $buscar_sql = $db->fetchAll("Select * from entradas");
        foreach($buscar_sql as $entrada) {
            $entradas[$entrada['id']] = new Entrada();
            $entradas[$entrada['id']]->buscar($entrada['id']);
        }
        return $entradas;
    }

    public function extracto() {
        return substr($this->texto, 0, 100);
    }

}