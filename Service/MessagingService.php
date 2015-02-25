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
        $msgs = $this->getEntityManager()
             ->getRepository('\SanSIS\Core\MessagingBundle\Entity\ContextMessage')
             ->findBy(
                    array(
                        'context'   => $this->getEntityManager()
                                          ->getRepository('\SanSIS\Core\MessagingBundle\Entity\Context')
                                          ->find(2),
                        'receiver'  => $this->secContext
                                            ->getToken()
                                            ->getUser(),
                        'read'      => false,
                    )
                );

        $total = count($msgs);

        $chk = array(
            'chk' => (bool) $total,
            'total' => $total
         );

        return $chk;
    }
}