<?php
class RollerCoasters extends Controller {

  public function __construct() {
    $this->rollercoasterModel = $this->model('Rollercoasters');
  }

  public function index() {
    /**
     * Haal via de method getFruits() uit de model Fruit de records op
     * uit de database
     */
    $rollercoasters = $this->rollercoasterModel->getRollercoasters();

    /**
     * Maak de inhoud voor de tbody in de view
     */
    $rows = '';
    foreach ($rollercoasters as $value){
      $rows .= "<tr>
                  <td>$value->id</td>
                  <td>" . htmlentities($value->nameRollerCoaster, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->nameAmusementPark, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->country, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->topspeed, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->height, ENT_QUOTES, 'ISO-8859-1') . "</td>
                </tr>";
    }


    $data = [
      'title' => '<h1>De 5 snelste achtbanen van Europa</h1>',
      'rollercoasters' => $rows
    ];
    $this->view('rollercoasters/index', $data);
  }
}

?>