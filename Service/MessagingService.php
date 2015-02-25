<?php
namespace SanSIS\Core\MessagingBundle\Service;

use \SanSIS\Core\BaseBundle\Service\BaseService;
use \Symfony\Component\HttpFoundation\Request;

class MessagingService extends BaseService
{
    public function getContextMessages()
    {
        $msgs = array();
        return $msgs;
    }

    public function hasMessagesCheck()
    {
        $chk = array();
        return $chk;
    }
}