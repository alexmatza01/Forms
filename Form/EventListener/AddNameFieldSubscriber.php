<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/29/2018
 * Time: 12:55 PM
 */

namespace Interactions\FormBundle\Form\EventListener;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AddNameFieldSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        // Tells the dispatcher that you want to listen on the form.pre_set_data
        // event and that the preSetData method should be called.
        return array(FormEvents::PRE_SET_DATA => 'preSetData');
    }

    public function preSetData(FormEvent $event)
    {
        $form = $event->getForm();

        $form->add('save', SubmitType::class, array('label' => 'Creaza o Persoana', 'attr' => ['class' => 'btn-primary float-right']));

    }
}