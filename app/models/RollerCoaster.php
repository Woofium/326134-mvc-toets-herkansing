<?php
  class Rollercoaster {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getRollercoasters() {
      $this->db->query("SELECT * FROM `rollercoaster`;");

      $result = $this->db->resultSet();

      return $result;
    }
  }

?>  