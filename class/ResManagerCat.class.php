<?php
  if ( !defined("RESMANAGER_CLASS_CAT") ) {
	define("RESMANAGER_CLASS_CAT",1);

require_once "ResManagerStmt.class.php";

Class ResManagerCat {
    var $id; // id categorie
    var $nom; // nom categorie
    var $descr; // description categorie
    var $img; // Image catégorie
    
    var $db; // base de donnée

    // Constructeur
    function ResManagerCat($base)
    {
        $this->db = $base;
    } 
    // Ajouter une categorie
    function addCat()
    {
        $nom_table = $this->db->prefix('resman_categorie');
        $sql = new ResManagerStmt("insert into " . $nom_table . "(nom_cat, 
descr_cat) values ( ?, ? )");

        if (!$result = $this->db->queryF($sql->bindParamVar("ss", $this->nom, 
$this->descr))) {
            // Req Ko
            return false;
        } 
        // id categorie
        $this->id = $this->db->getInsertId();
        return true;
    } 
    // Ajouter une categorie
    function updateCat()
    {
        $nom_table = $this->db->prefix('resman_categorie');
        $sql = new ResManagerStmt("update " . $nom_table . " set descr_cat = ? 
where id_cat = ?");

        if (!$result = $this->db->queryF($sql->bindParamVar("ssi", 
$this->descr, $this->id))) {
            // Req Ko
            return false;
        } 

        return true;
    } 
    
    // Mettre à jour image catégorie
    function updateImgCat()
    {
        $nom_table = $this->db->prefix('resman_categorie');
        $sql = new ResManagerStmt("update " . $nom_table . " set img_cat = ? 
where id_cat = ?");

        if (!$result = $this->db->queryF($sql->bindParamVar("si", $this->img, 
$this->id))) {
            // Req Ko
            return false;
        } 

        return true;
    }
    
    // Supp une categorie
    function suppCat()
    {
        $nom_table = $this->db->prefix('resman_categorie');
        $sql = new ResManagerStmt("delete from " . $nom_table . " where id_cat 
= ?");

        if (!$result = $this->db->queryF($sql->bindParamVar("i", $this->id))) {
            // Req Ko
            return false;
        } 

        return true;
    } 
    // Lire une categorie
    function getCat()
    {
        $nom_table = $this->db->prefix('resman_categorie');
        $sql = new ResManagerStmt("select nom_cat, descr_cat, img_cat from " . 
$nom_table . " where id_cat = ?");

        $result = $this->db->queryF($sql->bindParamVar("i", $this->id));

        if ($this->db->getRowsNum($result) == 1) {
            // Recuperation des valeurs
            $row = $this->db->fetchArray($result);
            $this->nom = $row['nom_cat'];
            $this->descr = $row['descr_cat'];
            $this->img = $row['img_cat'];
            return true;
        } else {
            // Req Ko
            return false;
        } 
    } 
    // Lire toutes les catégories
    function getAllCat()
    {
        $nom_table = $this->db->prefix('resman_categorie');
        $sql = new ResManagerStmt("select id_cat, nom_cat from " . $nom_table);

        $result = $this->db->queryF($sql->requete); 
        // boucle sur le tableau de résultat
        $tab_res = array();

        while ($myrow = $this->db->fetchRow($result)) {
            $tab_res[$myrow[0]] = $myrow[1];
        } 

        return $tab_res;
    }

    // Lire toutes les catégories
    function getAllResOfCat()
    {
        $nom_table  = $this->db->prefix('resman_categorie');
        $nom_table1 = $this->db->prefix('resman_reservation');
        
        $sql = new ResManagerStmt("select res.id_reserv from " . $nom_table." 
as cat , ".
                                  $nom_table1." as res ".
                                  " where type_reserv=".RES_CALENDRIER.
                                  " and cat.id_cat = ".$this->id.
                                  " and cat.id_cat = res.idcat_reserv ");
                                  
        $result = $this->db->queryF($sql->requete);
        
        // boucle sur le tableau de résultat
        $tab_res = array();

        while ($myrow = $this->db->fetchRow($result)) 
        {
            $tab_res[] = $myrow[0];
        } 

        return $tab_res;
    }



} 
}

?>
