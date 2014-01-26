<?php
namespace Filix\PushBundle\Platform;

use Filix\PushBundle\Platform\PlatformInterface;

/**
 *  PlatformsInterface
 *
 * @author Filix
 */
interface PlatformsInterface 
{
    /*
     * add platform
     * 
     * @param $platform PlatformInterface
     */
    public function addPlatform(PlatformInterface $platform);
    
    /*
     * get platforms
     * 
     * @return ArrayCollection
     */
    public function getPlatforms();
}
