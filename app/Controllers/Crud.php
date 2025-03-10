<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommonModel;

date_default_timezone_set('Asia/Kolkata');
class Crud extends BaseController
{
  public function index()
  {
    // echo view("include/header");
    // echo view("pages/select");
    // echo view("include/footer");
    $model = new CommonModel();
    // $where = array("status" => "InActive", "name" => "rima");
    $where = array("status" => "Active");
    $result = $model->selectQuery("user", $where);
    // echo "<pre>";
    // print_r($result);
    // $data["title"] = "Index Page";
    // $data["result"] = $result;
    $data = ["title" => "Index Page", "result" => $result];
    return view("pages/select", $data);
  }
  public function insert($id = null)
  {
    // echo view("include/header");
    // echo view("pages/insert");
    // echo view("include/footer");
    // print_r($_POST);
    // print_r($this->request->getPost());
    // print_r($_POST["name"]);
    // print_r($this->request->getPost("name"));


    $model = new CommonModel();
    $data["title"] = "Insert Page";
    $data["editrecord"] = "";
    // helper("form");
    if ($id !== null) {
      $fetchrow = $model->selectQueryRow("user", array("id" => $id));

      if (!empty($fetchrow)) {
        $data["editrecord"] = $fetchrow;
      } else {
        return redirect()->to(previous_url());
      }
    }
    if ($this->request->getMethod() == "POST") {

      $rules = $this->validate([
        "name" => ["label" => "Name", "rules" => "trim|required"],
        "mobile" => ["label" => "Mobile", "rules" => "trim|required"],
        "email" => ["label" => "Email", "rules" => "trim|required"]
      ]);
      if ($rules == true) {
        $name = $this->request->getPost("name");
        $email = $this->request->getPost("email");
        $mobile = $this->request->getPost("mobile");
        $creation_date = date("y-m-d H:i:s");

        // $insert["name"] = $name;
        // $insert["mobile"] = $mobile;
        // $insert["email"] = $email;
        // $insert = array("name" => $name, "email" => $email, "mobile" => $mobile);
        if ($id == null) {
          $insert =
            ["name" => $name, "email" => $email, "mobile" => $mobile, "creation_date" => $creation_date];

          $model->insertValue("user", $insert);
        } else {
          $editvalue =
            ["name" => $name, "email" => $email, "mobile" => $mobile, "updated_date" => date("y-m-d H:i:s")];

          $model->updateValue("user",  array("id" => $id), $editvalue);
        }
        return redirect()->to(base_url("/"));
      } else {

        return view("pages/insert", $data);
      }
    } else {

      return view("pages/insert", $data);
    }
  }
  public function deleteUser($id = null)
  {
    $model = new CommonModel();


    if ($id !== null) {
      $fetchrow = $model->selectQueryRow("user", array("id" => $id));

      if (!empty($fetchrow)) {
        $where = array("id" => $id);
        $model->deleteValue("user", $where);
        return redirect()->to(base_url("/"));
      } else {
        return redirect()->to(previous_url());
      }
    }
  }
}
