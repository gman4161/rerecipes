use rerecipes;
/*select * from viewAccounts;*/
DROP VIEW IF EXISTS viewAccounts;
CREATE VIEW viewAccounts AS
select idaccount, username, "****" as Password from account order by idaccount;

/*CALL addAccount("rere", "rereengel");*/
drop procedure if exists addAccount;
DELIMITER $
CREATE PROCEDURE `addAccount` (UN varchar(20), pass varchar(45))
BEGIN
	INSERT INTO `rerecipes`.`account`
	(`username`, `password`)
	VALUES (UN, pass);
END$ DELIMITER ;

drop procedure if exists addRecipe;
DELIMITER $

CREATE PROCEDURE `addRecipe` (accID INT, rname varchar(45), rdesc longtext)
BEGIN
	INSERT INTO `rerecipes`.`recipe` (`account_idaccount`,`recipeName`,`recipeDescription`)
	VALUES (accID,rname,rdesc);
END$ DELIMITER ;

/*call addAccount("rere", "rereengel");
select * from viewaccounts;
*/