<?php
/*
 _____           _        _   _____  _           
|  __ \         | |      | | |  __ \| |          
| |__) |__   ___| | _____| |_| |__) | |_   _ ___ 
|  ___/ _ \ / __| |/ / _ \ __|  ___/| | | | / __|
| |  | (_) | (__|   <  __/ |_| |    | | |_| \__ \
|_|   \___/ \___|_|\_\___|\__|_|    |_|\__,_|___/
*/

use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Server;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\network\protocol\LevelEventPacket;
use pocketmine\network\protocol\AddEntityPacket;

   class WeatherChannel implements Listener{
/*
- Channels the weather to players that have just joined the server.
- Very important class!
*/
       public function __construct(Loader $plugin){
          $this->plugin = $plugin;
       }
       public function onJoin($event PlayerJoinEvent){
          if($this->plugin->weather === true){
              $pk = new LevelEventPacket();
	      $pk->evid = 3001;
	      $pk->data = 10000;
	      $event->getPlayer()->dataPacket($pk);
              return;
          }
          $pk = new LevelEventPacket();
          $pk->evid = 3003;
          $pk->data = 10000;
          $event->getPlayer()->dataPacket($pk);
       }
 }
