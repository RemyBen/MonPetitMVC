<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace APP\Controller;

use APP\Model\GestionClientModel;
use ReflectionClass;
use \Exception;

/**
 * Description of GestionClientController
 *
 * @author remy.benalouane
 */

class GestionClientController {
    public function chercheUn($params){
        // appel de la méthode find($id) de la classe Model adequate
        $modele = new GestionClientModel();
        // dans tous les cas on récupère les Ids des clients
        $ids = $modele->findIds();
        // on place ces Ids dans le tableau de paramètres que l'on va envoyer à la vue
        $params['lesId']=$ids;
        // on teste si l'id du client à chercher a été passé dans l'URL
        if (array_key_exists('id', $params)){
            $id = filter_var(intval($params["id"]), FILTER_VALIDATE_INT);
            $unClient = $modele->find($id);
            // on placve le client trouvé dans le tableau de paramètres que l'on va envoyer à la vue
            $params['unClient']=$unClient;
        }
        $r = new ReflectionClass($this);
        $vue = str_replace('Controller', 'View', $r->getShortName())."/unClient.html.twig";
        \Tools\MyTwig::afficheVue($vue, $params);
            //include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/unClient.php";
        /*} else {
            throw new Exception("Client" . $id . " inconnu");
        }*/
    }
    
    public function chercheTous(){
        // appel de la méthode findAll() de la classe Model adequate
        $modele = new GestionClientModel();
        $clients = $modele->findAll();
        if($clients){
            $r = new ReflectionClass($this);
            $vue = str_replace('Controller', 'View', $r->getShortName())."/plusieursclients.html.twig";
            \Tools\MyTwig::afficheVue($vue, array('clients'=>$clients));
            //include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/plusieursClients.php";
        } else {
            throw new Exception("Aucun Client à afficher");
        }
    }
    
    public function creerClient($params){
        $vue = "GestionClientView\\creerClient.html.twig";
        \Tools\MyTwig::afficheVue($vue, array());
    }
    
    public function enregistreClient($param) {
        $client = new Client($param);
        $modele = new GestionClientModel();
        $modele->enregistreClient($client);
    }
}
