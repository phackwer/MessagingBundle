<?php

namespace SanSIS\Core\MessagingBundle\Controller;

use \SanSIS\Core\BaseBundle\Controller\BaseController;

class MessagingController extends BaseController
{
    protected $service = 'messaging.service';

    protected $indexView = 'SanSISCoreMessagingBundle:Default:index.html.twig';

    public function showContextMessagesAction()
    {
        $params = array();
        $params['msgs'] = $this->getService()->getContextMessages();
        return $this->render('SanSISCoreMessagingBundle:Messaging:context_messages.html.twig', $params);
    }

    public function hasMessagesCheckAction()
    {
        $params = array();
        $params['chk'] = $this->getService()->hasMessagesCheck();
        return $this->renderJson($params);
    }
}
