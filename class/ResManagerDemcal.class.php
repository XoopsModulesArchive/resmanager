  <?php
if (!defined("RESMANAGER_CLASS_DEMCAL")) {
	define("RESMANAGER_CLASS_DEMCAL", 1);

	require_once "ResManagerDem.class.php";

	Class ResManagerDemcal {
		var $id_dem;
		var $year;
		var $month;
		var $day;
		var $time;
		var $errmess;

		var $db; // base de donnée 
		// Constructeur
		function ResManagerDemcal($base) {
			$this->db = $base;
		}
		
		// Renvoie le message d'erreur
		function getErrMess() {
			return $this->errmess;
		}
		
		
		// Ajouter une demande avec validation
		function addDemcal() {
			// Format date sans l'heure ( conacténation de year, month, day ) utile pour les requetes
			$fdate = $this->year.'-'.$this->month.'-'.$this->day;

			$nom_table = $this->db->prefix('resman_demcal');
			$sql = new ResManagerStmt("insert into ".$nom_table."(id_dem_demcal, "." year_demcal, "." month_demcal, "." day_demcal, "." time_demcal, "." fdate_demcal)"." values ( ?, ?, ?, ?, ?, ? ) ");

			if (!$result = $this->db->queryF($sql->bindParamVar("iiiiis", $this->id_dem, $this->year, $this->month, $this->day, $this->time, $fdate))) {
				// Req Ko
				return false;
			}

			return true;
		}
		// Supp une demande
		function suppDemcal() {
			$nom_table = $this->db->prefix('resman_demcal');
			$sql = new ResManagerStmt("delete from ".$nom_table." where id_dem_demcal = ?");

			if (!$result = $this->db->queryF($sql->bindParamVar("i", $this->id_dem))) {
				// Req Ko
				return false;
			}

			return true;
		}

		// Lires les données calendrier d'une demande
		function getDemcal() {
			$nom_table = $this->db->prefix('resman_demcal');
			$sql = new ResManagerStmt("select id_dem_demcal, "." year_demcal, "." month_demcal, "." day_demcal, "." time_demcal "." from ".$nom_table." where id_dem_demcal = ?");

			$result = $this->db->queryF($sql->bindParamVar("i", $this->id_dem));

			if ($this->db->getRowsNum($result) == 1) {
				// Recuperation des valeurs
				$row = $this->db->fetchArray($result);
				$this->year = $row['year_demcal'];
				$this->month = $row['month_demcal'];
				$this->day = $row['day_demcal'];
				$this->time = $row['time_demcal'];

				return true;
			} else {
				// Req Ko
				return false;
			}
		}

		// Lires les demcal d'une demande
		function getAllDemcalForDem() {
			$nom_table = $this->db->prefix('resman_demcal');
			$sql = new ResManagerStmt("select id_dem_demcal, "." year_demcal, "." month_demcal, "." day_demcal, "." time_demcal "." from ".$nom_table." where id_dem_demcal = ?");

			$result = $this->db->queryF($sql->bindParamVar("i", $this->id_dem));

			// boucle sur le tableau de résultat
			$tab_res = array ();

			while ($myrow = $this->db->fetchArray($result)) {
				$tab_res[] = $myrow;
			}

			return $tab_res;

		}

		// Vérifie si validation possible
		// Renvoie true si ok
		// sinon message erreur
		function checkValid($error, $niv, $id_res) {
			// 3 niveaux de contrôle
			// 0 ==> heure
			// 1 ==> jour
			// 2 ==> mois
			// 3 ==> année

			// Date du jour
			$date_jour = getDate();
			$jour_time_stamp = mktime(0, 0, 0, $date_jour['mon'], $date_jour['mday'], $date_jour['year']);

			// Tableau d'erreurs
			// $error = array(); 
			$this->errmess = array ();

			// Mise au format timestamp
			$cal_timestamp = mktime($this->time, 0, 0, $this->month, $this->day, $this->year);

			// Lecture réservation
			$res = new ResManagerRes($this->db);
			$res->id = $id_res;
			if (!$res->getReserv()) {
				$this->errmess = _MD_ACCESBD_KO;
				return false;
			}

			// Lecture de spécificités du calendrier
			$specal = new ResManagerSpecal($this->db);
			$specal->id_reserv = $res->id;

			// Reservation active
			if ($res->active == 0) {
				$this->errmess = _MD_RESERV_NOTACTIVE;
				return false;
			}

			// format de la date
			if (!checkDate($this->month, $this->day, $this->year)) {
				$this->errmess = _MD_FORMAT_DATE_KO;
				return false;
			}

			// jour de la semaine ouverte dans $cal
			$calendar = dateToCalendar($this->year, $this->month, $this->day, $this->time);

			// Lecture paramètre calendrier
			$cal = new ResManagerCal($this->db);
			$cal->id_reserv = $res->id;
			if (!$cal->getCal($calendar['dow'])) {
				$this->errmess = _MD_ACCESBD_KO;
				return false;
			}

			// date de reservation dans période ouverture stockée dans $cal		
			if (mktime(0, 0, 0, $this->month, $this->day, $this->year) > $cal->date_fin or mktime(0, 0, 0, $this->month, $this->day, $this->year) < $cal->date_deb) {
				$this->errmess = _MD_JOUR_INDISPO;
				return false;

			}

			// Heure dans la période demandée heure début heure fin demandée
			if ($this->time < $cal->heure_deb or $this->time > $cal->heure_fin) {
				$this->errmess = _MD_JOUR_INDISPO;
				return false;

			}

			// date de réservation < date jour
			if ($cal_timestamp < $jour_time_stamp) {
				$this->errmess = _MD_JOUR_INDISPO;
				return false;
			}

			if (!$cal->isOpen($calendar['dow'])) {
				$this->errmess = _MD_JOUR_INDISPO;
				return false;
			}

			// Spécificités du calendrier
			$specal->year = $this->year;
			$specal->month = $this->month;
			$specal->day = null;
			$specal->time = null;

			// Mois ?
			if ($specal->existSpecal()) {
				$this->errmess = _MD_MOIS_INDISPO;
				return false;
			}

			// Jour	?
			$specal->day = $this->day;
			if ($specal->existSpecal()) {
				$this->errmess = _MD_JOUR_INDISPO;
				return false;
			}

			if ($niv == 0) {

				// Heure ?
				$specal->year = $this->year;
				$specal->month = $this->month;
				$specal->day = $this->day;
				$tab_specal = $specal->getSpecalDay();

				if (isset ($tab_specal[$this->time]) and $tab_specal[$this->time] == 1) {

					$this->errmess = _MD_HEURE_INDISPO;
					return false;

				}
			}

			return true;
		}

		// Compte le nombre total de demandes pour une tranche horaire ( valider et à valider )
		function countResDemcal($dem) {
			$nom_table1 = $this->db->prefix('resman_demcal');
			$nom_table2 = $this->db->prefix('resman_demande');

			$sql = new ResManagerStmt("select count(*) from ".$nom_table1.", ".$nom_table2." where id_reserv_dem = ".$dem->id_reserv." and id_dem_demcal = id_dem "." and ( status_dem = ".DEMANDE_VALIDE." or status_dem = ".DEMANDE_A_VALIDER." ) "." and year_demcal = ".$this->year." and month_demcal = ".$this->month." and day_demcal = ".$this->day." and time_demcal = ".$this->time);

			$result = $this->db->queryF($sql->requete);

			if ($result) {
				$myrow = $this->db->fetchRow($result);
				return $myrow[0];
			} else {
				// Req Ko
				return false;
			}

		}

		// Compte le nombre de demandes validés pour une tranche horaire
		function countValDemcal($dem) {
			$nom_table1 = $this->db->prefix('resman_demcal');
			$nom_table2 = $this->db->prefix('resman_demande');

			$sql = new ResManagerStmt("select count(*) from ".$nom_table1.", ".$nom_table2." where id_reserv_dem = ".$dem->id_reserv." and id_dem_demcal = id_dem "." and status_dem = ".DEMANDE_VALIDE." and year_demcal = ".$this->year." and month_demcal = ".$this->month." and day_demcal = ".$this->day." and time_demcal = ".$this->time);

			$result = $this->db->queryF($sql->requete);

			if ($result) {
				$myrow = $this->db->fetchRow($result);
				return $myrow[0];
			} else {
				// Req Ko
				return false;
			}

		}

		// Compte le nombre de demandes pour un user ( validée et à valider )
		function countUserDemcal($dem) {
			$nom_table1 = $this->db->prefix('resman_demcal');
			$nom_table2 = $this->db->prefix('resman_demande');

				$sql = new ResManagerStmt("select count(*) from ".$nom_table1.", ".$nom_table2." where id_reserv_dem = ".$dem->id_reserv." and id_dem_demcal = id_dem "." and ( status_dem = ".DEMANDE_VALIDE." or  status_dem = ".DEMANDE_A_VALIDER." ) "." and id_user_dem = ".$dem->id_user." and fdate_demcal >= NOW()" // que les demandes en cours
	);

			$result = $this->db->queryF($sql->requete);

			if ($result) {
				$myrow = $this->db->fetchRow($result);
				return $myrow[0];
			} else {
				// Req Ko
				return false;
			}

		}

		// Compte le nombre de demandes validées pour un user
		function countValUserDemcal($dem) {
			$nom_table1 = $this->db->prefix('resman_demcal');
			$nom_table2 = $this->db->prefix('resman_demande');

				$sql = new ResManagerStmt("select count(*) from ".$nom_table1.", ".$nom_table2." where id_reserv_dem = ".$dem->id_reserv." and id_dem_demcal = id_dem "." and status_dem = ".DEMANDE_VALIDE." and id_user_dem = ".$dem->id_user." and fdate_demcal >= NOW()" // que les demandes en cours								  
	);

			$result = $this->db->queryF($sql->requete);

			if ($result) {
				$myrow = $this->db->fetchRow($result);
				return $myrow[0];
			} else {
				// Req Ko
				return false;
			}

		}

		// Créer un tableau avec pour chaque horaire d'une journée free ou pas free
		function getDispoDay($res) {

			$nom_table1 = $this->db->prefix('resman_demcal');
			$nom_table2 = $this->db->prefix('resman_demande');
			$all_table = $nom_table1." , ".$nom_table2;

			$sql = new ResManagerStmt("select time_demcal, count(*) nb	"." from 	".$all_table." where id_dem_demcal = id_dem	"." and 	year_demcal 	= ".$this->year." and	month_demcal 	= ".$this->month." and	day_demcal 	= ".$this->day." and   status_dem	=".DEMANDE_VALIDE." and   id_reserv_dem =".$res->id." group by time_demcal");

			$result = $this->db->queryF($sql->requete);

			// Req ok
			if ($result) {
				$tab_res = array ();

				while ($row = $this->db->fetchArray($result)) {
					$tab_res[$row['time_demcal']] = (($res->nbocc - $row['nb']) > 0 ? 1 : 0);
				}

				return $tab_res;
			} else {
				// Req Ko
				return false;
			}
		}

		// Créer un tableau avec les réservations pour chaque heure
		function getTabDemTime($res) {

			$nom_table1 = $this->db->prefix('resman_demcal');
			$nom_table2 = $this->db->prefix('resman_demande');
			$all_table = $nom_table1." , ".$nom_table2;

			$sql = new ResManagerStmt("select time_demcal, id_user_dem, id_dem, status_dem, comm_dem"." from 	".$all_table." where id_dem_demcal = id_dem	"." and 	year_demcal 	= ".$this->year." and	month_demcal 	= ".$this->month." and	day_demcal 	= ".$this->day." and   ( status_dem	=".DEMANDE_VALIDE." or status_dem	=".DEMANDE_A_VALIDER." )"." and   id_reserv_dem =".$res->id." order by time_demcal, id_user_dem");

			$result = $this->db->queryF($sql->requete);

			// Req ok
			if ($result and $this->db->getRowsNum($result) >= 1) {
				$tab_res = array ();
				$tab_dem = array ();

				// Gestion de la rupture			
				$time_pre = -1;

				while ($row = $this->db->fetchArray($result)) {

					if ($time_pre <> $row['time_demcal'] and $time_pre <> -1) {
						$tab_res[$time_pre] = $tab_dem;
						$tab_dem = array ();
					}

					$tab_dem[] = $row;
					$time_pre = $row['time_demcal'];

				}

				$tab_res[$time_pre] = $tab_dem;
				return $tab_res;
			} else {
				// Req Ko
				return false;
			}
		}

		// Créer un tableau avec les réservations pour chaque heure
		// pour toutes les réservations
		function getTabDemTimeAllRes() {

			$nom_table1 = $this->db->prefix('resman_demcal');
			$nom_table2 = $this->db->prefix('resman_demande');
			$all_table = $nom_table1." , ".$nom_table2;

			$sql = new ResManagerStmt("select distinct time_demcal, id_user_dem, id_reserv_dem, comm_dem, id_dem"." from 	".$all_table." where id_dem_demcal = id_dem	"." and 	year_demcal 	= ".$this->year." and	month_demcal 	= ".$this->month." and	day_demcal 	= ".$this->day." and   ( status_dem	=".DEMANDE_VALIDE." or status_dem	=".DEMANDE_A_VALIDER." )"." order by id_reserv_dem, time_demcal");

			$result = $this->db->queryF($sql->requete);

			// Req ok
			if ($result and $this->db->getRowsNum($result) >= 1) {
				$tab_res = array ();

				while ($row = $this->db->fetchArray($result)) {
					$tab_res[] = $row;
				}

				return $tab_res;
			} else {
				// Req Ko
				return false;
			}
		}

	}

}
?>

