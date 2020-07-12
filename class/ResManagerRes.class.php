  <?php
if (!defined("RESMANAGER_CLASS_RES")) {
	define("RESMANAGER_CLASS_RES", 1);

	require_once "ResManagerStmt.class.php";

	Class ResManagerRes {

		var $id; // id reservation
		var $nom; // nom reservation
		var $descr; // description
		var $type; // type de reservation
		var $nbocc; // nbre d'unite disponible
		var $occpers; // nbre de demande par id user
		var $status; // !!! Ce champ n'est pas utilisé pour le moment !!!
		var $idcat; // id categorie
		var $valid; // la demande nécessite une validation
		var $active; // réservation active ou non

		var $db; // base de donnée

		// Constructeur
		function ResManagerRes($base) {
			$this->db = $base;
		}

		// Ajouter
		function addReserv() {
			$nom_table = $this->db->prefix('resman_reservation');
			
			if ( !isset($this->idcat) ) $this->idcat = 'null'; 
			
			$sql = new ResManagerStmt("insert into ".$nom_table."(nom_reserv, descr_reserv, type_reserv, nbocc_reserv, status_reserv, idcat_reserv
					 														,valid_reserv
																			,occpers_reserv, active_reserv) 
					 														values (?, ?, ?, ?, ?, ?, ?, ?, ?)");

			if (!$result = $this->db->queryF($sql->bindParamVar("ssiiiiiii", $this->nom, $this->descr, $this->type, $this->nbocc, $this->status, $this->idcat, $this->valid, $this->occpers, $this->active))) {
				// Req Ko

				return false;
			}

			// id categorie
			$this->id = $this->db->getInsertId();
			return true;
		}

		// Mise à jour
		function updateReserv() {
			$nom_table = $this->db->prefix('resman_reservation');
			$sql = new ResManagerStmt("update ".$nom_table." set descr_reserv = ?, type_reserv = ?, nbocc_reserv = ?,  idcat_reserv = ?  
					                            , valid_reserv = ?
												, occpers_reserv = ?, active_reserv = ? where id_reserv = ?");

			if (!$result = $this->db->queryF($sql->bindParamVar("siiiiiii", $this->descr, $this->type, $this->nbocc, $this->idcat, $this->valid, $this->occpers, $this->active, $this->id))) {
				// Req Ko

				return false;
			}

			return true;

		}

		// Supp
		function suppReserv() {
			$nom_table = $this->db->prefix('resman_reservation');
			$sql = new ResManagerStmt("delete from ".$nom_table." where id_reserv = ?");

			if (!$result = $this->db->queryF($sql->bindParamVar("i", $this->id))) {
				// Req Ko

				return false;
			}

			return true;
		}

		// Lire
		function getReserv() {
			$nom_table = $this->db->prefix('resman_reservation');

			$sql = new ResManagerStmt("select nom_reserv, 
					                                   descr_reserv,
																			       type_reserv,
																			       nbocc_reserv,
																			       status_reserv,
																			       idcat_reserv,
																			       valid_reserv,
																			       occpers_reserv,
																			       active_reserv
																						 from ".$nom_table." where id_reserv = ?");

			$result = $this->db->queryF($sql->bindParamVar("i", $this->id));

			if ($this->db->getRowsNum($result) == 1) {

				// Recuperation des valeurs
				$row = $this->db->fetchArray($result);
				$this->nom = $row['nom_reserv'];
				$this->descr = $row['descr_reserv'];
				$this->type = $row['type_reserv'];
				$this->nbocc = $row['nbocc_reserv'];
				$this->status = $row['status_reserv'];
				$this->idcat = $row['idcat_reserv'];
				$this->valid = $row['valid_reserv'];
				$this->occpers = $row['occpers_reserv'];
				$this->active = $row['active_reserv'];
				return true;
			} else {
				// Req Ko

				return false;

			}
		}

		// Lire toutes
		function getAllReserv() {
			$nom_table = $this->db->prefix('resman_reservation');
			$sql = new ResManagerStmt("select id_reserv,
					 														       nom_reserv
																						 from ".$nom_table);

			$result = $this->db->queryF($sql->requete);

			// boucle sur le tableau de résultat
			$tab_res = array ();

			while ($myrow = $this->db->fetchRow($result)) {
				$tab_res[$myrow[0]] = $myrow[1];
			}

			return $tab_res;

		}

		// Lire toutes
		function getAllReservCal() {
			$nom_table = $this->db->prefix('resman_reservation');
			$sql = new ResManagerStmt("select id_reserv,
					 														       nom_reserv
																						 from ".$nom_table." where type_reserv = 1 ");

			$result = $this->db->queryF($sql->requete);

			// boucle sur le tableau de résultat
			$tab_res = array ();

			while ($myrow = $this->db->fetchRow($result)) {
				$tab_res[$myrow[0]] = $myrow[1];
			}

			return $tab_res;

		}

		// Compter le nombre de réservation par catégorie
		function countCatRes() {
			$nom_table = $this->db->prefix('resman_reservation');
			$sql = new ResManagerStmt("select count(*) from ".$nom_table." where idcat_reserv = ".$this->idcat);

			$result = $this->db->queryF($sql->requete);

			if ($result) {
				$myrow = $this->db->fetchRow($result);
				return $myrow[0];

			} else {
				// Req Ko

				return false;
			}
		}

		// Contrôle la saisie d'une reservation
		function checkSaisie() {
			// Tableau des erreurs
			$error = array ();

			$date_ko = 0;
			$nbre_ko = 0;

			// nombre total
			if (!is_numeric($this->nbocc)) {
				$error[] = _MD_FORMAT_NUMBER_KO.' : '._MD_NBOCCRES;
				$nbre_ko ++;
			} else
				if (($this->nbocc) <= 0) {
					$error[] = _MD_NB_NOTZERO.' : '._MD_NBOCCRES;
					$nbre_ko ++;
				}

			// nombre totalpar membre
			if (!is_numeric($this->occpers)) {
				$error[] = _MD_FORMAT_NUMBER_KO.' : '._MD_OCCPERSRES;
				$nbre_ko ++;
			} else
				if (($this->occpers) <= 0) {
					$error[] = _MD_NB_NOTZERO.' : '._MD_OCCPERSRES;
					$nbre_ko ++;
				}

			// nb pers <= nb total
			if ($nbre_ko == 0 and $this->type == RES_UNIQUE)
				if ($this->occpers > $this->nbocc)
					$error[] = _MD_OCC_SUP_NB;
			return $error;

		}

		// lire les 5 dernières réservations
		// auxquel un utilisateur a accès
		// Si Anonyme alors les 5 dernières
		function getLastResUnique() {
			$nom_table = $this->db->prefix('resman_reservation');
			$nom_table2 = $this->db->prefix('resman_categorie');

			$sql = new ResManagerStmt("select id_reserv, "."       nom_reserv, "."       idcat_reserv, "."       nom_cat  "." from ".$nom_table." , ".$nom_table2." where type_reserv = ".RES_UNIQUE." and id_cat = idcat_reserv "." and active_reserv = 1 order by id_reserv desc");

			$result = $this->db->queryF($sql->requete);

			// boucle sur le tableau de résultat
			$tab_res = array ();
			$index_tab = 0;

			while (($myrow = $this->db->fetchBoth($result)) && ($index_tab < 5)) {

				if (checkRightCat($myrow['idcat_reserv'])) {
					$tab_res[] = $myrow;
					$index_tab ++;
				}

			}

			return $tab_res;

		}

		// lire les 5 dernières réservations
		// auxquel un utilisateur a accès
		// Si Anonyme alors les 5 dernières
		function getLastResCal() {
			$nom_table = $this->db->prefix('resman_reservation');
			$nom_table2 = $this->db->prefix('resman_categorie');

			$sql = new ResManagerStmt("select id_reserv, "."       nom_reserv, "."       idcat_reserv, "."       nom_cat "." from ".$nom_table." , ".$nom_table2." where type_reserv = ".RES_CALENDRIER." and id_cat = idcat_reserv "." and active_reserv = 1 order by id_reserv desc ");

			$result = $this->db->queryF($sql->requete);

			// boucle sur le tableau de résultat
			$tab_res = array ();
			$index_tab = 0;

			while (($myrow = $this->db->fetchBoth($result)) && ($index_tab < 5)) {

				if (checkRightCat($myrow['idcat_reserv'])) {
					$tab_res[] = $myrow;
					$index_tab ++;
				}

			}

			return $tab_res;

		}

	}

}
?>

