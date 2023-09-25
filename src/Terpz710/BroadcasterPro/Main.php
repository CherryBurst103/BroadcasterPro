<?php

namespace Terpz710\BroadcasterPro;

use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\Task;

class Main extends PluginBase {

    public function onEnable(): void {
        $broadcastInterval = $this->getConfig()->get("broadcast_interval", 1200);
    }
}

class BroadcastTask extends Task {
    private $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }

    public function onRun(int $currentTick) {
        $message = $this->plugin->getConfig()->get("message");

        foreach ($this->plugin->getServer()->getOnlinePlayers() as $player) {
            foreach ($message as $line) {
                $player->sendMessage($line);
            }
        }
    }
}
