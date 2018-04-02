<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/29/2018
 * Time: 11:40 AM
 */

namespace Interactions\FormBundle\Form\Type;

use Interactions\FormBundle\Entity\Cities;
use Interactions\FormBundle\Entity\Counties;
use Interactions\FormBundle\Form\EventListener\AddNameFieldSubscriber;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormInterface;

class DomoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $formModifier = function (FormInterface $form, Counties $counties = null) {
            $cities = null === $counties ? array() : $counties->getCities();

            $form->add('cities', EntityType::class, array(
                'class'        => 'InteractionsFormBundle:Cities',
                'label'        => 'Oras*',
                'choices'      => $cities,
                'placeholder'  => '-- Oras --',
                'choice_label' => function (Cities $cities) {
                    return $cities->getName();
                }
            ));
        };


        $builder
            ->add('Nume', TextType::class, ['label' => 'Nume*'])
            ->add('Prenume', TextType::class, ['label' => 'Prenume*'])
            ->add('Email', EmailType::class, ['label' => 'Email*'])
            ->add('Adresare', ChoiceType::class, array(
                'choices' => array('Domnul' => 'Domnul', 'Doamna' => 'Doamna'),
                'label'   => 'Adresare*',
            ))
            ->add('Parola', RepeatedType::class, array(
                'type'           => PasswordType::class,
                'first_options'  => array('label' => 'Parola*'),
                'second_options' => array('label' => 'Repeta Parola*')
            ))
            ->add('Telefon', TextType::class, ['label' => 'Telefon*'])
            ->add('Adresa', TextType::class, ['label' => 'Adresa*'])
            ->add('counties', EntityType::class, array(
                'class'         => 'InteractionsFormBundle:Counties',
                'label'         => 'Judet*',
                'placeholder'   => '-- Judet --',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('j')
                        ->orderBy('j.name', 'ASC');
                },
                'choice_label'  => function (Counties $counties) {
                    return $counties->getName();

                }
            ));

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();

                $formModifier($event->getForm(), $data->getCounties());
            }
        );

        $builder->get('counties')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                $county = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                $formModifier($event->getForm()->getParent(), $county);
            }
        );
        $builder->addEventSubscriber(new AddNameFieldSubscriber());
    }


}