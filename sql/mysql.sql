
CREATE TABLE resman_cal (
  id_reserv_cal INTEGER UNSIGNED NOT NULL,
  open_sem_cal VARCHAR(8) NULL,
  min_res_cal INTEGER UNSIGNED NULL,
  heure_deb_cal INTEGER UNSIGNED NULL,
  heure_fin_cal INTEGER UNSIGNED NULL,
  date_deb_cal INTEGER UNSIGNED NULL,
  date_fin_cal INTEGER UNSIGNED NULL,
  heure_deb_lun INTEGER UNSIGNED NULL,
  heure_fin_lun INTEGER UNSIGNED NULL,
  heure_deb_mar INTEGER UNSIGNED NULL,
  heure_fin_mar INTEGER UNSIGNED NULL,
  heure_deb_mer INTEGER UNSIGNED NULL,
  heure_fin_mer INTEGER UNSIGNED NULL,
  heure_deb_jeu INTEGER UNSIGNED NULL,
  heure_fin_jeu INTEGER UNSIGNED NULL,
  heure_deb_ven INTEGER UNSIGNED NULL,
  heure_fin_ven INTEGER UNSIGNED NULL,
  heure_deb_sam INTEGER UNSIGNED NULL,
  heure_fin_sam INTEGER UNSIGNED NULL,
  heure_deb_dim INTEGER UNSIGNED NULL,
  heure_fin_dim INTEGER UNSIGNED NULL,
  PRIMARY KEY(id_reserv_cal)
);

CREATE TABLE resman_categorie (
  id_cat INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nom_cat VARCHAR(45) NOT NULL,
  descr_cat LONGTEXT NOT NULL,
  img_cat VARCHAR(255),
  PRIMARY KEY(id_cat)
);

CREATE TABLE resman_demande (
  id_dem INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_reserv_dem INTEGER UNSIGNED NOT NULL,
  id_user_dem INTEGER UNSIGNED NOT NULL,
  status_dem INTEGER UNSIGNED NOT NULL,
  mess_refus_dem LONGTEXT NULL,
  date_dem DATE NOT NULL,
  date_val_dem DATE NULL,
  comm_dem LONGTEXT NULL,
  PRIMARY KEY(id_dem)
);

CREATE TABLE resman_demcal (
  id_dem_demcal INTEGER UNSIGNED NOT NULL,
  year_demcal INTEGER UNSIGNED NULL,
  month_demcal INTEGER UNSIGNED NULL,
  day_demcal INTEGER UNSIGNED NULL,
  time_demcal INTEGER UNSIGNED NULL,
  fdate_demcal DATE NULL
);

CREATE TABLE resman_reservation (
  id_reserv INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nom_reserv VARCHAR(45) NULL,
  descr_reserv LONGTEXT NULL,
  type_reserv INTEGER UNSIGNED NULL,
  nbocc_reserv INTEGER UNSIGNED NULL,
  status_reserv INTEGER UNSIGNED NULL,
  idcat_reserv INTEGER UNSIGNED NULL,
  valid_reserv BOOL NULL,
  occpers_reserv INTEGER UNSIGNED NULL,
  active_reserv INTEGER UNSIGNED NULL,
  PRIMARY KEY(id_reserv)
);

CREATE TABLE resman_specal (
  id_reserv_specal INTEGER UNSIGNED NOT NULL,
  year_specal INTEGER UNSIGNED NULL,
  month_specal INTEGER UNSIGNED NULL,
  day_specal INTEGER UNSIGNED NULL,
  time_specal INTEGER UNSIGNED NULL
);

CREATE TABLE resman_infores (
  id_infores VARCHAR(45) NOT NULL,
  lib_infores VARCHAR(255) NULL,
  type_infores VARCHAR(20) NULL,
  oblig_infores CHAR(10) NULL,
  taille_infores INTEGER NULL,
  max_infores INTEGER NULL,
  PRIMARY KEY(id_infores)
);

CREATE TABLE resman_val_infores (
  id_infores VARCHAR(45) NOT NULL,
  id_res INTEGER(11) NOT NULL,
  val VARCHAR(255) NULL
);



