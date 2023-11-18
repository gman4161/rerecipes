-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema rerecipes
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `rerecipes` ;

-- -----------------------------------------------------
-- Schema rerecipes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rerecipes` DEFAULT CHARACTER SET utf8 ;
USE `rerecipes` ;

-- -----------------------------------------------------
-- Table `rerecipes`.`account`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rerecipes`.`account` ;

CREATE TABLE IF NOT EXISTS `rerecipes`.`account` (
  `idaccount` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE,
  PRIMARY KEY (`idaccount`),
  UNIQUE INDEX `idaccount_UNIQUE` (`idaccount` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rerecipes`.`recipe`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rerecipes`.`recipe` ;

CREATE TABLE IF NOT EXISTS `rerecipes`.`recipe` (
  `idrecipe` INT NOT NULL AUTO_INCREMENT,
  `account_idaccount` INT NOT NULL,
  `recipeName` VARCHAR(45) NOT NULL,
  `dateAdded` DATE NOT NULL DEFAULT (current_date()),
  `recipeDescription` LONGTEXT NULL,
  PRIMARY KEY (`idrecipe`),
  UNIQUE INDEX `idrecipe_UNIQUE` (`idrecipe` ASC) VISIBLE,
  INDEX `fk_recipe_account_idx` (`account_idaccount` ASC) VISIBLE,
  CONSTRAINT `fk_recipe_account`
    FOREIGN KEY (`account_idaccount`)
    REFERENCES `rerecipes`.`account` (`idaccount`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rerecipes`.`Ingredients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rerecipes`.`Ingredients` ;

CREATE TABLE IF NOT EXISTS `rerecipes`.`Ingredients` (
  `idingredients` INT NOT NULL AUTO_INCREMENT,
  `nameIngredient` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idingredients`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rerecipes`.`recipe_has_Ingredients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rerecipes`.`recipe_has_Ingredients` ;

CREATE TABLE IF NOT EXISTS `rerecipes`.`recipe_has_Ingredients` (
  `recipe_idrecipe` INT NOT NULL,
  `Ingredients_idingredients` INT NOT NULL,
  `amount` FLOAT NOT NULL,
  `measurement` VARCHAR(45) NULL,
  PRIMARY KEY (`recipe_idrecipe`, `Ingredients_idingredients`),
  INDEX `fk_recipe_has_Ingredients_Ingredients1_idx` (`Ingredients_idingredients` ASC) VISIBLE,
  INDEX `fk_recipe_has_Ingredients_recipe1_idx` (`recipe_idrecipe` ASC) VISIBLE,
  CONSTRAINT `fk_recipe_has_Ingredients_recipe1`
    FOREIGN KEY (`recipe_idrecipe`)
    REFERENCES `rerecipes`.`recipe` (`idrecipe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recipe_has_Ingredients_Ingredients1`
    FOREIGN KEY (`Ingredients_idingredients`)
    REFERENCES `rerecipes`.`Ingredients` (`idingredients`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rerecipes`.`steps`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rerecipes`.`steps` ;

CREATE TABLE IF NOT EXISTS `rerecipes`.`steps` (
  `idsteps` INT NOT NULL AUTO_INCREMENT,
  `stepnum` INT NOT NULL,
  `stepDescription` LONGTEXT NOT NULL,
  `recipe_idrecipe` INT NOT NULL,
  PRIMARY KEY (`idsteps`, `recipe_idrecipe`),
  INDEX `fk_steps_recipe1_idx` (`recipe_idrecipe` ASC) VISIBLE,
  CONSTRAINT `fk_steps_recipe1`
    FOREIGN KEY (`recipe_idrecipe`)
    REFERENCES `rerecipes`.`recipe` (`idrecipe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
