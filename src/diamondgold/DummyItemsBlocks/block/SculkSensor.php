<?php

namespace diamondgold\DummyItemsBlocks\block;

use diamondgold\DummyItemsBlocks\block\trait\NoneSupportTrait;
use diamondgold\DummyItemsBlocks\Main;
use diamondgold\DummyItemsBlocks\tile\DummyTileTrait;
use diamondgold\DummyItemsBlocks\tile\TileNames;
use diamondgold\DummyItemsBlocks\tile\TileNbtTagNames;
use diamondgold\DummyItemsBlocks\util\Utils;
use pocketmine\block\tile\Tile;
use pocketmine\block\Transparent;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\player\Player;

class SculkSensor extends Transparent
{
    protected int $phase = 0;

    use NoneSupportTrait;
    // use DummyTileTrait;

    public function getPhase(): int
    {
        return $this->phase;
    }

    public function setPhase(int $phase): static
    {
        Utils::checkWithinBounds($phase, 0, 2);
        $this->phase = $phase;
        return $this;
    }

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $w->boundedIntAuto(0, 2, $this->phase);
    }

    public function getLightLevel(): int
    {
        return 1;
    }
}
