<?php

namespace Terpz710\BroadcasterPro;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    public function onEnable(): void {
        $broadcastInterval = $this->getConfig()->get("broadcast_interval", 1200);
        $this->getScheduler()->scheduleRepeatingTask(new BroadcastTask($this), $broadcastInterval);
    }
}
