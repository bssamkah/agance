<?php

namespace Agence\Bundle\FrontBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        // add your custom field
        $builder
                ->add('profil', 'choice', array('choices' => array('Client' => 'Client', 'Responsable' => 'Respnsable'), 'attr' => array('class' => 'form-control')))
                ->add('nom', 'text', array('attr' => array('class' => 'form-control','placeholder'=>"nom")))
                ->add('prenom', 'text', array('attr' => array('class' => 'form-control','placeholder'=>"prenom")))
                ->add('adresse', 'textarea', array('attr' => array('class' => 'form-control','placeholder'=>"Adresse" ), 'required' => False))
                ->add('tel', 'text', array('required' => false, 'attr' => array('class' => 'form-control','placeholder'=>"Adresse"), 'required' => False))
                ->add('agence','entity', array(  'attr'=>array('class'=>'form-control'),
                                           'class' => 'AgenceFrontBundle:Agence',
                                           'property'=>'nom','empty_value' => 'Choisissez votre agence',
    'empty_data'  => null,'required' => False))
            ->add('email', 'email', array('attr' => array('class' => 'form-control','placeholder' => 'Adresse éléctronique')))
                ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control','placeholder' => 'Pseudo')))
                ->add('plainPassword', 'repeated', array(
                    'type' => 'password',
                    'options' => array('translation_domain' => 'FOSUserBundle'),
                    'first_options' => array('label' => 'form.password', 'max_length' => 20, 'attr' => array('class' => 'form-control','placeholder' => 'Mot de passe')),
                    'second_options' => array('label' => 'form.password_confirmation', 'attr' => array('class' => 'form-control','placeholder' => 'Confirmer Mot de passe')),
                    'invalid_message' => 'fos_user.password.mismatch',
                ));
    }

    public function getParent() {
        return 'fos_user_registration';
    }

    public function getName() {
        return 'agencefront_user_registration';
    }

}
