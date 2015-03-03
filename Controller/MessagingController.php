<?php

namespace SanSIS\Core\MessagingBundle\Controller;

use \SanSIS\Core\BaseBundle\Controller\BaseController;

class MessagingController extends BaseController
{
    protected $service = 'messaging.service';

    protected $indexView = 'SanSISCoreMessagingBundle:Messaging:index.html.twig';

    public function showContextMessagesAction()
    {
        $params = array();
        $params['msgs'] = $this->getService()->getContextMessages();
        return $this->render('SanSISCoreMessagingBundle:Messaging:context_messages.html.twig', $params);
    }

    public function hasMessagesCheckAction()
    {
        $params = $this->getService()->hasMessagesCheck();
        return $this->renderJson($params);
    }

    public function getContextListMessagesCountAction()
    {
        $params = $this->getService()->getContextListMessagesCount();
        return $this->renderJson($params);
    }

    public function getContextMessageGroupsAction()
    {
        $context = $this->getRequest()->query->get('context');
        $params = $this->getService()->getContextMessageGroups($context);
        return $this->renderJson($params);
    }

    public function getContextMessagesByGroupAction()
    {
        $params = $this->getService()->getContextMessagesByGroup();
        return $this->renderJson($params);
    }

    public function postContextMessageToGroupAction()
    {
        $params = $this->getService()->postContextMessageToGroup();
        return $this->renderJson($params);
    }

    public function postContextMessageToUserAction()
    {
        $params = $this->getService()->postContextMessageToUserAction();
        return $this->renderJson($params);
    }
}
