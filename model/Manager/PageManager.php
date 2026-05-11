<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
use model\Mapping\SchoolPagesMapping;

class PageManager extends AbstractManager
{
    public function addNewPage(array $data) : ?int
    {

        if($this->checkIfPageExists($data["page_name"])) return null;
        $data["page_created"] = date("Y-m-d H:i:s");
        return $this->insertAnything($data, "school_pages", "db", true);
    }

    public function selectAllPages() : ?array
    {
        $query = $this->db->query("SELECT * FROM `school_pages` ORDER BY `page_created` DESC");
        $pages = [];
        while($row = $query->fetch()) {
            $pages[] = new SchoolPagesMapping($row);
        }
        if(empty($pages)) return null;
        return $pages;
    }

    public function getPageDetails(int $pageId) : ?SchoolPagesMapping
    {
        $stmt = $this->db->prepare("SELECT * FROM school_pages WHERE page_id = :pageId");
        $stmt->bindParam(":pageId", $pageId);
        $stmt->execute();
        $page = $stmt->fetch();
        if($page) return new SchoolPagesMapping($page);
        return null;
    }

    private function checkIfPageExists(string $pageName) : bool
    {
        $stmt = $this->db->prepare("SELECT * FROM school_pages WHERE page_name = :pageName");
        $stmt->bindParam(":pageName", $pageName);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}