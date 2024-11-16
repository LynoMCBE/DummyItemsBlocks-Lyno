<?php

namespace diamondgold\DummyItemsBlocks\block;

use diamondgold\DummyItemsBlocks\block\enum\CrackedState;
use diamondgold\DummyItemsBlocks\block\trait\CrackedStateTrait;
use diamondgold\DummyItemsBlocks\block\trait\NoneSupportTrait;
use diamondgold\DummyItemsBlocks\Main;
use pocketmine\block\Transparent;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\player\Player;

class SnifferEgg extends Transparent
{
    use CrackedStateTrait;
    use NoneSupportTrait;

}
