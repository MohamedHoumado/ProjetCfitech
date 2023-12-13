<?php

namespace App\Form;

use App\Entity\Informaticien;
use App\Entity\Service;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InformaticienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_informaticien')
            ->add('prenom_informaticien')
            ->add('date_naissance')
            ->add('adresse_informaticien')
            ->add('email')
            ->add('telephone')
            ->add('experience_annee')
            ->add('niveau_etude')
            ->add('certification')
            ->add('date_embauche')
            ->add('statut')
            ->add('service', EntityType::class, [
                'class' => Service::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Informaticien::class,
        ]);
    }
}
