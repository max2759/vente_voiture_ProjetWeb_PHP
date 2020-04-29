<?php


class model
{
    protected $stmt;
    protected $table = '';

    /**
     * model constructor.
     * Connexion à la DB
     */
    public function __construct()
    {
        try {
            $dns = 'mysql:host=localhost;dbname=vente_voiture';
            $userDB = 'root';
            $passwd = '';

            $this->stmt = new PDO($dns, $userDB, $passwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        }catch(PDOException $e){
            die('Erreur : '. $e->getMessage());
        }
    }

    /**
     * Permet de faire des requêtes sql
     * @param null $fields
     * @param string $where
     * @param string $innerJoin
     * @param null $orderBy
     */
    public function readDB($fields = NULL, $where ='', $innerJoin = '', $orderBy = NULL){

        //SI le champs fields est NULL, alors ce sera un select * from table
        if($fields == NULL){
            $fields = '*';
        }
        // SI where n'est pas vide, on regarde si le innerjoin n'est pas vide et en fonction de ça on a une appelle notre sql
        // SINON where est vide et innerjoin soit ne l'est pas ou l'est et on appelle notre sql en fonction de ça
        if($orderBy == NULL) {

            if ($where != '') {
                if ($innerJoin != '') {
                    $sql = 'SELECT ' . $fields . ' FROM ' . $this->table . ' INNER JOIN ' . $innerJoin . ' WHERE ' . $where;
                } else {
                    $sql = 'SELECT ' . $fields . ' FROM ' . $this->table . ' WHERE ' . $where;
                }
            } else {
                if ($innerJoin != '') {
                    $sql = 'SELECT ' . $fields . ' FROM ' . $this->table . ' INNER JOIN ' . $innerJoin;
                } else {
                    $sql = 'SELECT ' . $fields . ' FROM ' . $this->table ;
                }
            }
        }else{
            $sql = 'SELECT ' . $fields . ' FROM ' . $this->table . ' INNER JOIN ' . $innerJoin . ' ORDER BY ' . $orderBy;
        }

        try {
            /*var_dump($sql);*/
            $select = $this->stmt->query($sql);
            $select->setFetchMode(PDO::FETCH_OBJ);
            $this->data = new stdClass();
            $this->data = $select->fetchAll();
        }catch(Exception $e){
            echo 'Une erreur est survenue lors de la récupération des données';
        }


    }

    /**
     * execution de n'importe quelle requete
     * @param $sql
     * @return array
     */
    public function query($sql, $data = array()){
        $req = $this->stmt->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }


    static function load($nom){
        require('../MODEL/'.$nom.'.php');
        return new $nom();
    }


}