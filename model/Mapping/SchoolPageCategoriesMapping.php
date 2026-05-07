<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class SchoolPageCategoriesMapping extends AbstractMapping
{
    public int $cat_id {
        get => $this->_cat_id;
        set => $this->_cat_id = $value;
    }

    public string $cat_title {
        get => $this->_cat_title;
        set => $this->_cat_title = $value;
    }

    public bool $cat_active {
        get => $this->_cat_active;
        set => $this->_cat_active = $value;
    }

    private int $_cat_id;
    private string $_cat_title;
    private bool $_cat_active;
}