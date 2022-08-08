<?php

namespace App\Form;

use App\Entity\Attestation;
use App\Entity\Convention;
use App\Entity\Etudiant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('etudiant', EntityType::class, [
                // looks for choices from this entity
                'class' => Etudiant::class,

                // uses the User.username property as the visible option string
                'choice_label' => function (Etudiant $etudiant) {
                    return $etudiant->getNom() . ' ' . $etudiant->getPrenom();

                    // or better, move this logic to Customer, and return:
                    // return $customer->getFullname();
                },

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('convention', EntityType::class, [
                // looks for choices from this entity
                'class' => Convention::class,

                // uses the User.username property as the visible option string
                'choice_label' => 'nom',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('message', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Attestation::class,
        ]);
    }
}
