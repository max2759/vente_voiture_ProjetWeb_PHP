<?php


class model
{
    protected $stmt;
    protected $table = '';

    public function __construct()
    {
        try {
            $dns = 'mysql:host=localhost;dbname=vente_voiture';
            $userDB = 'root';
            $passwd = '';

            $this->stmt = new PDO($dns, $userDB, $passwd);
        }catch(PDOException $e){
            die('Erreur : '. $e->getMessage());
        }
    }

    public function readDB($fields = NULL, $where ='', $innerJoin = ''){

        //SI le champs fields est NULL, alors ce sera un select * from table
        if($fields == NULL){
            $fields = '*';
        }
        // SI where n'est pas vide, on regarde si le innerjoin n'est pas vide et en fonction de ça on a une appelle notre sql
        // SINON where est vide et innerjoin soit ne l'est pas ou l'est et on appelle notre sql en fonction de ça
        if($where !=''){
            if($innerJoin !=''){
                $sql = 'SELECT '.$fields. ' FROM '.$this->table.' INNER JOIN '. $innerJoin.' WHERE '. $where;
            }else{
                $sql = 'SELECT '.$fields. ' FROM '.$this->table.' WHERE '. $where;
            }
        }else{
            if($innerJoin !=''){
                $sql = 'SELECT '.$fields. ' FROM '.$this->table.' INNER JOIN '. $innerJoin;
            }else{
                $sql = 'SELECT '.$fields. ' FROM '.$this->table;
            }
        }

        try {
            $select = $this->stmt->query($sql);
            $select->setFetchMode(PDO::FETCH_OBJ);
            $this->data = new stdClass();
            $this->data = $select->fetchAll();
        }catch(Exception $e){
            echo 'Une erreur est survenue lors de la récupération des données';
        }


    }

    static function load($nom){
        require('../MODEL/'.$nom.'.php');
        return new $nom();
    }


}