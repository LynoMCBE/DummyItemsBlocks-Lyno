<?php

namespace diamondgold\DummyItemsBlocks\block;

use diamondgold\DummyItemsBlocks\block\enum\SeaGrassType;
use diamondgold\DummyItemsBlocks\block\trait\NoneSupportTrait;
use diamondgold\DummyItemsBlocks\Main;
use pocketmine\block\Transparent;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\player\Player;

class SeaGrass extends Transparent
{
    use NoneSupportTrait;

    protected SeaGrassType $type = SeaGrassType::DEFAULT;

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $w->enum($this->type);
    }

    public function getType(): SeaGrassType
    {
        return $this->type;
    }

    public function setType(SeaGrassType $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function canBeReplaced(): bool
    {
        return true;
    }
}
