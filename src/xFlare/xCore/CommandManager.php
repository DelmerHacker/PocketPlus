<?
/*
 _____           _        _   _____  _           
|  __ \         | |      | | |  __ \| |          
| |__) |__   ___| | _____| |_| |__) | |_   _ ___ 
|  ___/ _ \ / __| |/ / _ \ __|  ___/| | | | / __|
| |  | (_) | (__|   <  __/ |_| |    | | |_| \__ \
|_|   \___/ \___|_|\_\___|\__|_|    |_|\__,_|___/
*/

/*
- Command manager manages commands.
- The API here is private and cannot be used.
*/
namespace xFlare\xAuth;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;

class CommandManager extends Command{
	public function __construct(Loader $plugin){
        	$this->plugin = $plugin;
  	}
  	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
  	}
}
