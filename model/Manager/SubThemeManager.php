<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
use model\Mapping\SchoolPageSubcatsMapping;

class SubThemeManager extends AbstractManager
{
    public function addSubTheme(array $data) : bool
    {
        if($this->checkIfSubThemeExists($data)) return false;
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

    private function checkIfSubThemeExists(array $subCatNew) : bool
    {

        $subCatName = $subCatNew["subcat_name"];
        $stmt = $this->db->prepare("SELECT * FROM school_page_subcats WHERE subcat_name = :subCatName");
        $stmt->bindParam(":subCatName", $subCatName);
        $stmt->execute();
        $subCat = $stmt->fetch();
        if(empty($subCat)) return false;
        return $subCat["subcat_parent"] === $subCatNew["subcat_parent"];
    }
}