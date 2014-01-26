<?php
namespace Filix\PushBundle\Platform;

use Filix\PushBundle\Common\ArrayCollection\ArrayCollection;

/**
 * Platforms
 *
 * @author Filix
 */
class Platforms implements PlatformsInterface
{
    protected $platforms;
    
    public function __construct(array $platforms = array())
    {
        $this->platforms = new ArrayCollection($platforms);
    }

    public function addPlatform(PlatformInterface $platform)
    {
        $this->platforms->add($platform);
    }

    public function getPlatforms()
    {
        return $this->platforms;
    }

}
