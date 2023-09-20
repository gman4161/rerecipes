<?php //file to remove the selected item from the current player
if(!session_id()) session_start();
include "./DBConnect.php";

if(isset($_POST['del_char'])){
    $query =
    "DELETE FROM `dndd`.`character_has_spell`
    where Character_idCharacter = {$_POST['del_char']};";
    query($query);
    $query =
    "DELETE FROM `dndd`.`character_has_item`
    where Character_idCharacter = {$_POST['del_char']};";
    query($query);
    $query =
    "DELETE FROM `dndd`.`character`
    where idCharacter = {$_POST['del_char']};";
    query($query);

}
header("Location: ../chooseChar.php");
?>