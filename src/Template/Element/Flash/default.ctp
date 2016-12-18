<?php
/** @var $this App\View\AppView */
/** @var $params array */

$this->Html->scriptStart(['block' => true]);

$title = isset($params['title']) ? '<strong>' . $params['title'] . '</strong><br/>' : null;
$message = h($message);
$text = $title.$message;
$animationOpen = $params['animation']['open'];
$animationClose = $params['animation']['close'];
$type = $params['type'];
$layout = $params['layout'];

echo "
    $(function(){
        var n = noty({
            theme: 'bootstrapTheme',
            layout: '$layout',
            type: '$type',
            template: '<div class=\"noty_message\"><span class=\"noty_text\"></span><div class=\"noty_close\"></div></div>',
            text: '$text',
            animation: {
                open: 'animated $animationOpen',
                close: 'animated $animationClose', 
                easing: 'swing',
                speed: 500
            }
        });
    });
";

$this->Html->scriptEnd();