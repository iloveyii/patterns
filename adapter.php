<?php
define('EOL', php_sapi_name()=='cli' ? PHP_EOL : '<br/>');
define('SPC', php_sapi_name()=='cli' ? ' ' : '&nbsp;');

/**
 * Design pattern - Adapter
 *
 * @author: Hazrat Ali
 * @mail: iloveyii@yahoo.com
 * Date: 2016-07-31
 */
class Facebook
{
    public function postToWall($message)
    {
        echo "Posted message to wall : " . $message . EOL;
    }
}

interface SocialMediaAdapter
{
    public function post($message);
}

class FacebookAdapter implements SocialMediaAdapter
{
    private $facebook;

    public function __construct()
    {
        $this->facebook = new Facebook();
    }

    public function post($message)
    {
        $this->facebook->postToWall($message);
    }
}


function getMessageFromUser()
{
    return 'User message - Hello Facebook Adapter !';
}

// TEST DRIVE
$facebook = new FacebookAdapter();
$message = getMessageFromUser();
$facebook->post($message);