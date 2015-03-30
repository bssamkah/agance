<?php

namespace Agence\Bundle\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GaleriePhotoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('file','file',array('attr'=>array('class'=>'file','multiple data-show-upload'=>'true','data-show-caption'=>'false', 'data-show-remove'=>'false',
                "multiple" => "multiple",)))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Agence\Bundle\FrontBundle\Entity\GaleriePhoto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'agence_bundle_frontbundle_galeriephoto';
    }
}
