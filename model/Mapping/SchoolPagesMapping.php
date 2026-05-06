<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class SchoolPagesMapping extends AbstractMapping
{
    protected int $page_id {
        get => $page_id;
        set => $page_id = $value;
    }

    protected string $page_title {
        get => $page_title;
        set => $page_title = $value;
    }
    protected string $page_slug {
        get => $page_slug;
        set => $page_slug = $value;
    }

    protected string $page_created {
        get => $page_created;
        set => $page_created = $value;
    }
    protected string $page_updated {
        get => $page_updated;
        set => $page_updated = $value;
    }
    public function getPageId(): int
    {
        return $this->page_id;
    }

    public function getPageSlug(): string
    {
        return $this->page_slug;
    }

    public function getPageTagPosition(): int
    {
        return $this->page_tag_position;
    }

    public function getPageTagName(): string
    {
        return $this->page_tag_name;
    }

    public function getPageTagClass(): ?string
    {
        return $this->page_tag_class;
    }

    public function getPageTagContent(): ?string
    {
        return $this->page_tag_content;
    }

}