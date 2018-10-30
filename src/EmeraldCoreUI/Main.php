<?php
namespace EmeraldCoreUI;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use jojoe77777\FormAPI;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\server\ServerCommandEvent;
use pocketmine\Player;
use pocketmine\Server;
use jojoe77777\FormAPI;

class EmeraldCoreUI extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getLogger()->info("§a[EmeraldCoreUI] §bBy §dEmeraldMC §aENABLED§7!");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        }
    }

    public function checkDepends(){
        $this->formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        if(is_null($this->formapi)){
            $this->getLogger()->error("§a[EmeraldCoreUI]§c Requires §eFormAPI§c to run properly!");
            $this->getPluginLoader()->disablePlugin($this);
        }
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool{
        if($cmd->getName() == "ecore"){
        if(!($sender instanceof Player)){
                $sender->sendMessage("§cPlease use this command from In-game!", false);
                return true;
        }
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                    case 0:
                    $sender->sendMessage("§a[EmeraldCoreUI] §cExiting Menu§7!");
                        break;
                    case 1:
                    $this->getServer()->getCommandMap()->dispatch($player, "help");
                        break;
                    case 2:
                    $this->getServer()->getCommandMap()->dispatch($player, "nick");
                        break;
                    case 3:
                    $this->getServer()->getCommandMap()->dispatch($player, "fly");
                        break;
                    case 4:
                    $this->getServer()->getCommandMap()->dispatch($player, "spawn");
                        break;
                    case 5:
                    $this->getServer()->getCommandMap()->dispatch($player, "shopui");
                        break;
                    case 6:
                    $this->getServer()->getCommandMap()->dispatch($player, "kits");
                        break;
                    case 7:
                    $sender->sendMessage("§a[EmeraldCoreUI] §6Crates Coming Soon!");
                        break;
                    case 8:
                    $sender->sendMessage("§a[EmeraldCoreUI] §6Warps Coming Soon!");
                        break;
                    case 9:
                    $sender->sendMessage("§a[EmeraldCoreUI] §6Morphs Coming Soon!");
                        break;
                    case 10:
                    $sender->sendMessage("§a[EmeraldCoreUI] §6Pets Coming Soon!");
                        break;
                    case 11:
                    $sender->sendMessage("§a[EmeraldCoreUI] §6Auctions Coming Soon!");
                        break;
                    case 12:
                    $sender->sendMessage("§a[EmeraldCoreUI] §6Report Coming Soon!");
                        break;
            }
        });
        $form->setContent("§a[§l§7EmeraldCoreUI§r§a]§r");
        $form->addButton("§cEXIT");
        $form->addButton("§2HELP MENU");
        $form->addButton("§6NICKNAME");
        $form->addButton("§6FLYMODE");
        $form->addButton("§6SPAWN");
        $form->addButton("§6SHOP");
        $form->addButton("§6KITS");
        $form->addButton("§6CRATES");
        $form->addButton("§6WARPS");
        $form->addButton("§6MORPHS");
        $form->addButton("§6PETS");
        $form->addButton("§6AUCTION");
        $form->addButton("§6REPORT");
        $form->sendToPlayer($sender);
        }
        return true;
    }

    public function onDisable(){
        $this->getLogger()->info("§a[EmeraldCoreUI] §dDisabled§7!");
    }
}
