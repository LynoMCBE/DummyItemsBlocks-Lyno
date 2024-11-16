<?php

namespace diamondgold\DummyItemsBlocks\block;

use diamondgold\DummyItemsBlocks\block\enum\VaultState;
use diamondgold\DummyItemsBlocks\Main;
use diamondgold\DummyItemsBlocks\tile\DummyTileTrait;
use diamondgold\DummyItemsBlocks\tile\LootTables;
use diamondgold\DummyItemsBlocks\tile\TileNames;
use diamondgold\DummyItemsBlocks\tile\TileNbtTagNames;
use pocketmine\block\tile\Tile;
use pocketmine\block\Transparent;
use pocketmine\block\utils\HorizontalFacingTrait;
use pocketmine\data\bedrock\item\ItemTypeNames;
use pocketmine\data\bedrock\item\SavedItemData;
use pocketmine\data\bedrock\item\SavedItemStackData;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\player\Player;

final class Vault extends Transparent
{
    use HorizontalFacingTrait {
        describeBlockOnlyState as describeFacing;
    }
    // use DummyTileTrait;

    private VaultState $state = VaultState::INACTIVE;

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $this->describeFacing($w);
        $w->enum($this->state);
    }

    public function getLightLevel(): int
    {
        return $this->state === VaultState::INACTIVE ? 6 : 12;
    }

    public function getState(): VaultState
    {
        return $this->state;
    }

    public function setState(VaultState $state): self
    {
        $this->state = $state;
        return $this;
    }

}
