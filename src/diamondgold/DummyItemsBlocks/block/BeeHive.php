<?php

namespace diamondgold\DummyItemsBlocks\block;

use diamondgold\DummyItemsBlocks\Main;
use diamondgold\DummyItemsBlocks\tile\DummyTileTrait;
use diamondgold\DummyItemsBlocks\tile\TileNames;
use diamondgold\DummyItemsBlocks\tile\TileNbtTagNames;
use diamondgold\DummyItemsBlocks\util\Utils;
use pocketmine\block\Opaque;
use pocketmine\block\tile\Tile;
use pocketmine\block\utils\FacesOppositePlacingPlayerTrait;
use pocketmine\block\utils\HorizontalFacingTrait;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\player\Player;

class BeeHive extends Opaque
{
    use FacesOppositePlacingPlayerTrait {
        describeBlockOnlyState as describeFacingState;
    }
    // use DummyTileTrait;

    protected int $honeyLevel = 0;

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $this->describeFacingState($w);
        $w->boundedIntAuto(0, 5, $this->honeyLevel);
    }

    public function getHoneyLevel(): int
    {
        return $this->honeyLevel;
    }

    public function setHoneyLevel(int $honeyLevel): self
    {
        Utils::checkWithinBounds($honeyLevel, 0, 5);
        $this->honeyLevel = $honeyLevel;
        return $this;
    }

}
