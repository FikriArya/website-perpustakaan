<?php

namespace MyCompany\Model;

class Office
{
    private $id;
    private $name;
    private $status;

    // Konstruktor untuk inisialisasi properti
    public function __construct($id, $name, $status) {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
    }

    // Getter untuk id
    public function get_id() {
        return $this->id;
    }

    // Getter untuk name
    public function get_name() {
        return $this->name;
    }

    // Getter untuk status
    public function get_status() {
        return $this->status;
    }

    // Setter untuk id
    public function set_id($id) {
        $this->id = $id;
    }

    // Setter untuk name
    public function set_name($name) {
        $this->name = $name;
    }

    // Setter untuk status
    public function set_status($status) {
        $this->status = $status;
    }
}

?>
