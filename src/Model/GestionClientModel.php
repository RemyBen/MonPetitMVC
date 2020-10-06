<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestionClientModel
 *
 * @author remy.benalouane
 */
namespace APP\Model;

use \PDO;
use APP\Entity\Client;
use Tools\Connexion;

class GestionClientModel {
    public function find($id){
        $unObjetPdo = Connexion::getConnexion();
        $sql = "select * from CLIENT where id=:id";
        $ligne = $unObjetPdo->prepare($sql);
        $ligne->bindValue(':id', $id, PDO::PARAM_INT);
        $ligne->execute();
        return $ligne->fetchObject(Client::class);
    }
    
    public function findAll(){
        $unObjetPdo = Connexion::getConnexion();
        $sql = "select * from CLIENT";
        $lignes = $unObjetPdo->query($sql);
        return $lignes->fetchAll(\PDO::FETCH_CLASS, Client::class);
    }
    
    public function enregistreClient($client){
        $unObjetPdo = Connexion::getConnexion();
        $sql = "insert into CLIENT(titreCli, nomCli, prenomCli, adresseRue1Cli, adresseRue2Cli, cpCli, villeCli, telCli) "
                . "values (:titreCli, :nomCli, :prenomCli, :adresseRue1Cli, :adresseRue2Cli, :cpCli, :villeCli, :telCli)";
        $s = $unObjetPdo->prepare($sql);
        $s->bindValue(':titreCli', $client->getTitreCli(), PDO::PARAM_STR);
        $s->bindValue(':nomCli', $client->getNomCli(), PDO::PARAM_STR);
        $s->bindValue(':prenomCli', $client->getPrenopCli(), PDO::PARAM_STR);
        $s->bindValue(':adresseRue1Cli', $client->getAdresseRue1Cli(), PDO::PARAM_STR);
        $s->bindValue(':adresseRue2Cli', ($client->getAdresseRue2Cli() == "") ? (null) : ($client->getAdresseRue2Cli()), PDO::PARAM_STR);
        $s->bindValue(':cpCli', $client->getCpCli(), PDO::PARAM_STR);
        $s->bindValue(':villeCli', $client->getVilleCli(), PDO::PARAM_STR);
        $s->bindValue(':telCli', $client->getTelCli(), PDO::PARAM_STR);
        $s->execute();
    }
}
