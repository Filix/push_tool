<?php
namespace Filix\PushBundle\Tag;

/**
 * Description of Tag
 *
 * @author Filix
 */
class Tag implements TagInterface
{
    protected $name;


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

}
