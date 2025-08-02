<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['post_controller_constructor'][] = array(
    'class'    => 'Visitor_hook',
    'function' => 'track',
    'filename' => 'Visitor_hook.php',
    'filepath' => 'hooks'
);