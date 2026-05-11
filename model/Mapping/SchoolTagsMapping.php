<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class SchoolTagsMapping extends AbstractMapping
{
    private int $tag_id;
    private string $tag_name;
    private bool $tag_has_close;

    public function getTagId(): int
    {
        return $this->tag_id;
    }

    public function setTagId(int $tag_id): void
    {
        $this->tag_id = $tag_id;
    }

    public function getTagName(): string
    {
        return $this->tag_name;
    }

    public function setTagName(string $tag_name): void
    {
        $this->tag_name = $tag_name;
    }

    public function isTagHasClose(): bool
    {
        return $this->tag_has_close;
    }

    public function setTagHasClose(bool $tag_has_close): void
    {
        $this->tag_has_close = $tag_has_close;
    }


}