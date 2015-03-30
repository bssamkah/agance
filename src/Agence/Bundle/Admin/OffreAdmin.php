<?php

namespace Agence\Bundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class OffreAdmin extends Admin {

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                        ->add('lieu', 'text', array('label' => 'Lieu'))
                        ->add('prix', 'integer', array('label' => 'Prix'))
                        ->add('surface','integer', array('label' => 'Surface'))
                         ->add('type', 'choice', array('choices' => array('location' => 'location', 'vente' => 'vente')))
                        ->add('description', 'text', array('label' => 'Lieu')) 
                        ->add('typeTerrain', 'text', array('label' => 'Type de Terrain'))
                        ->add('nbrChambre', 'integer', array('label' => 'Nombre de chambre'))
                        ->add('etage', 'integer', array('label' => 'Etage'))
                       
                        
                        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('lieu')
                ->add('prix')
                ->add('surface')
                ->add('type')
                ->add('description')
                ->add('typeTerrain')
                ->add('nbrChambre')
                ->add('etage')

        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('lieu')
                ->add('prix')
                ->add('surface')
                ->add('type')
                ->add('description')
                ->add('typeTerrain')
                ->add('nbrChambre')
                ->add('etage')
        ;
    }

}
