<?php

namespace App\Controller\Admin;

use App\Entity\articles;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticlesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return articles::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            TextField::new('soustitre'),
            TextField::new('prix'),
            ImageField::new("image")
                ->setBasePath('articles/')
                ->setUploadDir('public/articles')
               -> setUploadedFileNamePattern('[randomhash].[extension]')
        ];
    }

}
