<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class SchoolPagesMapping extends AbstractMapping
{
    private int $page_id {
        get => $page_id;
        set => $page_id = $value;
    }
    private string $page_slug {
        get => $page_slug;
        set => $page_slug = $value;
    }
    private int $page_tag_position {
        get => $page_tag_position;
        set => $page_tag_position = $value;
    }
    private string $page_tag_name {
        get => $page_tag_name;
        set => $page_tag_name = $value;
    }
    private ?string $page_tag_class {
        get => $page_tag_class;
        set => $page_tag_class = $value;
    }
    private ?string $page_tag_content {
        get => $page_tag_content;
        set => $page_tag_content = $value;
    }
    public function getPageId(): int
    {
        return $this->page_id;
    }

    public function setPageId(int $page_id): void
    {
        $this->page_id = $page_id;
    }
    public function getPageSlug(): string
    {
        return $this->page_slug;
    }
    public function setPageSlug(string $page_slug): void
    {
        $this->page_slug = $page_slug;
    }
    public function getPageTagPosition(): int
    {
        return $this->page_tag_position;
    }
    public function setPageTagPosition(int $page_tag_position): void
    {
        $this->page_tag_position = $page_tag_position;
    }
    public function getPageTagName(): string
    {
        return $this->page_tag_name;
    }
    public function setPageTagName(string $page_tag_name): void
    {
        $this->page_tag_name = $page_tag_name;
    }
    public function getPageTagClass(): ?string
    {
        return $this->page_tag_class;
    }
    public function setPageTagClass(?string $page_tag_class): void
    {
        $this->page_tag_class = $page_tag_class;
    }
    public function getPageTagContent(): ?string
    {
        return $this->page_tag_content;
    }
    public function setPageTagContent(?string $page_tag_content): void
    {
        $this->page_tag_content = $page_tag_content;
    }
}