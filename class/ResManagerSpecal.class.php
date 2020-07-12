<?php
if (!defined("RESMANAGER_CLASS_SPECAL")) {
	define("RESMANAGER_CLASS_SPECAL", 1);

	require_once "ResManagerStmt.class.php";

	Class ResManagerSpecal {

		var $id_reserv;
		var $year;
		var $month;
		var $day;
		var $time;

		var $db; // base de donnée

		// Constructeur
		function ResManagerSpecal($base) {
			$this->db = $base;
		}

		// Ajouter une demande avec validation
		function addSpecal() {
			$nom_table = $this->db->prefix('resman_specal');
			$sql = new ResManagerStmt('insert into '.$nom_table.'( '.' year_specal, '.' month_specal, '.' day_specal, '.' time_specal, '.'id_reserv_specal )'.'values ( '. ($this->year == null ? 'null,' : $this->year.', '). ($this->month == null ? 'null,' : $this->month.', '). ($this->day == null ? 'null,' : $this->day.', '). ($this->time == null ? 'null,' : $this->time.', ').$this->id_reserv.' )');

			if (!$result = $this->db->queryF($sql->requete)) {
				// Req Ko

				return false;
			}

			return true;
		}

		// Supp une demande
		function suppSpecal() {
			$nom_table = $this->db->prefix('resman_specal');
			$sql = new ResManagerStmt("delete from ".$nom_table." where "." year_specal = ".$this->year. ($this->month == null ? " and month_specal is null " : " and month_specal = ".$this->month). ($this->day == null ? " and day_specal is null " : " and day_specal = ".$this->day). ($this->time == null ? " and time_specal is null " : " and time_specal = ".$this->time)." and id_reserv_specal = ".$this->id_reserv);

			if (!$result = $this->db->queryF($sql->requete)) {
				// Req Ko

				return false;
			}

			return true;
		}

		// Les spécificités du calendrier
		function getSpecal() {
			$nom_table = $this->db->prefix('resman_specal');
			$sql = new ResManagerStmt("select id_reserv_specal, "." year_specal, "." month_specal, "." day_specal, "." time_specal "." from ".$nom_table." where id_reserv_specal = ?");

			$result = $this->db->queryF($sql->bindParamVar("i", $this->id_reserv));

			$tab_res = array ();

			while ($row = $this->db->fetchArray($result)) {

				$tab_res[] = $row;

			}

			return $tab_res;
		}

		// Les heure fermés pour une journée
		function getSpecalDay() {
			$nom_table = $this->db->prefix('resman_specal');
			$sql = new ResManagerStmt("select id_reserv_specal, "." year_specal, "." month_specal, "." day_specal, "." time_specal "." from ".$nom_table." where id_reserv_specal = ? and year_specal = ? and month_specal = ? and day_specal = ? ");

			$result = $this->db->queryF($sql->bindParamVar("iiii", $this->id_reserv, $this->year, $this->month, $this->day));

			$tab_res = array ();

			while ($row = $this->db->fetchArray($result)) {

				$tab_res[$row['time_specal']] = 1;

			}

			return $tab_res;
		}

		// Les jours fermés pour un mois
		function getSpecalMonth() {
			$nom_table = $this->db->prefix('resman_specal');
			$sql = new ResManagerStmt("select id_reserv_specal, "." year_specal, "." month_specal, "." day_specal, "." time_specal "." from ".$nom_table." where id_reserv_specal = ? and year_specal = ? and month_specal = ? and time_specal is null");

			$result = $this->db->queryF($sql->bindParamVar("iiii", $this->id_reserv, $this->year, $this->month));

			$tab_res = array ();

			while ($row = $this->db->fetchArray($result)) {

				$tab_res[$row['day_specal']] = 1;

			}

			return $tab_res;
		}

		// contrôle si existe déjà
		function existSpecal() {
			$nom_table = $this->db->prefix('resman_specal');
			$sql = new ResManagerStmt("select count(*) nb "." from ".$nom_table." where "." year_specal = ".$this->year. ($this->month == null ? " and month_specal is null " : " and month_specal = ".$this->month). ($this->day == null ? " and day_specal is null " : " and day_specal = ".$this->day). ($this->time == null ? " and time_specal is null " : " and time_specal = ".$this->time)." and id_reserv_specal = ".$this->id_reserv);

			$result = $this->db->queryF($sql->requete);

			if ($result) {

				$row = $this->db->fetchArray($result);
				if ($row['nb'] > 0)
					return true;
				else
					return false;

			} else
				return false;

		}

		// Vérifie si validation possible
		// Renvoie true si ok
		// sinon message erreur
		function checkValid($error) {

			return true;

		}

		// A partir d'un tableau qui est une image de specal
		// renvoie un tableau indiquant si ouvert ou non
		function getTimeOpenClose($tab, $timestampjour, $day, $heure_deb, $heure_fin, $tab_open_time, $id_reserv, $tab_valdem) {

			$day_close = false;
			$time_close = array ();
			$i = 0;
			$nb_max = 0;
			$cat = "";

			while ($day_close == false and $i < count($tab)) {
				// Lecture des infos d'ouverture et contrôle si le nombre de demndes == nbre maxi
				if (($tab[$i]['date_deb_cal'] > $timestampjour or $tab[$i]['date_fin_cal'] < $timestampjour) or $tab[$i]['day_open'] == '0' or (!isset ($tab[$i]['day_specal']) and !isset ($tab[$i]['time_specal']) and isset ($tab[$i]['month_specal']) and isset ($tab[$i]['year_specal'])) or (isset ($tab[$i]['day_specal']) and $tab[$i]['day_specal'] == $day and !isset ($tab[$i]['time_specal'])) or $tab[$i]['active_reserv'] == 0) {
					$day_close = true;
				} else
					if (isset ($tab[$i]['day_specal']) and $tab[$i]['day_specal'] == $day and isset ($tab[$i]['time_specal'])) {
						$time_close[$tab[$i]['time_specal']] = 1;
						;
					}

				$nb_max = $tab[$i]['nbocc_reserv'];
				$i ++;

			}

			$tab_open_time[$tab[0]['id_cat']]['nom_cat'] = $tab[0]['nom_cat'];
			$nom_res = $tab[0]['nom_reserv'];

			for ($i = $heure_deb; $i <= $heure_fin; $i ++) {
				$tab_open_time[$tab[0]['id_cat']]['time'][$i]['res'][$id_reserv]['nom_res'] = $nom_res;

				if ($day_close == true or isset ($time_close[$i]) or (isset ($tab_valdem[$id_reserv][$i]) and $tab_valdem[$id_reserv][$i] >= $nb_max) or ($tab[0]['heure_deb_cal'] > $i or $tab[0]['heure_fin_cal'] < $i)) {

					$tab_open_time[$tab[0]['id_cat']]['time'][$i]['res'][$id_reserv]['status'] = 0;
				} else {
					$tab_open_time[$tab[0]['id_cat']]['time'][$i]['res'][$id_reserv]['status'] = 1;
				}
			}
			
			return $tab_open_time;
		}

		// Renvoie par heure le nombre de réservations
		function getTimeNbValDem() {
			$nom_table1 = $this->db->prefix('resman_reservation')." as res";
			$nom_table4 = $this->db->prefix('resman_demcal')." as demcal";
			$nom_table5 = $this->db->prefix('resman_demande')." as dem";

			// Calcul du nombre de réservation		
			$sql = new ResManagerStmt("select res.id_reserv, "." time_demcal, 		"." count(*) nb          "." from 	".$nom_table1." , ".$nom_table4.",  ".$nom_table5." where res.id_reserv = dem.id_reserv_dem "." and dem.id_dem = demcal.id_dem_demcal "." and dem.status_dem = ".DEMANDE_VALIDE." and demcal.year_demcal = ".$this->year." and demcal.month_demcal = ".$this->month." and demcal.day_demcal = ".$this->day." and type_reserv =".RES_CALENDRIER." group by id_reserv, time_demcal "." ");

			$result = $this->db->queryF($sql->requete);
			$tab_desres = array ();

			// Req ok
			if ($result and $this->db->getRowsNum($result) >= 1) {

				while ($row = $this->db->fetchArray($result)) {
					$tab_desres[$row['id_reserv']][$row['time_demcal']] = $row['nb'];
				}
			}

			return $tab_desres;

		}

		// Pour une réservation et un jour renvoie dispo ou non pour chaque heure
		// year, month, day doivent être rempli
		function getTabTime($heure_deb, $heure_fin, $id_cat) {

			$nom_table1 = $this->db->prefix('resman_reservation')." as res";
			$nom_table2 = $this->db->prefix('resman_cal')." as cal";
			$nom_table4 = $this->db->prefix('resman_categorie')." as cat";
			$nom_table3 = $this->db->prefix('resman_specal');

			$datejour = mktime(0, 0, 0, $this->month, $this->day, $this->year);
			$cal_jd = unixtojd($datejour);
			$calendar = cal_from_jd($cal_jd, CAL_GREGORIAN);
			global $tab_suff_jour;

			// Recherche les demandes pour cette journée
			$tab_desres = $this->getTimeNbValDem();

			// Définit si une réservation est ouverte ou non
			$sql = new ResManagerStmt("select  cat.id_cat, cat.nom_cat, "." res.nom_reserv ,  "." res.id_reserv, "." active_reserv, "." cal.date_deb_cal, "." cal.date_fin_cal, "." SUBSTRING(cal.open_sem_cal,". ($calendar['dow'] + 1).",1) day_open, "." day_specal, "." time_specal, "." year_specal, "." month_specal, "." nbocc_reserv, ".
				//" heure_deb_cal, ".
		//" heure_fin_cal ".
	"heure_deb_".$tab_suff_jour[$calendar['dow']]." as heure_deb_cal, "."heure_fin_".$tab_suff_jour[$calendar['dow']]." as heure_fin_cal"." from 	".$nom_table1." , ".$nom_table2." , ".$nom_table4."  "." left join ".$nom_table3." on ( res.id_reserv = ".$nom_table3.".id_reserv_specal "." and year_specal = ".$this->year." and month_specal = ".$this->month." ) "." where res.id_reserv = cal.id_reserv_cal "." and cat.id_cat = res.idcat_reserv "." and type_reserv =".RES_CALENDRIER." and cat.id_cat = ".$id_cat." ");

			$result = $this->db->queryF($sql->requete);

			// Req ok
			if ($result and $this->db->getRowsNum($result) >= 1) {
				$tab = array (); // Résultat
				$tab_res = array (); // Infos d'ouverture d'une résérvation
				$day_close = false; // Jour fermé
				$time_close = array (); // Heure fermée			
				$rup_id_res = null; // Rupture id reserv

				while ($row = $this->db->fetchArray($result)) {

					if ($row['id_reserv'] != $rup_id_res and $rup_id_res != null) {
						// $this->getTimeOpenClose($tab_res, $datejour, $this->day, $heure_deb, $heure_fin, & $tab, $rup_id_res, $tab_desres);
						$tab = $this->getTimeOpenClose($tab_res, $datejour, $this->day, $heure_deb, $heure_fin, $tab, $rup_id_res, $tab_desres);
						$tab_res = array ();
					}

					$tab_res[] = $row;
					$rup_id_res = $row['id_reserv'];

				}

				// $this->getTimeOpenClose($tab_res, $datejour, $this->day, $heure_deb, $heure_fin, & $tab, $rup_id_res, $tab_desres);
				$tab = $this->getTimeOpenClose($tab_res, $datejour, $this->day, $heure_deb, $heure_fin, $tab, $rup_id_res, $tab_desres);

				return $tab;
			} else {
				// Req Ko
				return false;
			}
		}
	}
}
?>


