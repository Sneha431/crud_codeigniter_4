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
  public function selectQuery($table, $where = array())
  {
    $builder = $this->db->table($table);
    $builder->select("*");
    $builder->where($where);
    $query = $builder->get();
    // echo $this->db->getLastQuery();
    // return $query->getResult();
    return $query->getResultArray();
  }
  public function deleteValue($table, $where)
  {
    $builder = $this->db->table($table);
    // $builder->where($where);
    // $builder->get();
    //echo $this->db->getLastQuery();
    // return $builder->delete($where);

    return $builder->delete($where);
  }
  public function updateValue($table, $where, $data)
  {
    $builder = $this->db->table($table);
    $builder->where($where);
    $query = $builder->update($data);
    return $query;
  }
  public function selectQueryRow($table, $where = array())
  {
    $builder = $this->db->table($table);
    $builder->select("*");
    $builder->where($where);
    $query = $builder->get();
    // echo $this->db->getLastQuery();
    // return $query->getResult();
    return $query->getRoW();
  }
}
