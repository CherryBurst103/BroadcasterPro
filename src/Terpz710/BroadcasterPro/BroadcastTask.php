<?php

namespace Terpz710\BroadcasterPro;

use pocketmine\plugin\Plugin;
use pocketmine\scheduler\Task;

class BroadcastTask extends Task {
    private $plugin;
    private $messages;
    private $currentIndex;

    public function __construct(Plugin $plugin) {
        $this->plugin = $plugin;
        $this->messages = $plugin->getConfig()->get("message");
        $this->currentIndex = 0;
    }

    public function onRun(int $currentTick): void {
        $message = $this->messages[$this->currentIndex];
        
        foreach ($this->plugin->getServer()->getOnlinePlayers() as $player) {
            $player->sendMessage($message);
        }

        $this->currentIndex++;

        if ($this->currentIndex >= count($this->messages)) {
            $this->currentIndex = 0;
        }
    }
}
