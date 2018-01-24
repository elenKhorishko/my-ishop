<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.01.2018
 * Time: 18:54
 */

namespace App\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class OrderItemAdmin extends AbstractAdmin
{

    public function getParentAssociationMapping() //связанная админка
    {
        return 'order'; // родитель привязан по свойству order
    }

    protected function configureFormFields(FormMapper $formMapper) // определяем поля в форме редактирования
    {
        $formMapper
            ->add('product')
            ->add('count')
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) // поля для фильтра на списке
    {
        $datagridMapper
            ->add('product')
            ->add('count')
            ->add('amount')
            ;
    }

    protected function configureListFields(ListMapper $listMapper) // определяем поля в самом списке
    {
        $listMapper
            ->add('product')
            ->addIdentifier('count')
            ->addIdentifier('amount') // поле с сылкой на поле редактирования
            ;
    }
}