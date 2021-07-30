<?php

/*
*	GamemodeCMDs - By Milchreisfan
*	GitHub: https://github.com/Milchreisfan/
*/

namespace Milchreisfan\GamemodeCMDs;

use Milchreisfan\GamemodeCMDs\commands\GM0Command;
use Milchreisfan\GamemodeCMDs\commands\GM1Command;
use Milchreisfan\GamemodeCMDs\commands\GM2Command;
use Milchreisfan\GamemodeCMDs\commands\GM3Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\permission\DefaultPermissions;
use pocketmine\permission\Permission;
use pocketmine\Player;
use pocketmine\Server;

class Main extends PluginBase implements Listener {

    public function onEnable() {
        $this->getServer()->getCommandMap()->registerAll("gamemodecmds", [
            new GM0Command(),
            new GM1Command(),
            new GM2Command(),
            new GM3Command()
        ]);
        $this->getLogger()->info("GamemodeCMDs ist aufgewacht! - By Milchreisfan");
    }
    public function onDisable() {
        $this->getScheduler()->cancelAllTasks();
        $this->getLogger()->error("GamemodeCMDs ist eingeschlafen! - Error - Kontaktiere Milchreisfan bei GitHub!");
    }

    public function registerPermission(): void
    {
        DefaultPermissions::registerPermission(new Permission("gm0.cmd"));
        DefaultPermissions::registerPermission(new Permission("gm1.cmd"));
        DefaultPermissions::registerPermission(new Permission("gm2.cmd"));
        DeafultPermissions::registerPermission(new Permission("gm3.cmd"));
    }
}