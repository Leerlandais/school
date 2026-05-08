<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class SchoolPagesMapping extends AbstractMapping
{
    private int $page_id;

    private int $page_category;

    private string $page_title;
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

    public function getPageCategory(): int
    {
        return $this->page_category;
    }

    public function setPageCategory(int $page_category): void
    {
        $this->page_category = $page_category;
    }

    public function getPageTitle(): string
    {
        return $this->page_title;
    }

    public function setPageTitle(string $page_title): void
    {
        $this->page_title = $page_title;
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