<?php

namespace Terpz710\BroadcasterPro;

use pocketmine\plugin\Plugin;
use pocketmine\scheduler\Task;

class BroadcastTask extends Task {
    private $plugin;

    public function __construct(Plugin $plugin) {
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
