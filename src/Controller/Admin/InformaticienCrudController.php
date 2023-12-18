<?php

namespace App\Controller\Admin;

use App\Entity\Informaticien;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class InformaticienCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Informaticien::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new(propertyName: 'service'),
            TextField::new('nom_informaticien'),
            TextField::new('prenom_informaticien'),
            DateField::new('date_naissance'),
            TextField::new('adresse_informaticien'),
            EmailField::new('email'),
            TelephoneField::new('telephone'),
            IntegerField::new('experience_annee'),
            TextField::new('niveau_etude'),
            TextareaField::new('certification'),
            DateField::new('date_embauche'),
            



        ];
    }

}
