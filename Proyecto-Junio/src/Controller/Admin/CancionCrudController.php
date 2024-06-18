<?php

namespace App\Controller\Admin;

use App\Entity\Cancion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CancionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cancion::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titulo', 'Título'),
            TextField::new('autor', 'Autor'),
            TextField::new('genero', 'Género'),
            ImageField::new('foto', 'Foto')
                ->setBasePath('/uploads/images') 
                ->setUploadDir('public/uploads/images')
                ->setRequired(false),
                ImageField::new('audio', 'Archivo de audio')
                ->setBasePath('/uploads/music')
                ->setUploadDir('public/uploads/music')
                ->hideOnIndex()
        ];
    }
}
