<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
use model\Mapping\SchoolPageCategoriesMapping;

class MainThemeManager extends AbstractManager
{
    public function addTheme(array $data) : bool
    {
        return $this->insertAnything($data, "school_page_categories");
    }

    public function getThemes() : ?array
    {
        $query = $this->db->query("SELECT * FROM school_page_categories");
        $categories = [];
        while ($data = $query->fetch()) {
            $categories[] = new SchoolPageCategoriesMapping($data);
        }
        if(empty($categories)) return null;
        return $categories;
    }
}