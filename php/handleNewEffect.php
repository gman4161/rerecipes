<?php //input item into the database
if(!session_id()) session_start();
include "DBConnect.php";

if(isset($_POST['subItem'])){
  $sql = "
    INSERT INTO `dndd`.`item`
    (
    `Name`,
    `Buff_Stat`,
    `Buff_Type`,
    `Buff_Amount`)
    VALUES
    (\"{$_POST['item_name']}\",
    \"{$_POST['buff_stat']}\",
    \"{$_POST['buff_type']}\",
    {$_POST['buff_amount']});
  ";
  query($sql);

  header("Location: ../listItems.php");


  

}elseif($_POST['subSpell']){
  $sql = "
    INSERT INTO `dndd`.`spell`
    (
    `Name`,
    `School`,
    `Level`,
    `Components`,
    `CastingTime`,
    `Range`,
    `Effect`,
    `Target`,
    `Duration`,
    `SavingThrow`,
    `SpellResistance`,
    `Description`,
    `Buff_Stat`, 
    `Buff_Type`, 
    `Buff_Amount`
    )
    VALUES
    (
    \"{$_POST['spell_name']}\",
    \"{$_POST['school']}\",
    \"{$_POST['spell_level']}\",
    \"{$_POST['components']}\",
    \"{$_POST['casting_time']}\",
    \"{$_POST['range']}\",
    \"{$_POST['effect']}\",
    \"{$_POST['target']}\",
    \"{$_POST['duration']}\",
    \"{$_POST['saving_throw']}\",
    \"{$_POST['spell_resistance']}\",
    \"{$_POST['description']}\",
    \"{$_POST['buff_stat']}\",
    \"{$_POST['buff_type']}\",
    \"{$_POST['buff_amount']}\");
  ";
  query($sql);

  header("Location: ../listSpells.php");




}elseif($_POST['subChar']){
  $sql = "INSERT INTO `dndd`.`character`
  (
  `Name`,
  `AttackBonus`,
  `ArmorClass`,
  `Strength`,
  `Dexterity`,
  `Constitution`,
  `Intelligence`,
  `Wisdom`,
  `Charisma`,
  `Fortitude`,
  `Reflex`,
  `Will`,
  `Account_idAccount`) VALUES
  (
  \"{$_POST['name']}\",
  {$_POST['atk_bonus']},
  {$_POST['armor_class']},
  {$_POST['strength']},
  {$_POST['dexterity']},
  {$_POST['constitution']},
  {$_POST['intelligence']},
  {$_POST['wisdom']},
  {$_POST['charisma']},
  {$_POST['fortitude']},
  {$_POST['reflex']},
  {$_POST['will']},
  {$_SESSION['userID']});";
  
  query($sql);
  
  header("Location: ../chooseChar.php");



}elseif(($_POST['editChar'])){
  $sql = "UPDATE `dndd`.`character` SET
  `Name`=\"{$_POST['name']}\",
  `AttackBonus`={$_POST['atk_bonus']},
  `ArmorClass`={$_POST['armor_class']},
  `Strength`={$_POST['strength']},
  `Dexterity`={$_POST['dexterity']},
  `Constitution`={$_POST['constitution']},
  `Intelligence`={$_POST['intelligence']},
  `Wisdom`={$_POST['wisdom']},
  `Charisma`={$_POST['charisma']},
  `Fortitude`={$_POST['fortitude']},
  `Reflex`={$_POST['reflex']},
  `Will`={$_POST['will']}
  WHERE `idCharacter` = {$_POST['idCharacter']};";
  
  query($sql);
  
  header("Location: ../sheet.php?idCharacter={$_POST['idCharacter']}");



}else{
  $_SESSION['reason'] = "An error has occured: handleNewEffect404";
  header("Location: ../index.php");
}

?>