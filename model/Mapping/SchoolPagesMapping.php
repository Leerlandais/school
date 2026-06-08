<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class SchoolPagesMapping extends AbstractMapping
{
    private int $page_id;

    private int $page_parent;

    private string $page_name;
    private string $page_slug;
    private string $page_created;
    private string $page_updated;

    public function getPageId(): int
    {
        return $this->page_id;
    }

    public function setPageId(int $page_id): void
    {
        $this->page_id = $page_id;
    }

    public function getPageParent(): int
    {
        return $this->page_parent;
    }

    public function setPageParent(int $page_parent): void
    {
        $this->page_parent = $page_parent;
    }

    public function getPageName(): string
    {
        return htmlspecialchars_decode($this->page_name);
    }

    public function setPageName(string $page_name): void
    {
        $this->page_name = $page_name;
    }

    public function getPageSlug(): string
    {
        return $this->page_slug;
    }

    public function setPageSlug(string $page_slug): void
    {
        $this->page_slug = $page_slug;
    }

    public function getPageCreated(): string
    {
        return $this->page_created;
    }

    public function setPageCreated(string $page_created): void
    {
        $this->page_created = $page_created;
    }

    public function getPageUpdated(): string
    {
        return $this->page_updated;
    }

    public function setPageUpdated(string $page_updated): void
    {
        $this->page_updated = $page_updated;
    }



}