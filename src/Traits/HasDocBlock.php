<?php

namespace Mdcass\RouteDoc\Traits;

use Mdcass\RouteDoc\Profile\DocBlock\TagProfile;

/**
 * Trait for reflection profiles with a doc block. The profile class
 * should set the property $rawDocBlock which is used to instantiate
 * the DocBlockFactory
 */
trait HasDocBlock
{
    /**
     * @var string|null
     */
    protected $rawDocBlock;

    /**
     * @return \phpDocumentor\Reflection\DocBlock|null
     */
    public function getDocBlock()
    {
        return $this->rawDocBlock
            ? \phpDocumentor\Reflection\DocBlockFactory::createInstance()->create($this->rawDocBlock)
            : null;
    }

    /**
     * @return null|string
     */
    public function getSummary()
    {
        return $this->getDocBlock()
            ? $this->getDocBlock()->getSummary()
            : null;
    }

    /**
     * @param bool $markdown
     * @return null|\string
     */
    public function getDescription($markdown = true)
    {
        if (!$this->getDocBlock()) {
            return null;
        }

        $description = $this->getDocBlock()->getDescription();

        return $markdown
            ? (new \Parsedown)->text($description)
            : (string)$description;
    }

    /**
     * @return null|TagProfile[]
     */
    public function getTags()
    {
        if (!$this->getDocBlock()) {
            return null;
        }

        return array_map(function ($tag) {
            return new TagProfile($tag);
        }, $this->getDocBlock()->getTags());
    }
}
