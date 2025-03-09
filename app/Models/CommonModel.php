<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model
{

  public function insertValue($table, $data)
  {

    $builder = $this->db->table($table);
    $query = $builder->insert($data);
    return $query;
  }
}