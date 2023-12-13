<?php

namespace App\Form;

use App\Entity\Formation;
use App\Entity\Stagiaire;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StagiaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_stagiaire')
            ->add('prenom_stagiaire')
            ->add('date_naissance')
            ->add('adresse')
            ->add('email')
            ->add('telephone')
            ->add('niveau_etude')
            ->add('numero_national_stagiaire')
            ->add('date_inscription')
            ->add('compte_bancaire_stagiaire')
            ->add('formation', EntityType::class, [
                'class' => Formation::class,
'choice_label' => 'intitule_formation',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stagiaire::class,
        ]);
    }
}
