<?php

namespace Milchreisfan\\Milchreisfan\GamemodeCMDs\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class GM2Command extends Command {

    public function __construct()
    {
        parent::__construct("gm2", "Change your gamemode to adventuere!");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $c = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        if ($sender instanceof Player) {
            if (!$sender->hasPermission("gm2.cmd")) {
                $sender->sendMessage($c->get("no-permissions"));
                return;
            }
            $sender->setGamemode(2);
            $sender->sendMessage($c->get("gm2-message"));
            return;
        }
        $sender->sendMessage(TextFormat::RED . "Diesen Befehl kannst du nur Ingame ausführen.");
    }
}