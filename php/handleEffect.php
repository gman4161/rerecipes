<?php //insert an item into the character
if(!session_id()) session_start();
include("./DBConnect.php");

//add the selected item from <select> in sheet
if(isset($_POST['addItem'])){
        $sql = "INSERT IGNORE INTO `dndd`.`character_has_item`
                (`Character_idCharacter`,`Item_idItems`) VALUES
                ({$_SESSION['idCharacter']},
                {$_POST['idItem']});
        ";
        query($sql);

//add the selected spell from <select> in sheet
}elseif(isset($_POST['addSpell'])){
        $sql = "INSERT IGNORE INTO `dndd`.`character_has_spell`
                (`Character_idCharacter`,`Spell_idSpell`) VALUES
                ({$_SESSION['idCharacter']},
                {$_POST['idSpell']});
        ";
        query($sql);
}elseif(isset($_POST['delItem'])){
        $query = "DELETE FROM `dndd`.`character_has_item`
        WHERE {$_SESSION['idCharacter']} = `Character_idCharacter` AND {$_POST['delItem']} = `Item_idItems`;";

        query($query);

}elseif(isset($_POST['delSpell'])){
        $query = "DELETE FROM `dndd`.`character_has_spell`
        WHERE {$_SESSION['idCharacter']} = `Character_idCharacter` AND {$_POST['delSpell']} = `Spell_idSpell`;";

        query($query);
}

header("Location: ../sheet.php?idCharacter={$_SESSION['idCharacter']}");
?>