<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IdentificationController
 *
 * @author remy.benalouane
 */
namespace APP\Controller;

class IdentificationController {
    public function login(){
        header('location:http://monpetitmvc/?c=GestionClient&a=chercheUn');
    }
}
