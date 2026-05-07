<?php

namespace model\Manager;

use model\Abstract\AbstractManager;

class SubThemeManager extends AbstractManager
{
    public function addSubTheme(array $data) : bool
    {
        return $this->insertAnything($data, "school_page_subcats");
    }
}