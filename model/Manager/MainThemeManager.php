<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
use model\Mapping\SchoolPageCategoriesMapping;

class MainThemeManager extends AbstractManager
{
    public function addTheme(array $data) : bool
    {
        if($this->checkIfThemeExists($data["cat_title"])) return false;
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

    private function checkIfThemeExists(string $title) : bool
    {
        $stmt = $this->db->prepare("SELECT * FROM school_page_categories WHERE cat_title = :title");
        $stmt->bindParam(":title", $title);
        $stmt->execute();
        return $stmt->rowCount() === 1;
    }
}