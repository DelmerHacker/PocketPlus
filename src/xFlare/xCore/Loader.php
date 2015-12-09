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
  
 // public $weatherlog = []; Don't know if I will use this.
  public $playerhunger = [];
  public $playerenchantment = [];
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->version = "1.0.0 beta 1";
    $this->getServer()->getLogger()->info("§dPocketPlus §3by §axFlare §3is enabled§7!");
    $this->saveDefaultConfig();
    $this->status = null; //Plugin starting up...
    $this->weather = true;
    $this->weatherticks = 0;
    $this->debug = $this->getConfig()->get("debug-mode");
    $this->startPlugin();
    $this->weatherEnabled = $this->getCondfig()->get("enable-weather");
    if($this->weatherEnabled){
    	$this->startWeather(mt_rand(1, 4));
    }
  }
  public function startWeather($rand){
   if($rand === 2){
     $this->weather = true;
     foreach($this->getServer()->getOnlinePlayers() as $p){
      $pk = new LevelEventPacket();
      $pk->evid = 3001;
      $pk->data = 10000;
      $p->dataPacket($pk);
     }
   }
  }
  public function startPlugin(){
    if($this->checkForConfigErrors() && $this->status === null){
      $this->status = "enabled";
      $this->debug = $this->getConfig()-get("debug-mode");
      $this->getServer()->getPluginManager()->registerEvents(new CommandManager($this), $this);
      $this->getServer()->getPluginManager()->registerEvents(new WeatherManager($this), $this);
      $this->getServer()->getPluginManager()->registerEvents(new WeatherChannel($this), $this);
      $this->getServer()->getScheduler()->scheduleRepeatingTask(new TickManager($this), $this->getConfig()->get("tick-rate"));
      if($this->getConfig()->get("enable-api")){
        $this->getServer()->getPluginManager()->registerEvents(new API($this), $this);
      }
      return;
    }
    $this->status = "failed";
  }
  
  public function checkForConfigErrors(){
    return true;
  }
