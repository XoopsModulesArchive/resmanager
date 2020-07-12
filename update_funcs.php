<?php
if (!defined("RESMANAGER_UPDATE_FUNC")) {

	define("RESMANAGER_UPDATE_FUNC", 1);

	// Fonction qui passe des versions < 0.2.4 à la version 0.2.5
	function resmanager_to_025() {
		global $xoopsDB;

		// recherche un champ
		$sql = "SHOW COLUMNS FROM ".$xoopsDB->prefix('resman_cal')." LIKE 'heure_deb_lun' ";

		$result = $xoopsDB->queryF($sql);

		If (!$result) {
			// Problem with the query
			$ret = false;
		} else {
			// No problem in the query, let's continue
			$already_update = 0;
			$rowCount = $xoopsDB->getRowsNum($result);
			if ($rowCount == 0)
				$already_update = 0;
			else
				$already_update = 1;

			If ($already_update == 0) {
				$nom_table = $xoopsDB->prefix('resman_cal');
				$sql = "alter table ".$nom_table." add heure_deb_lun int(10) null,  "."											add heure_fin_lun int(10) null,  "."											add heure_deb_mar int(10) null,  "."											add heure_fin_mar int(10) null,  "."											add heure_deb_mer int(10) null,  "."											add heure_fin_dim int(10) null,  "."											add heure_deb_jeu int(10) null,  "."											add heure_fin_jeu int(10) null,  "."											add heure_deb_ven int(10) null,  "."											add heure_fin_ven int(10) null,  "."											add heure_deb_sam int(10) null,  "."											add heure_fin_mer int(10) null,  "."											add heure_deb_dim int(10) null,  "."											add heure_fin_sam int(10) null   ";

				If ($xoopsDB->queryF($sql)) {
					$sql = "update ".$nom_table." set heure_deb_lun = heure_deb_cal , "."											 heure_fin_lun = heure_fin_cal  , "."											 heure_deb_mar = heure_deb_cal  , "."											 heure_fin_mar = heure_fin_cal  , "."											 heure_deb_mer = heure_deb_cal  , "."											 heure_fin_dim = heure_fin_cal  , "."											 heure_deb_jeu = heure_deb_cal  , "."											 heure_fin_jeu = heure_fin_cal  , "."											 heure_deb_ven = heure_deb_cal  , "."											 heure_fin_ven = heure_fin_cal  , "."											 heure_deb_sam = heure_deb_cal  , "."											 heure_fin_mer = heure_fin_cal  , "."											 heure_deb_dim = heure_deb_cal  , "."											 heure_fin_sam = heure_fin_cal    "." where heure_deb_lun is null			";

					If ($xoopsDB->queryF($sql)) {
						// We successfully added the field user_lang
						$ret = true;
					} else {
						echo $xoopsDB->error();
					}
				} else {
					// an error occured while altering the table
					echo $xoopsDB->error();
					$ret = false;
				}
			} else
				$ret = true;
		}

		// recherche un champ
		$sql = "SHOW COLUMNS FROM ".$xoopsDB->prefix('resman_demande')." LIKE 'comm_dem' ";

		$result = $xoopsDB->queryF($sql);

		If (!$result) {
			// Problem with the query
			$ret = false;
		} else {

			// No problem in the query, let's continue
			$already_update_dem = 0;
			$rowCount = $xoopsDB->getRowsNum($result);
			if ($rowCount == 0)
				$already_update_dem = 0;
			else
				$already_update_dem = 1;

			If ($already_update_dem == 0) {
				$nom_table = $xoopsDB->prefix('resman_demande');
				$sql = "alter table ".$nom_table." add comm_dem longtext null  ";

				If ($xoopsDB->queryF($sql)) {
					$ret = true;
				} else {
					echo $xoopsDB->error();
					$ret = false;
				}
			} else
				$ret = true;

		}

		return $ret;

	}

	function resmanager_to_052() {
		global $xoopsDB;

		// recherche un champ
		$sql = "SHOW COLUMNS FROM ".$xoopsDB->prefix('resman_infores')." LIKE 'id_infores' ";

		$result = $xoopsDB->queryF($sql);

		If (!$result)
			$already_update = 0;
		else
			$already_update = 1;

		If ($already_update == 0) {
			$nom_table = $xoopsDB->prefix('resman_infores');
			$sql = "create table ".$nom_table." ( "."id_infores VARCHAR(45) NOT NULL, "."lib_infores VARCHAR(255) NULL, "."type_infores VARCHAR(20) NULL, "."oblig_infores CHAR(10) NULL, "."taille_infores INTEGER NULL, "."max_infores INTEGER NULL, "."PRIMARY KEY(id_infores) )";

			If ($xoopsDB->queryF($sql)) {
				// We successfully added the field user_lang
				$ret = true;
			} else {
				$ret = false;
				echo $xoopsDB->error();
			}
		} else
			$ret = true;

		// recherche un champ
		$sql = "SHOW COLUMNS FROM ".$xoopsDB->prefix('resman_val_infores')." LIKE 'id_infores' ";

		$result = $xoopsDB->queryF($sql);

		If (!$result)
			$already_update = 0;
		else
			$already_update = 1;

		If ($already_update == 0) {
			$nom_table = $xoopsDB->prefix('resman_val_infores');
			$sql = "create table ".$nom_table." ( "." id_infores VARCHAR(45) NOT NULL, "." id_res INTEGER(11) NOT NULL, "." val VARCHAR(255) NULL )";

			If ($xoopsDB->queryF($sql)) {
				// We successfully added the field user_lang
				$ret = true;
			} else {
				$ret = false;
				echo $xoopsDB->error();
			}
		} else
			$ret = true;

		return $ret;

	}

	function resmanager_to_053() {

		global $xoopsDB;

		// recherche un champ
		$sql = "SHOW COLUMNS FROM ".$xoopsDB->prefix('resman_categorie')." LIKE 'img_cat' ";

		$result = $xoopsDB->queryF($sql);

		If (!$result) {
			// Problem with the query
			$ret = false;
		} else {
			// No problem in the query, let's continue
			$already_update = 0;
			$rowCount = $xoopsDB->getRowsNum($result);
			if ($rowCount == 0)
				$already_update = 0;
			else
				$already_update = 1;

			If ($already_update == 0) {
				$nom_table = $xoopsDB->prefix('resman_categorie');
				$sql = "ALTER TABLE ".$nom_table." ADD img_cat VARCHAR( 255 )";

				If ($xoopsDB->queryF($sql)) {
					// We successfully added the field user_lang
					$ret = true;
				} else {
					$ret = false;
					echo $xoopsDB->error();
				}
			} else
				$ret = true;

		}

		return $ret;

	}

}
?>

