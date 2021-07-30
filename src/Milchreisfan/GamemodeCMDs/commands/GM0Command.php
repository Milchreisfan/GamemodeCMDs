<?php

namespace Milchreisfan\\Milchreisfan\GamemodeCMDs\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class GM0Command extends Command {

    public function __construct()
    {
        parent::__construct("gm0", "Change your gamemode to survival!");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $c = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        if ($sender instanceof Player) {
            if (!$sender->hasPermission("gm0.cmd")) {
                $sender->sendMessage($c->get("no-permissions"));
                return;
            }
            $sender->setGamemode(0);
            $sender->sendMessage($c->get("gm0-message"));
            return;
        }
        $sender->sendMessage($c->get("console"));
    }
}