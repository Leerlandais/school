<?php

namespace model\Manager;

use model\Abstract\AbstractManager;

class PageManager extends AbstractManager
{
    public function addNewPage(array $data) : ?int
    {
        if($this->checkIfPageExists($data["page_name"])) return null;
        $data["page_created"] = date("Y-m-d H:i:s");
        return $this->insertAnything($data, "school_pages", "db", true);
    }

    private function checkIfPageExists(string $pageName) : bool
    {
        $stmt = $this->db->prepare("SELECT * FROM school_pages WHERE page_name = :pageName");
        $stmt->bindParam(":pageName", $pageName);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}