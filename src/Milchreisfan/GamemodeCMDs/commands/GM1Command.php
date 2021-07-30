<?php

namespace Milchreisfan\\Milchreisfan\GamemodeCMDs\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class GM1Command extends Command {

    public function __construct()
    {
        parent::__construct("gm1", "Change your gamemode to creative!");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $c = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        if ($sender instanceof Player) {
            if (!$sender->hasPermission("gm1.cmd")) {
                $sender->sendMessage($c->get("no-permissions"));
                return;
            }
            $sender->setGamemode(1);
            $sender->sendMessage($c->get("gm1-message"));
            return;
        }
        $sender->sendMessage($c->get("console"));
    }
}