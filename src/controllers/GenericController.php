<?php
 
namespace Controllers; 
use Models\Users;

class GenericController {
    private $model;
    
    function __construct($model) {
        $this->model = $model;
    }
    public function create($data) {
        return $this->model->create($data);
    }
    public function update($id, $data) {
        return $this->model->save($data);
    }
    public function delete($id) {
        return $this->model->save($data);
    }
    public function get($id) {
        return $this->model->find(["id" => $id]);
    }
    public function find() {
        return $this->model->all();
    }
}
