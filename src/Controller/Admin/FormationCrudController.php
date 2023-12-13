<?php

namespace App\Controller\Admin;

use App\Entity\Formation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FormationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('intitule_formation'),
            TextareaField::new('description'),
            DateField::new('date_debut'),
            DateField::new('date_fin'),
            IntegerField::new('duree'),
            TextField::new('lieu_formation'),
            IntegerField::new('nombre_participants_max'),
            BooleanField::new('inscription_ouvertes')
           
        ];
     
    }
    
}
