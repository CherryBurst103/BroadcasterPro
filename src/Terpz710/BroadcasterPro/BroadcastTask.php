<?php

namespace Terpz710\BroadcasterPro;

use pocketmine\plugin\Plugin;
use pocketmine\scheduler\Task;

class BroadcastTask extends Task {
    private $plugin;

    public function __construct(Plugin $plugin) {
        $this->plugin = $plugin;
    }

    public function onRun(int $currentTick = -1): void {
        $message = $this->plugin->getConfig()->get("message");
        $line = $message[array_rand($message)]; // Select a random message line

        foreach ($this->plugin->getServer()->getOnlinePlayers() as $player) {
            $player->sendMessage($line);
        }
    }
}
