<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 15.12.2017
 * Time: 19:21
 */

namespace App\Servise;


use App\Entity\Category;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class Catalogue
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @return Category[]|array
     */
    public function getCategories()
    {
        $repo = $this->em->getRepository(Category::class);
        return $repo->findAll();
    }

}