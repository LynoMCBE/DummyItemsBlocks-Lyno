<?php

namespace diamondgold\DummyItemsBlocks\block;

use diamondgold\DummyItemsBlocks\Main;
use diamondgold\DummyItemsBlocks\tile\DummyTile;
use diamondgold\DummyItemsBlocks\tile\DummyTileTrait;
use diamondgold\DummyItemsBlocks\tile\LootTables;
use diamondgold\DummyItemsBlocks\tile\TileNames;
use diamondgold\DummyItemsBlocks\tile\TileNbtTagNames;
use diamondgold\DummyItemsBlocks\util\Utils;
use pocketmine\block\tile\Tile;
use pocketmine\block\Transparent;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\item\Item;
use pocketmine\item\StringToItemParser;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\LongTag;
use pocketmine\player\Player;

final class TrialSpawner extends Transparent
{
    // use DummyTileTrait;

    private int $trial_spawner_state = 0;

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $w->boundedIntAuto(0, 5, $this->trial_spawner_state);
    }

    public function getLightLevel(): int
    {
        return $this->trial_spawner_state === 0 ? 4 : 8;
    }

    public function getState(): int
    {
        return $this->trial_spawner_state;
    }

    public function setState(int $trial_spawner_state): self
    {
        Utils::checkWithinBounds($trial_spawner_state, 0, 5);
        $this->trial_spawner_state = $trial_spawner_state;
        return $this;
    }

}
