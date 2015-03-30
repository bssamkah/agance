<?php

namespace Agence\Bundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends Admin {

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('email', 'email', array('label' => 'Email'))
                ->add('username', null, array('label' => 'User Name'))
                ->add('roles', 'choice', array('choices' => $this->getConfigurationPool()->getContainer()->getParameter('security.role_hierarchy.roles'), 'multiple' => true, 'label' => 'User Name'))
                ->add('enabled');
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('email')
                ->add('username')
                ->add('roles')
                ->add('enabled')

        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('email')
                ->add('username')
                ->add('rolesAsString', 'string')
                ->add('enabled')
        ;
    }

}
