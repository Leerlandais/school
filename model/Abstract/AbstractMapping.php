<?php
namespace model\Abstract;
abstract class AbstractMapping
{
    public function __construct(array $tab)
    {
        $this->hydrate($tab);
    }
    protected function hydrate(array $assoc): void
    {
        foreach ($assoc as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}