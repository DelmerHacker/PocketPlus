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
- Loads every thing up and checks for config errors.
*/
namespace xFlare\xAuth;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Server;

class Loader extends PluginBase implements Listener{
  
  public $weatherlog = [];
  public $playerhunger = [];
  public $playerenchantment = [];
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->version = "1.0.0 beta 1";
    $this->getServer()->getLogger()->info("§dPocketPlus §3by §axFlare §3is enabled§7!");
    $this->saveDefaultConfig();
    $this->status = null; //Plugin starting up...
    $this->weather = "sun";
    $this->weatherticks = 0;
    $this->debug = $this->getConfig()->get("debug-mode");
    $this->startPlugin();
  }
  
  public function startPlugin(){
    if($this->checkForConfigErrors() && $this->status === null){
      $this->status = "enabled";
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
