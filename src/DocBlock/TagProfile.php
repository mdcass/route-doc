<?php

namespace Mdcass\RouteDoc\DocBlock;

use phpDocumentor\Reflection\DocBlock\Tags\Param;

class TagProfile
{
    /**
     * @var \phpDocumentor\Reflection\DocBlock\Tag
     */
    protected $tag;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $variableName;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var string|null
     */
    protected $type;

    /**
     * DocTagProfile constructor.
     * @param \phpDocumentor\Reflection\DocBlock\Tag $tag
     */
    public function __construct(\phpDocumentor\Reflection\DocBlock\Tag $tag)
    {
        $this->tag = $tag;

        switch (get_class($tag)) {
            case Param::class:
                /** @var Param $tag */
                $this->name = $tag->getName();
                $this->variableName = $tag->getVariableName();
                $this->description = (string)$tag->getDescription();
                $this->type = (string)$tag->getType();
                break;
            default:
                $this->name = $tag->getName();
                $this->description = method_exists($this->tag, 'getDescription')
                    ? (string)$this->tag->getDescription()
                    : null;
                break;
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getVariableName()
    {
        return $this->variableName;
    }
}
