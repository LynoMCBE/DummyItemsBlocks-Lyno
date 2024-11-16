<?php

namespace diamondgold\DummyItemsBlocks\block;

use diamondgold\DummyItemsBlocks\block\trait\HangingTrait;
use diamondgold\DummyItemsBlocks\Main;
use diamondgold\DummyItemsBlocks\tile\DummyTileTrait;
use diamondgold\DummyItemsBlocks\tile\LootTables;
use diamondgold\DummyItemsBlocks\tile\TileNames;
use diamondgold\DummyItemsBlocks\tile\TileNbtTagNames;
use diamondgold\DummyItemsBlocks\util\Utils;
use pocketmine\block\Opaque;
use pocketmine\block\tile\Tile;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\player\Player;
use pocketmine\world\format\io\GlobalBlockStateHandlers;

class SuspiciousFallable extends Opaque
{
    use HangingTrait {
        describeBlockOnlyState as describeHangingState;
    }
    // use DummyTileTrait;

    protected int $brushedProgress = 0;

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $this->describeHangingState($w);
        $w->boundedIntAuto(0, 3, $this->brushedProgress);
    }

    public function getBrushedProgress(): int
    {
        return $this->brushedProgress;
    }

    public function setBrushedProgress(int $brushedProgress): self
    {
        Utils::checkWithinBounds($brushedProgress, 0, 3);
        $this->brushedProgress = $brushedProgress;
        return $this;
    }

}
