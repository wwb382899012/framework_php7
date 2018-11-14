<?php
/**
 * Created by youyi000.
 * DateTime: 2018/4/8 10:14
 * Describe：
 */

namespace system\components\base;


class InvalidConfigException extends \Exception
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Invalid Configuration';
    }
}
