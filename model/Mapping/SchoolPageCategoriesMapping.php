<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class SchoolPageCategoriesMapping extends AbstractMapping
{
    protected int $cat_id {
        get => $cat_id;
        set => $cat_id = $value;
    }

    protected string $cat_title {
        get => $cat_title;
        set => $cat_title = $value;
    }

    protected bool $cat_active {
        get => $cat_active;
        set => $cat_active = $value;
    }

    public function getCatId(): int
    {
        return $this->cat_id;
    }

    public function getCatTitle(): string
    {
        return $this->cat_title;
    }

    public function getCatActive(): bool
    {
        return $this->cat_active;
    }
}