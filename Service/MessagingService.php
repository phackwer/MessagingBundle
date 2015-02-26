<?php
namespace SanSIS\Core\MessagingBundle\Service;

use \SanSIS\Core\BaseBundle\Service\BaseService;

class MessagingService extends BaseService
{
    /**
     * Método para ser sobrescrito durante a implantação!
     *
     * Como cada sistema tem um comportamento levemente diferente para definir o contexto
     *
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public function getUserContextsIds($user)
    {
        $contexts = array();
        return $contexts;
    }

    /**
     * Obtém as mensagens não lidas para o usuário atualmente logado no sistema.
     * @return [type] [description]
     */
    public function getUnreadUserMessages($user)
    {
        return $this->resultToArray(
            $this->getEntityManager()
                 ->getRepository('\SanSIS\Core\MessagingBundle\Entity\ContextMessage')
                 ->findBy(
                     array(
                         'context' => $this->getEntityManager()
                                           ->getRepository('\SanSIS\Core\MessagingBundle\Entity\Context')
                                           ->find(2),
                         'receiver' => $user,
                         'read' => false,
                     )
                 )
        );
    }

    /**
     * Buscar as mensagens para grupo, de todos os contextos, no qual o usuário faz parte do grupo.
     * @return [type] [description]
     */
    public function getUnreadGroupMessages($user)
    {
        // buscar as mensagens para grupo, de todos os contextos, no qual o usuário faz parte do grupo.
        // ou seja, deve receber de parâmetros de "Contextos ao qual o usuário pertence", com os ids dos
        // contextos nos quais o usuário está envolvido
        $userContextsIds = $this->getUserContextsIds($user);

        return $this->resultToArray(
            $this->getEntityManager()
                 ->getRepository('\SanSIS\Core\MessagingBundle\Entity\ContextMessage')
                 ->findBy(
                     array(
                         'context' => $this->getEntityManager()
                                           ->getRepository('\SanSIS\Core\MessagingBundle\Entity\Context')
                                           ->findBy(array(
                                                        'groupContext' => 1,
                                                    )),
                         'receiver' => null,
                     )
                 )
        );
    }

    /**
     * [hasMessagesCheck description]
     * @return boolean [description]
     */
    public function hasMessagesCheck()
    {
        $user = $this->getCurrUser();
        $usermsgs = $this->getUnreadUserMessages($user);
        $groupmsgs = $this->getUnreadGroupMessages($user);

        $total = count($usermsgs) + count($groupmsgs);

        $chk = array(
            'chk' => (bool) $total,
            'total' => $total,
        );

        return $chk;
    }

    /**
     * JSON para carregar a combo com a quantidade de mensagens não lidas por contexto disponível para o usuário.
     * @return array
     */
    public function getContextListMessagesCount()
    {
        return $this->resultToArray(
            $this->getEntityManager()
                 ->getRepository('\SanSIS\Core\MessagingBundle\Entity\Context')
                 ->findBy(array(
                     'userContext' => 1,
                 ))
        );
    }

    /**
     * Carrega lista de grupos de mensagens do contexto selecionado, por exemplo Contratos. Por grupo, entende-se um chat com uma pessoa, por exemplo
     * @param  integer $contextId id numérico do contexto desejado
     * @return array
     */
    public function getContextMessageGroups($contextId)
    {
        // return $
    }

    /**
     * Carrega as mensagens de um grupo de mensagens específico, por exemplo, msgs para o grupo do Contrato nº 1
     * @return [type] [description]
     */
    public function getContextMessagesByGroup()
    {
        // return $
    }

    /**
     * Registra as mensagens para um determinado grupo de pessoas envolvidas em um contexto dado.
     * @return [type] [description]
     */
    public function postContextMessageToGroup()
    {
        // return $
    }

    /**
     * Registra as mensagens para uma pessoa específica
     * @return [type] [description]
     */
    public function postContextMessageToUser()
    {
        // return $
    }
}
