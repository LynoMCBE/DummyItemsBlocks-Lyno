<?php

namespace diamondgold\DummyItemsBlocks\block;

use diamondgold\DummyItemsBlocks\Main;
use diamondgold\DummyItemsBlocks\tile\DummyTileTrait;
use diamondgold\DummyItemsBlocks\tile\TileNames;
use diamondgold\DummyItemsBlocks\tile\TileNbtTagNames;
use pocketmine\block\Block;
use pocketmine\block\Opaque;
use pocketmine\block\tile\Nameable;
use pocketmine\block\tile\Tile;
use pocketmine\block\utils\AnyFacingTrait;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\item\Item;
use pocketmine\math\Facing;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\LongTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\player\Player;
use pocketmine\world\BlockTransaction;

class CommandBlock extends Opaque
{
    use AnyFacingTrait {
        describeBlockOnlyState as describeAnyFacingBlockOnlyState;
    }
    // use DummyTileTrait;

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $this->describeAnyFacingBlockOnlyState($w);
        $w->bool($this->conditional);
    }

    protected bool $conditional = false;

    public function place(BlockTransaction $tx, Item $item, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector, ?Player $player = null): bool
    {
        $this->setFacing(Facing::opposite($face));
        return parent::place($tx, $item, $blockReplace, $blockClicked, $face, $clickVector, $player);
    }

    public function isConditional(): bool
    {
        return $this->conditional;
    }

    public function setConditional(bool $conditional): self
    {
        $this->conditional = $conditional;
        return $this;
    }

    public function onInteract(Item $item, int $face, Vector3 $clickVector, ?Player $player = null, array &$returnedItems = []): bool
    {
        if (!Main::canChangeBlockStates($this, $player)) return false;
        $this->position->getWorld()->setBlock($this->position, $this->setConditional(!$this->isConditional()));
        return true;
    }

}
