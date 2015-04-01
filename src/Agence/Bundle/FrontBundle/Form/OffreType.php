<?php

namespace Agence\Bundle\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OffreType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
               ->add('titre','text',array('required'=>True))
            ->add('type','choice', array('choices' => array('location' => 'location', 'Vente' => 'vente'),'required' => True ,'empty_value' => 'Choisissez Type',
    'empty_data'  => null))
            ->add('lieu','text',array('required'=>True))
           
            ->add('surface','integer',array('required'=>True))
            ->add('typeTerrain','text',array('required'=>True))
            ->add('description','textarea',array('required'=>True))
           
            ->add('nbrChambre','integer',array('required'=>True))
            ->add('etage','integer',array('required'=>True))
             ->add('prix','integer',array('required'=>True))
                 ->add('lat', 'number', array('attr' => array('class' => 'form-control')))
                ->add('lng', 'number', array('attr' => array('class' => 'form-control')))
          
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Agence\Bundle\FrontBundle\Entity\Offre'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'agence_bundle_frontbundle_offre';
    }
}
