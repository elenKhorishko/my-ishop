<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.01.2018
 * Time: 18:54
 */

namespace App\Admin;


use App\Entity\Order;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class OrderAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper) // определяем поля в форме редактирования
    {
        $formMapper
            ->add('user')
            ->add('crestedAt')
            ->add('customerName')
            ->add('phone')
            ->add('email')
            ->add('address')
            ->add('status', ChoiceType::class, [ // выпадающий список
                'choices' => [
                    'draft' => Order::STATUS_DRAFT,
                    'ordered' => Order::STATUS_ORDERED,
                    'sent' => Order::STATUS_SENT,
                    'received' => Order::STATUS_RECEIVED,
                    'completed' => Order::STATUS_COMPLETED,
                ]
            ])
            ->add('isPaid')
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) // поля для фильтра на списке
    {
        $datagridMapper
            ->add('user')
            ->add('crestedAt')
            ->add('count')
            ->add('amount')
            ->add('customerName')
            ->add('phone')
            ->add('email')
            ->add('address')
            ->add('status', null, [], ChoiceType::class, [
                'choices' => [
                    'draft' => Order::STATUS_DRAFT,
                    'ordered' => Order::STATUS_ORDERED,
                    'sent' => Order::STATUS_SENT,
                    'received' => Order::STATUS_RECEIVED,
                    'completed' => Order::STATUS_COMPLETED,
                    ]
            ])
            ->add('isPaid')
            ;
    }

    protected function configureListFields(ListMapper $listMapper) // определяем поля в самом списке
    {
        $listMapper
            ->addIdentifier('id') // поле с сылкой на поле редактирования
            ->add('user')
            ->addIdentifier('crestedAt')
            ->addIdentifier('count')
            ->addIdentifier('amount')
            ->addIdentifier('customerName')
            ->addIdentifier('phone')
            ->addIdentifier('email')
            ->addIdentifier('address')
            ->add('status', 'choice', [ // выпадающий список
                'editable' => true,
                'choices' => [
                    Order::STATUS_DRAFT => 'draft',
                    Order::STATUS_ORDERED => 'ordered',
                    Order::STATUS_SENT => 'sent',
                    Order::STATUS_RECEIVED => 'received',
                    Order::STATUS_COMPLETED => 'completed',
                ],
                'catalogue' => 'messages',
            ])
            ->add('isPaid', null, ['editable' => true])
            ;
    }

    // родителю добавляем ссылку на ребенка
    protected function configureTabMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, ['edit', 'show'])) { //если нет ребенка и мы не в ворме то выходим
            return;
        }

        $admin = $this->isChild() ? $this->getParent() : $this; // если мы в ребенке то получаем родительскую админку
        $id = $admin->getRequest()->get('id'); // берем id текущего заказа

        if ($this->isGranted('EDIT')) { // если нам разрешено редактировать
            $menu->addChild('Edit Order', [ // то добавляем пункт меню - редактирвоание заказа
                'uri' => $admin->generateUrl('edit', ['id' => $id]) // строим ссылку на редактирование
            ]);
        }

        if ($this->isGranted('LIST')) { // если разрещен просмотр списка
            $menu->addChild('Manage Items', [ // то добавляем пункт меню - управление items
                'uri' => $admin->generateUrl('admin.order_item.list', ['id' => $id]) // генерируем ссылку на orderItems
            ]);
        }
    }


}