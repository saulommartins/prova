<?php
 
namespace Controllers; 
use Controllers\GenericController;
use Models\Users;

class UserController extends GenericController {
    function __construct() {
        $userModel = new Users;
        parent::__construct($userModel);
    }
 
}
