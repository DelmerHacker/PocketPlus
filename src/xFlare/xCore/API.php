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
- This class creates aa handy-dandy API to allow plugins to control these new features.
- Each function only returns true or false.
- This class is optional and only gets registered if enabled.
*/
namespace xFlare\PocketPlus;

use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Server;

class API implements Listener{
	   public function __construct(Loader $plugin){
        $this->plugin = $plugin;
    }
    public function isWeatherToggle(){
        return $this->plugin->weather;
    }
}
