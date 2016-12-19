<?php

namespace NotyPlugin\Controller\Component;

use AnimatePlugin\Controller\Component\AnimateComponent;
use Cake\Controller\Component\FlashComponent;

/**
 * Class NotyComponent
 *
 * @package Noty\Controller\Component
 *
 * @method void success(string $message, array $options = []) Set a message using "success" element
 * @method void error(string $message, array $options = []) Set a message using "error" element
 * @method void warning(string $message, array $options = []) Set a message using "warning" element
 * @method void information(string $message, array $options = []) Set a message using "information" element
 * @method void notification(string $message, array $options = []) Set a message using "notification" element
 */
class NotyComponent extends FlashComponent
{
    const TYPE_SUCCESS = 'success';
    const TYPE_ERROR = 'error';
    const TYPE_WARNING = 'warning';
    const TYPE_INFORMATION = 'information';
    const TYPE_NOTIFICATION = 'notification';

    const LAYOUT_TOP = 'top';
    const LAYOUT_TOP_CENTER = 'topCenter';
    const LAYOUT_TOP_LEFT = 'topLeft';
    const LAYOUT_TOP_RIGHT = 'topRight';
    const LAYOUT_CENTER = 'center';
    const LAYOUT_CENTER_LEFT = 'centerLeft';
    const LAYOUT_CENTER_RIGHT = 'centerRight';
    const LAYOUT_BOTTOM = 'bottom';
    const LAYOUT_BOTTOM_LEFT = 'bottomLeft';
    const LAYOUT_BOTTOM_CENTER = 'bottomCenter';
    const LAYOUT_BOTTOM_RIGHT = 'bottomRight';

    const ANIMATE_BOUNCE_IN_LEFT = 'bounceInLeft';
    const ANIMATE_BOUNCE_OUT_LEFT = 'bounceOutLeft';

    /**
     * Default configuration
     *
     * @var array
     */
    protected $_defaultConfig = [
        'key'       => 'flash',
        'element'   => 'default',
        'params'    => [],
        'clear'     => false,
        'duplicate' => true,
    ];

    /**
     * @param string $name
     * @param array $args
     */
    public function __call($name, $args)
    {
        $name = 'default';

        $args[1]['plugin'] = 'NotyPlugin';
        $args[1]['params']['animation'] = [
            'open'  => AnimateComponent::CLASS_BOUNCE_IN_RIGHT,
            'close' => AnimateComponent::CLASS_BOUNCE_OUT_RIGHT,
        ];
        $args[1]['params']['type'] = $name;
        $args[1]['params']['layout'] = self::LAYOUT_BOTTOM_RIGHT;

        parent::__call($name, $args);
    }
}
