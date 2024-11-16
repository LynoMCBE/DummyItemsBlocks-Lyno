<?php

namespace diamondgold\DummyItemsBlocks\block;

use diamondgold\DummyItemsBlocks\block\enum\StructureVoidType;
use diamondgold\DummyItemsBlocks\block\trait\NoneSupportTrait;
use diamondgold\DummyItemsBlocks\Main;
use pocketmine\block\Flowable;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\player\Player;

class StructureVoid extends Flowable
{
    use NoneSupportTrait;

    protected StructureVoidType $type = StructureVoidType::VOID;

    public function describeBlockItemState(RuntimeDataDescriber $w): void
    {
        $w->enum($this->type);
    }

    public function getType(): StructureVoidType
    {
        return $this->type;
    }

    public function setType(StructureVoidType $type): self
    {
        $this->type = $type;
        return $this;
    }

}
