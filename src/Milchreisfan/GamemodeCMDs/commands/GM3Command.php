<?php

namespace Milchreisfan\\Milchreisfan\GamemodeCMDs\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class GM3Command extends Command {

    public function __construct()
    {
        parent::__construct("gm3", "Change your gamemode to spectator!");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $c = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        if ($sender instanceof Player) {
            if (!$sender->hasPermission("gm3.cmd")) {
                $sender->sendMessage($c->get("no-permissions"));
                return;
            }
            $sender->setGamemode(3);
            $sender->sendMessage($c->get("gm3-message"));
            return;
        }
        $sender->sendMessage($c->get("console"));
    }
}