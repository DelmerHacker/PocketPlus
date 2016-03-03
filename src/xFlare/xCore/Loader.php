<?php
/*
 _____           _        _   _____  _           
|  __ \         | |      | | |  __ \| |          
| |__) |__   ___| | _____| |_| |__) | |_   _ ___ 
|  ___/ _ \ / __| |/ / _ \ __|  ___/| | | | / __|
| |  | (_) | (__|   <  __/ |_| |    | | |_| \__ \
|_|   \___/ \___|_|\_\___|\__|_|    |_|\__,_|___/
*/

namespace xFlare\xAuth;

use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Server;
use pocketmine\network\protocol\LevelEventPacket;
use pocketmine\network\protocol\AddEntityPacket;
/*
- Loads every thing up & starts the plugin.
*/
class Loader extends PluginBase implements Listener{
 
  public $playerhunger = [];
  public $playerenchantment = [];
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->version = "1.0.0 beta 1";
    $this->getServer()->getLogger()->info("§dPocketPlus §3by §axFlare §3is enabled§7!");
    $this->saveDefaultConfig();
    $this->status = null; //Plugin starting up...
    $this->weather = null;
    $this->weatherticks = 0;
    $this->debug = $this->getConfig()->get("debug-mode");
    $this->startPlugin();
    $this->weatherEnabled = $this->getCondfig()->get("enable-weather");
  }
  public function startPlugin(){
  	$this->ticks = 0;
  	if($this->weatherEnabled()){
  		$this->weather = mt_rand(0, 2);
  	}
  }

  
  public function checkForConfigErrors(){
    return true;
  }
