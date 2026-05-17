<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
use model\Mapping\SchoolTagsMapping;

class SchoolTagsManager extends AbstractManager
{
    public function getAllTags() : ?array
    {
        $query = $this->db->query("SELECT * FROM school_tags ORDER BY tag_name");
        $tags = [];
        while ($row = $query->fetch()) {
            $tags[] = new SchoolTagsMapping($row);
        }
        if(empty($tags)) return null;
        return $tags;
    }

    public function addNewTag(array $data) : bool
    {
        if($data["tag_special"]) $data["tag_no_close"] = 1;
        if($this->checkForExistingTag($data["tag_name"])) return false;
        return $this->insertAnything($data, "school_tags");
    }

    private function checkForExistingTag(string $tag_name) : bool
    {
        $query = $this->db->query("SELECT * FROM school_tags WHERE tag_name = '$tag_name'");
        return $query->fetch() !== false;
    }
}