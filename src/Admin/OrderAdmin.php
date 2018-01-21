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

class OrderAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper) // определяем поля в форме редактирования
    {
        $formMapper
            ->add('id')
            ->add('customerName')
            ->add('phone')
            ->add('email')
            ->add('address')
            ->add('count')
            ->add('amount')
            ->add('status')
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) // поля для фильтра на списке
    {
        $datagridMapper
            ->add('id')
            ->add('customerName')
            ->add('phone')
            ->add('email')
            ->add('address')
            ->add('count')
            ->add('amount')
            ->add('status')
            ;
    }

    protected function configureListFields(ListMapper $listMapper) // определяем поля в самом списке
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('customerName')
            ->addIdentifier('phone')
            ->addIdentifier('email')
            ->addIdentifier('address')
            ->add('count')
            ->add('amount')
            ->addIdentifier('status') // поле с сылкой на поле редактирования
            ;
    }
}