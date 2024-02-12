<?php

namespace App\Models;
use CodeIgniter\CodeIgniter;

class m_jeu extends \CodeIgniter\Model
{
    function getLesJeu(){
        $db= db_connect();
        // get() permet de fair un select * table album
        $query=$db->table('jeu')->get();

        if($query->getFieldCount() > 0){
            return $query->getResult();

        }else{
            return false;
        }
    }
    function getJeu1(int $id_jeu){
        $db = db_connect();
        $query=$db->query('SELECT * FROM jeu WHERE jeu_id='.$id_jeu.'');

        if($query->getFieldCount() > 0){
            return $query->getResult();

        }else{
            return false;
        }
    }
}