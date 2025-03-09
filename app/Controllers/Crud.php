<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommonModel;

class Crud extends BaseController
{
  public function index()
  {
    // echo view("include/header");
    // echo view("pages/select");
    // echo view("include/footer");
    $data["title"] = "Index Page";
    return view("pages/select", $data);
  }
  public function insert()
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
    // helper("form");
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

        // $insert["name"] = $name;
        // $insert["mobile"] = $mobile;
        // $insert["email"] = $email;
        // $insert = array("name" => $name, "email" => $email, "mobile" => $mobile);
        $insert = ["name" => $name, "email" => $email, "mobile" => $mobile];

        $model->insertValue("user", $insert);
        return redirect()->to(base_url("/"));
      } else {

        return view("pages/insert", $data);
      }
    } else {

      return view("pages/insert", $data);
    }
  }
}