<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class SchoolPageCategoriesMapping extends AbstractMapping
{
    private int $cat_id;
    private string $cat_title;
    private bool $cat_active;

    public function getCatId(): int
    {
        return $this->cat_id;
    }

    public function setCatId(int $cat_id): void
    {
        $this->cat_id = $cat_id;
    }

    public function getCatTitle(): string
    {
        return $this->cat_title;
    }

    public function setCatTitle(string $cat_title): void
    {
        $this->cat_title = $cat_title;
    }

    public function isCatActive(): bool
    {
        return $this->cat_active;
    }

    public function setCatActive(bool $cat_active): void
    {
        $this->cat_active = $cat_active;
    }


}
