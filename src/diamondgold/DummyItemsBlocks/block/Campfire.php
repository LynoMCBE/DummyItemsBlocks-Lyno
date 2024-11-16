<?php

namespace diamondgold\DummyItemsBlocks\block;

use diamondgold\DummyItemsBlocks\block\trait\NoneSupportTrait;
use diamondgold\DummyItemsBlocks\Main;
use diamondgold\DummyItemsBlocks\tile\DummyTile;
use diamondgold\DummyItemsBlocks\tile\DummyTileTrait;
use diamondgold\DummyItemsBlocks\tile\TileNames;
use diamondgold\DummyItemsBlocks\tile\TileNbtTagNames;
use diamondgold\DummyItemsBlocks\util\Utils;
use pocketmine\block\tile\Tile;
use pocketmine\block\Transparent;
use pocketmine\block\utils\FacesOppositePlacingPlayerTrait;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\item\Item;
use pocketmine\item\VanillaItems;
use pocketmine\math\AxisAlignedBB;
use pocketmine\math\Facing;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\player\Player;
use pocketmine\utils\AssumptionFailedError;

class Campfire extends Transparent
{
    use FacesOppositePlacingPlayerTrait {
        describeBlockOnlyState as describeFacing;
    }
    use NoneSupportTrait;
    // use DummyTileTrait;

    protected bool $extinguished = false;

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $this->describeFacing($w);
        $w->bool($this->extinguished);
    }

    public function isExtinguished(): bool
    {
        return $this->extinguished;
    }

    public function setExtinguished(bool $extinguished): self
    {
        $this->extinguished = $extinguished;
        return $this;
    }

    protected function recalculateCollisionBoxes(): array
    {
        return [AxisAlignedBB::one()->trim(Facing::UP, 0.5)];
    }

    public function getLightLevel(): int
    {
        return $this->extinguished ? 0 : 15;
    }
}
