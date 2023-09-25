<?php

namespace Terpz710\BroadcasterPro;

use pocketmine\plugin\Plugin;
use pocketmine\scheduler\Task;
use pocketmine\utils\Config;

class BroadcastTask extends Task {
    private $plugin;
    private $messages;
    private $currentIndex;

    public function __construct(Plugin $plugin, array $messages) {
        $this->plugin = $plugin;
        $this->messages = $messages;
        $this->currentIndex = 0;
    }

    public function onRun() {
        if ($this->currentIndex >= count($this->messages)) {
            $this->currentIndex = 0;
        }

        $message = $this->messages[$this->currentIndex];

        foreach ($this->plugin->getServer()->getOnlinePlayers() as $player) {
            $player->sendMessage($message);
        }

        $this->currentIndex++;
    }
}
