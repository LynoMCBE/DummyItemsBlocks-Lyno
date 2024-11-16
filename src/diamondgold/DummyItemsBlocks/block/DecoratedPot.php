<?php

namespace diamondgold\DummyItemsBlocks\block;

use diamondgold\DummyItemsBlocks\block\trait\NoneSupportTrait;
use diamondgold\DummyItemsBlocks\Main;
use diamondgold\DummyItemsBlocks\tile\DummyTile;
use diamondgold\DummyItemsBlocks\tile\DummyTileTrait;
use diamondgold\DummyItemsBlocks\tile\TileNames;
use diamondgold\DummyItemsBlocks\tile\TileNbtTagNames;
use pocketmine\block\tile\Tile;
use pocketmine\block\Transparent;
use pocketmine\block\utils\FacesOppositePlacingPlayerTrait;
use pocketmine\data\bedrock\item\SavedItemData;
use pocketmine\data\bedrock\item\SavedItemStackData;
use pocketmine\item\Item;
use pocketmine\item\StringToItemParser;
use pocketmine\math\Facing;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\player\Player;

class DecoratedPot extends Transparent
{
    use FacesOppositePlacingPlayerTrait;
    use NoneSupportTrait;
    // use DummyTileTrait;

}
