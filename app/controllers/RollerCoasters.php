<?php
class RollerCoasters extends Controller {

  public function __construct() {
    $this->RollerCoasterModel = $this->model('RollerCoaster');
  }

  public function index() {

    $rollercoasters = $this->RollerCoasterModel->getRollercoasters();

    $rows = '';
    foreach ($rollercoasters as $value){
      $rows .= "<tr>
                  <td>$value->id</td>
                  <td>" . htmlentities($value->nameRollerCoaster, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->nameAmusementPark, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->country, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . number_format($value->topspeed, 0, ',', '.') . "</td>
                  <td>" . number_format($value->height, 0, ',', '.') . "</td>
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