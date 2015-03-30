<?php



namespace Agence\Bundle\FrontBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Listener responsible for adding the default user role at registration
 */
class RegistrationListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
        );
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        $rolesArr = array('ROLE_RESPONSABLE');

        /** @var $user \FOS\UserBundle\Model\UserInterface */
        $user = $event->getForm()->getData();
        if($user->getProfil()=='Responsable')
        {
            $user->setEnabled(false);
        $user->setRoles($rolesArr);
        }
        else{
            $rolesArr = array('ROLE_USER');
            $user->setEnabled(true);
           $user->setRoles($rolesArr); 
        }
    }
}