<?php

namespace model\Manager;

use model\Abstract\AbstractManager;

class MainThemeManager extends AbstractManager
{
    public function addTheme(array $data) : bool
    {
        return $this->insertAnything($data, "school_page_categories");
    }
}