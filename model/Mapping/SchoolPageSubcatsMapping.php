<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class SchoolPageSubcatsMapping extends AbstractMapping
{
    public int $subcat_id {
        get => $this->_subcat_id;
        set => $this->_subcat_id = $value;
    }

    public int $subcat_parent {
        get => $this->_subcat_parent;
        set => $this->_subcat_parent = $value;
    }

    public string $subcat_name {
        get => $this->_subcat_name;
        set => $this->_subcat_name = $value;
    }

    public bool $subcat_active {
        get => $this->_subcat_active;
        set => $this->_subcat_active = $value;
    }

    private int $_subcat_id;
    private int $_subcat_parent;
    private string $_subcat_name;
    private bool $_subcat_active;

}