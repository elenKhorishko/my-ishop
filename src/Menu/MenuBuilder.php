<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.12.2017
 * Time: 14:30
 */

namespace App\Menu;

use App\Servise\Catalogue;
use Knp\Menu\FactoryInterface;

class MenuBuilder
{
    private $factory;

    /**
     * @var Catalogue
     */
    private $catalogueService;

    /**
     * @param FactoryInterface $factory
     *
     * Add any other dependency you need
     */
    public function __construct(FactoryInterface $factory, Catalogue $catalogue)
    {
        $this->factory = $factory;
        $this->catalogueService = $catalogue;
    }

    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Главная', ['route' => 'homepage']);
        $catalogueMenu = $menu->addChild('Каталог', ['route' => 'categoies_list']);
        $catalogueMenu->setExtra('dropdown', true);

        foreach ($this->catalogueService->getTopCategories() as $category) {
            $catalogueMenu->addChild($category->getName(), [
                'route' => 'category_show',
                'routeParameters' => ['slug' => $category->getSlug()],
            ]);
        }

        // ... add more children

        return $menu;
    }
}