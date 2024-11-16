<?php

namespace diamondgold\DummyItemsBlocks\block;

use diamondgold\DummyItemsBlocks\block\enum\StructureBlockType;
use diamondgold\DummyItemsBlocks\Main;
use diamondgold\DummyItemsBlocks\tile\DummyTileTrait;
use diamondgold\DummyItemsBlocks\tile\TileNames;
use diamondgold\DummyItemsBlocks\tile\TileNbtTagNames;
use pocketmine\block\Opaque;
use pocketmine\block\tile\Tile;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\LongTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\player\Player;

class StructureBlock extends Opaque
{
    // use DummyTileTrait;

    protected StructureBlockType $type = StructureBlockType::DATA;

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $w->enum($this->type);
    }

    public function getType(): StructureBlockType
    {
        return $this->type;
    }

    public function setType(StructureBlockType $type): self
    {
        $this->type = $type;
        return $this;
    }

}
