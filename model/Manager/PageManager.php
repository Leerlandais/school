<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
use model\Mapping\SchoolBlocksMapping;
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

    public function getPageBlocks(int $pageId) : ?array
    {
        $stmt = $this->db->prepare("SELECT sb.*, st.tag_name, st.tag_no_close, st.tag_special 
                                            FROM school_blocks sb
                                            LEFT JOIN school_tags st ON sb.block_html_tag = st.tag_id
                                            WHERE block_page_id = :pageId ORDER BY sb.block_position ASC");
        $stmt->bindParam(":pageId", $pageId);
        $stmt->execute();
        $blocks = [];
        while($row = $stmt->fetch()) {
            $blocks[] = new SchoolBlocksMapping($row);
        }
        if(empty($blocks)) return null;
        return $blocks;
    }

    public function addNewBlock(array $data) : bool
    {
        $tagId = $data["block_html_tag"];
        if($data["block_class"] === "-default") {
            $data["block_class"] = $this->getTagName($tagId) . $data["block_class"];
        }
        if($this->checkForSpecial($tagId)) unset($data["block_class"]);
        return $this->insertAnything($data, "school_blocks");
    }

    public function deleteBlock(int $blockId) : bool
    {
        $stmt = $this->db->prepare("DELETE FROM school_blocks WHERE block_id = :blockId");
        $stmt->bindParam(":blockId", $blockId);
        return $stmt->execute();
    }


    public function deletePage(int $pageId) : bool
    {
        $stmt = $this->db->prepare("DELETE FROM school_pages WHERE page_id = :pageId");
        $stmt->bindParam(":pageId", $pageId);
        $deletePage = $stmt->execute();
        if(!$deletePage) return false;
        $stmt->closeCursor();
        $stmt = $this->db->prepare("DELETE FROM school_blocks WHERE block_page_id = :pageId");
        $stmt->bindParam(":pageId", $pageId);
        return $stmt->execute();
    }

    public function getBlockDetails(int $blockId) : ?SchoolBlocksMapping
    {
        $stmt = $this->db->prepare("SELECT * FROM school_blocks WHERE block_id = :blockId");
        $stmt->bindParam(":blockId", $blockId);
        $stmt->execute();
        $block = $stmt->fetch();
        if($block) return new SchoolBlocksMapping($block);
        return null;
    }

    public function editCurrentBlock(array $data) : bool
    {
        $id = $data["block_id"];
        unset($data["block_id"]);
        return $this->updateAnything($data, "block_id", $id,"school_blocks");
    }
    private function checkIfPageExists(string $pageName) : bool
    {
        $stmt = $this->db->prepare("SELECT * FROM school_pages WHERE page_name = :pageName");
        $stmt->bindParam(":pageName", $pageName);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    private function getTagName(int $tagId) : string
    {
        $stmt = $this->db->prepare("SELECT tag_name FROM school_tags WHERE tag_id = :tagId");
        $stmt->bindParam(":tagId", $tagId);
        $stmt->execute();
        $tag = $stmt->fetch();
        return $tag["tag_name"];
    }

    private function checkForSpecial(int $tagId) : bool
    {
        $stmt = $this->db->prepare("SELECT tag_special FROM school_tags WHERE tag_id = :tagId");
        $stmt->bindParam(":tagId", $tagId);
        $stmt->execute();
        $tag = $stmt->fetch();
        return $tag["tag_special"] === 1;
    }
}