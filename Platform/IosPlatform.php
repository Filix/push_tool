<?php
namespace Filix\PushBundle\Platform;

/**
 * iosPlatform
 *
 * @author Filix
 */
class IosPlatform implements PlatformInterface
{
    const NAME = 'IOS';
    
    public function getName()
    {
        return self::NAME;
    }
}
