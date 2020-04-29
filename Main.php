<?php

declare(strict_types=1);

namespace TheAMDGuy\DayandNight;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{
	/** @var string[] */
	private $config;

	public function onEnable() : void
	{
		$this->config = $this->getConfig()->getAll();
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
	{
		switch ($command->getName()){
			case "day":
				if ($sender->hasPermission("dan.day")) {
					if ($sender instanceof Player){
						$level = $sender->getLevel();
						$level->setTime(0);
						$sender->sendMessage(TextFormat::GREEN.$this->config["succesday"]);
						return true;
					} else {
						$sender->sendMessage(TextFormat::DARK_RED.$this->config["ingameonly"]);
						return true;
					}
				} else {
					$sender->sendMessage(TextFormat::DARK_RED.$this->config["nopermission"]);
					return true;
				}
			case "night":
				if ($sender->hasPermission("dan.night")){
					if ($sender instanceof Player){
						$level = $sender->getLevel();
						$level->setTime(14000);
						$sender->sendMessage(TextFormat::GREEN.$this->config["succesnight"]);
						return true;
					} else {
						$sender->sendMessage(TextFormat::DARK_RED.$this->config["ingameonly"]);
						return true;
					}
				} else {
					$sender->sendMessage(TextFormat::DARK_RED.$this->config["nopermission"]);
					return true;
				}
			case "set":
				if ($sender->hasPermission("dan.set")){
					if ($sender instanceof Player){
						$level = $sender->getLevel();
						$level->setTime(18000);
						$sender->sendMessage(TextFormat::GREEN.$this->config["successet"]);
						return true;
					} else {
						$sender->sendMessage(TextFormat::DARK_RED.$this->config["ingameonly"]);
						return true;
					}
				} else {
					$sender->sendMessage(TextFormat::DARK_RED.$this->config["nopermission"]);
					return true;
				}
			case "rise":
				if ($sender->hasPermission("dan.rise")){
					if ($sender instanceof Player){
						$level = $sender->getLevel();
						$level->setTime(23000);
						$sender->sendMessage(TextFormat::GREEN.$this->config["succesrise"]);
						return true;
					} else {
						$sender->sendMessage(TextFormat::DARK_RED.$this->config["ingameonly"]);
						return true;
					}
				} else {
					$sender->sendMessage(TextFormat::DARK_RED.$this->config["nopermission"]);
					return true;
				}
			case "midday":
				if ($sender->hasPermission("dan.midday")){
					if ($sender instanceof Player){
						$level = $sender->getLevel();
						$level->setTime(6000);
						$sender->sendMessage(TextFormat::GREEN.$this->config["succesmidday"]);
						return true;
					} else {
						$sender->sendMessage(TextFormat::DARK_RED.$this->config["ingameonly"]);
						return true;
					}
				} else {
					$sender->sendMessage(TextFormat::DARK_RED.$this->config["nopermission"]);
					return true;
				}
			case "midnight":
				if ($sender->hasPermission("dan.midnight")){
					if ($sender instanceof Player){
						$level = $sender->getLevel();
						$level->setTime(18000);
						$sender->sendMessage(TextFormat::GREEN.$this->config["succesmidnight"]);
						return true;
					} else {
						$sender->sendMessage(TextFormat::DARK_RED.$this->config["ingameonly"]);
						return true;
					}
				} else {
					$sender->sendMessage(TextFormat::DARK_RED.$this->config["nopermission"]);
					return true;
				}
			case "dayandnight":
				if ($sender->hasPermission("dan.info")){
					$sender->sendMessage(TextFormat::AQUA.$this->config["avaiable"]);
					if ($sender->hasPermission("dan.day")){
						$sender->sendMessage(TextFormat::GREEN.$this->config["daycommandav"]);
					}
					if ($sender->hasPermission("dan.night")){
						$sender->sendMessage(TextFormat::GREEN.$this->config["nightcommandav"]);
					}
					if ($sender->hasPermission("dan.set")){
						$sender->sendMessage(TextFormat::GREEN.$this->config["setcommandav"]);
					}
					if ($sender->hasPermission("dan.rise")){
						$sender->sendMessage(TextFormat::GREEN.$this->config["risecommandav"]);
					}
					if ($sender->hasPermission("dan.midday")){
						$sender->sendMessage(TextFormat::GREEN.$this->config["middaycommandav"]);
					}
					if ($sender->hasPermission("dan.midnight")){
						$sender->sendMessage(TextFormat::GREEN.$this->config["midnightcommandav"]);
					}
					return true;
				} else {
					$sender->sendMessage(TextFormat::DARK_RED.$this->config["nopermission"]);
					return true;
				}

		}
		return true;
	}
}
