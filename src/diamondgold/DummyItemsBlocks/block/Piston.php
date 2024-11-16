<?php

namespace diamondgold\DummyItemsBlocks\block;

use diamondgold\DummyItemsBlocks\Main;
use diamondgold\DummyItemsBlocks\tile\DummyTile;
use diamondgold\DummyItemsBlocks\tile\DummyTileTrait;
use diamondgold\DummyItemsBlocks\tile\TileNames;
use diamondgold\DummyItemsBlocks\tile\TileNbtTagNames;
use pocketmine\block\Block;
use pocketmine\block\Opaque;
use pocketmine\block\tile\Tile;
use pocketmine\block\utils\AnyFacingTrait;
use pocketmine\data\bedrock\block\BlockTypeNames;
use pocketmine\item\Item;
use pocketmine\math\Facing;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\player\Player;
use pocketmine\world\BlockTransaction;
use pocketmine\world\format\io\GlobalBlockStateHandlers;

class Piston extends Opaque
{
    use AnyFacingTrait;
    // use DummyTileTrait;

    public function place(BlockTransaction $tx, Item $item, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector, ?Player $player = null): bool
    {
        $this->setFacing(Facing::opposite($face));
        return parent::place($tx, $item, $blockReplace, $blockClicked, $face, $clickVector, $player);
    }
}
