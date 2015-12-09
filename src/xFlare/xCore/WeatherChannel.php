<?php
/*
 _____           _        _   _____  _           
|  __ \         | |      | | |  __ \| |          
| |__) |__   ___| | _____| |_| |__) | |_   _ ___ 
|  ___/ _ \ / __| |/ / _ \ __|  ___/| | | | / __|
| |  | (_) | (__|   <  __/ |_| |    | | |_| \__ \
|_|   \___/ \___|_|\_\___|\__|_|    |_|\__,_|___/
*/

/*
- Channels the weather to players that have just joined the server.
- Very important class!
*/
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Server;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\entity\EntityShootBowEvent;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\event\inventory\InventoryPickupItemEvent;

   class WeatherChannel implements Listener{
	      public function __construct(Loader $plugin){
          $this->plugin = $plugin;
       }
       public function onJoin($event PlayerJoinEvent){
          if($this->plugin->weather === true){
              return;
          }
          //Packet
       }
 }
