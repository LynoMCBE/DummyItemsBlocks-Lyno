<?php

namespace diamondgold\DummyItemsBlocks\block;

use diamondgold\DummyItemsBlocks\block\trait\HangingTrait;
use diamondgold\DummyItemsBlocks\block\trait\NoneSupportTrait;
use diamondgold\DummyItemsBlocks\tile\DummyTileTrait;
use diamondgold\DummyItemsBlocks\tile\TileNbtTagNames;
use pocketmine\block\Block;
use pocketmine\block\tile\Sign;
use pocketmine\block\tile\Tile;
use pocketmine\block\Transparent;
use pocketmine\block\utils\HorizontalFacingTrait;
use pocketmine\block\utils\SignLikeRotationTrait;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\item\Item;
use pocketmine\math\Facing;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\LongTag;
use pocketmine\player\Player;
use pocketmine\world\BlockTransaction;

/*
 *  extend BaseSign when:
 *  - both bamboo & cherry WoodType is implemented
 *  - back text is implemented
 */

class HangingSign extends Transparent
{
    use HorizontalFacingTrait {
        HorizontalFacingTrait::describeBlockOnlyState as describeHorizontalFacingState;
    }
    use HangingTrait {
        HangingTrait::describeBlockOnlyState as describeHangingState;
    }
    use SignLikeRotationTrait {
        SignLikeRotationTrait::describeBlockOnlyState as describeSignLikeRotationState;
    }
    use NoneSupportTrait;
    // use DummyTileTrait;

    protected bool $attached = false;

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $w->bool($this->attached);
        $this->describeHorizontalFacingState($w);
        $this->describeHangingState($w);
    }

    public function isAttached(): bool
    {
        return $this->attached;
    }

    public function setAttached(bool $attached): self
    {
        $this->attached = $attached;
        return $this;
    }

    public function place(BlockTransaction $tx, Item $item, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector, ?Player $player = null): bool
    {
        if ($face === Facing::UP) {
            return false;
        }
        if ($face === Facing::DOWN) {
            $this->hanging = true;
            if ($player !== null) {
                if ($player->isSneaking() || !$blockClicked->getSupportType($face)->hasEdgeSupport()) {
                    $this->attached = true;
                    $this->rotation = self::getRotationFromYaw($player->getLocation()->getYaw());
                }
                $this->facing = Facing::opposite($player->getHorizontalFacing());
            }
        } elseif ($player !== null) {
            // may be wrong sometimes when getHorizontalFacing() does not match client-side, but not a big issue
            $this->facing = Facing::rotateY($face, Facing::rotateY($player->getHorizontalFacing(), true) === $face);
        }
        return parent::place($tx, $item, $blockReplace, $blockClicked, $face, $clickVector, $player);
    }

}
