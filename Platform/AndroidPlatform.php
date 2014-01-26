<?php
namespace Filix\PushBundle\Platform;

/**
 * AndroidPlatform
 *
 * @author Filix
 */
class AndroidPlatform implements PlatformInterface
{
    const NAME = 'ANDROID';
    
    public function getName()
    {
        return self::NAME;
    }
}
