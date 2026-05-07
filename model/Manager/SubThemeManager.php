<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
use model\Mapping\SchoolPageSubcatsMapping;

class SubThemeManager extends AbstractManager
{
    public function addSubTheme(array $data) : bool
    {
        return $this->insertAnything($data, "school_page_subcats");
    }

    public function getSubThemes() : ?array
    {
        $query = $this->db->query("SELECT * FROM school_page_subcats");
        $subCats = [];
        while ($data = $query->fetch()) {
            $subCats[] = new SchoolPageSubcatsMapping($data);
        }
        if(empty($subCats)) return null;
        return $subCats;
    }
}