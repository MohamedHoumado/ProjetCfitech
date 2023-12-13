<?php

namespace App\Controller\Admin;

use App\Entity\Stagiaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;



use App\Entity\Formation;

class StagiaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Stagiaire::class;

    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom_stagiaire'),
            TextField::new('prenom_stagiaire'),
            DateField::new('date_naissance'),
            TextField::new('adresse'),
            TextField::new('email'),
            TextField::new('telephone'),
            TextField::new('niveau_etude'),
            TextField::new('numero_national_stagiaire'),
            DateField::new('date_inscription'),
            TextField::new('compte_bancaire_stagiaire'),
            // AssociationField::new('formation_id'),




        ];
    }

}
