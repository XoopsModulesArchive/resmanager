<?php
  if ( !defined("RESMANAGER_CLASS_DEM") ) {
	define("RESMANAGER_CLASS_DEM",1);

require_once "ResManagerStmt.class.php";
require_once "ResManagerRes.class.php";

Class ResManagerDem {
    var $id; // id demande
    var $id_reserv; // id reservation
    var $id_user; // id user xoops
    var $status; // status de la demande
    var $mess_refus; // Message refus
    var $date; // Date de la demande
    var $dat_val; // Date de la validation
    var $comm;	// commentaire
	var $db; // base de donnée  
	var $errmess; // Message d'erreur'	
	
	
	// Renvoie le message d'erreur
	function getErrMess() {
		return $this->errmess;
	}

    // Constructeur
    function ResManagerDem($base)
    {
        $this->db = $base;
        $this->comm = ""; // utilisé seulement par les calendriers pour le moment
    } 
    // Ajouter une demande avec validation
    function addDem()
    {
        $nom_table = $this->db->prefix('resman_demande');
        $sql = new ResManagerStmt("insert into " . $nom_table . 
        "(id_reserv_dem, " . 
        " id_user_dem, " . 
        " status_dem, " . 
        " date_dem ,".
        " comm_dem )" . 
        " values ( ?, ?, ?, NOW(), ? ) ");

        if (!$result = $this->db->queryF($sql->bindParamVar("iiis",
                    $this->id_reserv,
                    $this->id_user,
                    DEMANDE_A_VALIDER,
                    $this->comm))) {
            // Req Ko
            return false;
        } 
        // id
        $this->id = $this->db->getInsertId();
        return true;
    } 
    // Ajouter une demande sans validation
    function addDemVal()
    {
        $nom_table = $this->db->prefix('resman_demande');
        $sql = new ResManagerStmt("insert into " . $nom_table . 
        					"(id_reserv_dem, " . 
        					" id_user_dem, " . 
        					" status_dem, " . 
        					" date_dem, " . 
        					" date_val_dem , " .
        					" comm_dem ) ". 
        					" values ( ?, ?, ?, NOW(), NOW(), ? ) ");

        if (!$result = $this->db->queryF($sql->bindParamVar("iiis",
                    $this->id_reserv,
                    $this->id_user,
                    DEMANDE_VALIDE,
                    $this->comm))) {
            // Req Ko
            return false;
        } 
        // id
        $this->id = $this->db->getInsertId();
        return true;
    } 
    // Mettre à jour le statut de la demande
    function updateDem()
    {
        $nom_table = $this->db->prefix('resman_demande'); 
        // validation
        if ($this->status == DEMANDE_VALIDE) {
            $sql = new ResManagerStmt("update " . $nom_table . " set status_dem = ? , " . "     date_val_dem = NOW(), " . "     mess_refus_dem = ? " . " where id_dem = ?");

            if (!$result = $this->db->queryF($sql->bindParamVar("isi", $this->status, $this->mess_refus, $this->id))) {
                // Req Ko
                return false;
            } 
        } 
        // refus
        else if ($this->status == DEMANDE_REFUSEE) {
            $sql = new ResManagerStmt("update " . $nom_table . " set status_dem = ? , " . "     mess_refus_dem = ?, " . "     date_val_dem = null " . " where id_dem = ?");

            if (!$result = $this->db->queryF($sql->bindParamVar("isi", $this->status,
                        $this->mess_refus,
                        $this->id))) {
                // Req Ko
                return false;
            }
        }
        else if ($this->status == DEMANDE_ANNULEE) {
            $sql = new ResManagerStmt("update " . $nom_table .
                                      " set status_dem = ? , " .
                                      "     date_val_dem = null " . 
                                      " where id_dem = ?");

            if (!$result = $this->db->queryF($sql->bindParamVar("isi", $this->status,
                        $this->id))) {
                // Req Ko
                return false;
            }
        } 

        return true;
    }
    
    // Supp une demande
    function suppDem()
    {
        $nom_table = $this->db->prefix('resman_demande');
        $sql = new ResManagerStmt("delete from " . $nom_table . " where id_dem = ?");

        if (!$result = $this->db->queryF($sql->bindParamVar("i", $this->id))) {
            // Req Ko
            return false;
        } 

        return true;
    } 
    // Lire une demande
    function getDem()
    {
        $nom_table = $this->db->prefix('resman_demande');
        $sql = new ResManagerStmt("select id_reserv_dem, " . 
        " id_user_dem, " . 
        " status_dem, " . 
        " mess_refus_dem, " . 
        " UNIX_TIMESTAMP(date_dem) date_dem, " . 
        " UNIX_TIMESTAMP(date_val_dem) date_val_dem, " .
        " comm_dem ". 
        " from " . $nom_table . " where id_dem = ?");

        $result = $this->db->queryF($sql->bindParamVar("i", $this->id));

        if ($this->db->getRowsNum($result) == 1) {
            // Recuperation des valeurs
            $row = $this->db->fetchArray($result);
            $this->id_reserv = $row['id_reserv_dem'];
            $this->id_user = $row['id_user_dem'];
            $this->status = $row['status_dem'];
            $this->mess_refus = $row['mess_refus_dem'];
            $this->date = $row['date_dem'];
            $this->date_val = $row['date_val_dem'];
            $this->comm = $row['comm_dem'];

            return true;
        } else {
            // Req Ko
            return false;
        } 
    } 
    // Compter le nombre de demande par réservations
    function countResDem()
    {
        $nom_table = $this->db->prefix('resman_demande');
        $sql = new ResManagerStmt("select count(*) from " . $nom_table . " where id_reserv_dem = " . $this->id_reserv);

        $result = $this->db->queryF($sql->requete);

        if ($result) {
            $myrow = $this->db->fetchRow($result);
            return $myrow[0];
        } else {
            // Req Ko
            return false;
        } 
    } 
	
	// Lire toutes les demandes à validervalidées pour un id_reserv
    function countToValDem()
    {
        $nom_table = $this->db->prefix('resman_demande');
        $sql = new ResManagerStmt("select count(*) from " . $nom_table . " where id_reserv_dem = " . $this->id_reserv . " and status_dem = " . DEMANDE_A_VALIDER);

        $result = $this->db->queryF($sql->requete);

        if ($result) {
            $myrow = $this->db->fetchRow($result);
            return $myrow[0];
        } else {
            // Req Ko
            return false;
        }
	} 
	
    // Lire toutes les demandes validées pour un id_reserv
    function countValDem()
    {
        $nom_table = $this->db->prefix('resman_demande');
        $sql = new ResManagerStmt("select count(*) from " . $nom_table . " where id_reserv_dem = " . $this->id_reserv . " and status_dem = " . DEMANDE_VALIDE);

        $result = $this->db->queryF($sql->requete);

        if ($result) {
            $myrow = $this->db->fetchRow($result);
            return $myrow[0];
        } else {
            // Req Ko
            return false;
        } 
    } 
    // Lire toutes les demandes validées ou en cours pour un id_reserv et un user
    function countUserDem()
    {
        $nom_table = $this->db->prefix('resman_demande');
        $sql = new ResManagerStmt("select count(*) from " . $nom_table . " where id_reserv_dem = " . $this->id_reserv . " and   id_user_dem   = " . $this->id_user . " and ( status_dem = " . DEMANDE_VALIDE . "       or " . "       status_dem = " . DEMANDE_A_VALIDER . "      )");

        $result = $this->db->queryF($sql->requete);

        if ($result) {
            $myrow = $this->db->fetchRow($result);
            return $myrow[0];
        } else {
            // Req Ko
            return false;
        } 
    } 
    // Compte les demandes validées pour un membre
    function countValUserDem()
    {
        $nom_table = $this->db->prefix('resman_demande');
        $sql = new ResManagerStmt("select count(*) from " . $nom_table . " where id_reserv_dem = " . $this->id_reserv . " and   id_user_dem   = " . $this->id_user . " and ( status_dem = " . DEMANDE_VALIDE . "      )");

        $result = $this->db->queryF($sql->requete);

        if ($result) {
            $myrow = $this->db->fetchRow($result);
            return $myrow[0];
        } else {
            // Req Ko
            return false;
        } 
    } 
    // Lire toutes les demandes
    function getAllDem($start=0, $limit=0)
    {
        $nom_table1 = $this->db->prefix('resman_categorie');
        $nom_table2 = $this->db->prefix('resman_reservation');
        $nom_table3 = $this->db->prefix('resman_demande');
        $nom_table4 = $this->db->prefix('users');

        $sql = new ResManagerStmt("select nom_cat, 						" . 
									"       nom_reserv,					" . 
									"			 id_dem,				" . 
									"     type_reserv,					" .
									"       uname,						" . 
									"       UNIX_TIMESTAMP(date_dem) date_dem," . 
									"			 status_dem						" . 
									"  from 											" .
									 $nom_table1 . ',' . $nom_table2 . ',' . $nom_table3 . ',' . $nom_table4 . 
									 " where id_cat = idcat_reserv " . " and   id_reserv = id_reserv_dem " . 
									 " and   id_user_dem = uid				 " . 
									 " order by id_dem desc							 ".($limit==0?"":"limit ".$start." , ".$limit));

        $result = $this->db->queryF($sql->requete); 
        // Req ok
        if ($result) {
            $tab_res = array();

            while ($row = $this->db->fetchArray($result)) {
                $tab_res[] = $row;
            } 

            return $tab_res;
        } else {
            // Req Ko
            return false;
        } 
    } 
    // Lire toutes les demandes
    function getUserDem($start=0, $limit=0)
    {
        $nom_table1 = $this->db->prefix('resman_categorie');
        $nom_table2 = $this->db->prefix('resman_reservation');
        $nom_table3 = $this->db->prefix('resman_demande');
        $nom_table4 = $this->db->prefix('users');

        $sql = new ResManagerStmt("select nom_cat, 		" . 
        "       nom_reserv,					" . 
        "       id_dem,					        " . 
        "       type_reserv,					" .
        "       uname,						" . 
        "       UNIX_TIMESTAMP(date_dem) date_dem," . 
        "			 status_dem		        " . 
        "  from 											" . 
        $nom_table1 . ',' . $nom_table2 . ',' . $nom_table3 . ',' . $nom_table4 . " where id_cat = idcat_reserv " . " and   id_reserv = id_reserv_dem " . " and   id_user_dem = uid				 " . " and   uid = " . $this->id_user . " order by id_dem desc ". ($limit==0?"":"limit ".$start." , ".$limit));

        $result = $this->db->queryF($sql->requete); 
        // Req ok
        if ($result) {
            $tab_res = array();

            while ($row = $this->db->fetchArray($result)) {
                $tab_res[] = $row;
            } 

            return $tab_res;
        } else {
            // Req Ko
            return false;
        } 
    } 
    // Lire les demandes d'une reservation
    function getResDem()
    {
        $nom_table1 = $this->db->prefix('resman_categorie');
        $nom_table2 = $this->db->prefix('resman_reservation');
        $nom_table3 = $this->db->prefix('resman_demande');
        $nom_table4 = $this->db->prefix('users');

        $sql = new ResManagerStmt("select nom_cat, 						" . 
        "       nom_reserv,					" .
        "			 id_dem,							" .
        "       uid,									" . 
        "       UNIX_TIMESTAMP(date_dem) date_dem," . 
        "			 status_dem						" . 
        "  from " .        $nom_table1 . ',' . $nom_table2 . ',' . $nom_table3 . ',' . $nom_table4 .
        " where id_cat = idcat_reserv " . " and   id_reserv = id_reserv_dem " . 
        " and   id_user_dem = uid				 " . " and   id_reserv_dem = "
        . $this->id_reserv . " order by id_dem desc							 ");

        $result = $this->db->queryF($sql->requete); 
        // Req ok
        if ($result) {
            $tab_res = array();

            while ($row = $this->db->fetchArray($result)) {
                $tab_res[] = $row;
            } 

            return $tab_res;
        } else {
            // Req Ko
            return false;
        } 
    } 
    // Vérifie si validation possible
    // Renvoie true si ok
    // sinon message erreur
    function checkValid($error)
    {
        $res = new ResManagerRes($this->db);
        $res->id = $this->id_reserv;
        $res->getReserv();
		if ($res->active == 0) {
		  $this->errmess = _MD_RESERV_NOTACTIVE;
		}
        else if ($this->countValDem() >= $res->nbocc) {
            trigger_error('ChecValid ko full ', E_USER_NOTICE);
            $this->errmess = _MD_RESERVFULL;
            return false;
        } else if ($this->countValUserDem() >= $res->occpers) {
            trigger_error('CheckValid ko full user ', E_USER_NOTICE);
            $this->errmess = _MD_RESERVFULLUSER;
            return false;
        } 

        return true;
    } 

    function getLienDem()
    {
    
     // Lecture réservation
     $res = new ResManagerRes($this->db);
     $res->id = $this->id_reserv;
     $res->getReserv();

     if ( $res->type == RES_UNIQUE )
       return XOOPS_URL."/modules/resmanager/edit_dem.php?op=detail&appel=lst_dem.php&iddem=".$this->id;
     else
       return XOOPS_URL."/modules/resmanager/edit_dem.php?op=detail&appel=lst_dem.php&iddem=".$this->id;     
    }


} 

}
?>
