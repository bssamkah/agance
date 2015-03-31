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
            ->add('type','choice', array('choices' => array('location' => 'Location', 'Vente' => 'vente'),array('required' => True)))
            ->add('lieu','text',array('required'=>True))
            ->add('prix','integer',array('required'=>True))
            ->add('type','text',array('required'=>True))
            ->add('description','textarea',array('required'=>True))
            ->add('typeTerrain','text',array('required'=>True))
            ->add('nbrChambre','integer',array('required'=>True))
            ->add('etage','integer',array('required'=>True))
          
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
