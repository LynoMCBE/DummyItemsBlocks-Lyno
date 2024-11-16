<?php

namespace diamondgold\DummyItemsBlocks\block;

use diamondgold\DummyItemsBlocks\block\trait\NoneSupportTrait;
use diamondgold\DummyItemsBlocks\Main;
use diamondgold\DummyItemsBlocks\util\Utils;
use pocketmine\block\Opaque;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\player\Player;

class Composter extends Opaque
{
    use NoneSupportTrait;

    protected int $fillLevel = 0;

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $w->boundedIntAuto(0, 8, $this->fillLevel);
    }

    public function getFillLevel(): int
    {
        return $this->fillLevel;
    }

    public function setFillLevel(int $fillLevel): self
    {
        Utils::checkWithinBounds($fillLevel, 0, 8);
        $this->fillLevel = $fillLevel;
        return $this;
    }
}
