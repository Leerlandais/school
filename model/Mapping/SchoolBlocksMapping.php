<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class SchoolBlocksMapping extends AbstractMapping
{
    private int $block_id;
    private int $block_page_id;
    private int $block_html_tag;
    private string $block_class;
    private string $block_content;
    private int $block_position;

    public function getBlockId(): int
    {
        return $this->block_id;
    }

    public function setBlockId(int $block_id): void
    {
        $this->block_id = $block_id;
    }

    public function getBlockPageId(): int
    {
        return $this->block_page_id;
    }

    public function setBlockPageId(int $block_page_id): void
    {
        $this->block_page_id = $block_page_id;
    }

    public function getBlockHtmlTag(): int
    {
        return $this->block_html_tag;
    }

    public function setBlockHtmlTag(int $block_html_tag): void
    {
        $this->block_html_tag = $block_html_tag;
    }

    public function getBlockClass(): string
    {
        return $this->block_class;
    }

    public function setBlockClass(string $block_class): void
    {
        $this->block_class = $block_class;
    }

    public function getBlockContent(): string
    {
        return $this->block_content;
    }

    public function setBlockContent(string $block_content): void
    {
        $this->block_content = $block_content;
    }

    public function getBlockPosition(): int
    {
        return $this->block_position;
    }

    public function setBlockPosition(int $block_position): void
    {
        $this->block_position = $block_position;
    }


}