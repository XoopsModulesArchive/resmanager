<?php
include("../../mainfile.php");
include("../../header.php");
xoops_header();

$myts =& MyTextSanitizer::getInstance();



echo "<div align=center >";
echo "<table class=outer cellspacing=1 width=100%>";

echo "<tr><th align=left>"._MD_NOM_MEMBRE."</th>";
echo "<th align=left>"._MD_TITLE_TITLE_NODEM."</th>";
echo "<th align=left>"._MD_COMMENTAIRE."</th></tr>";

if ( !empty($_GET['message']) )
  echo $myts->stripSlashesGPC($_GET['message']);
else
  echo _MD_NORESERV;

echo "</table>";
echo "</div>";

?>
