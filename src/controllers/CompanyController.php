<?php
 
namespace Controllers; 
use Controllers\GenericController;
use Models\Company;

class CompanyController extends GenericController {
    function __construct() {
        $companyModel = new Company;
        parent::__construct($companyModel);
    }
 
}
