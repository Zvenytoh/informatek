<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\ProduitType;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class AjoutProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, ['attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=>
            'fw-bold']])
            ->add('prix', MoneyType::class, ['attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=>
            'fw-bold']])
            ->add('description', TextareaType::class, ['attr' => ['class'=> 'form-control', 'rows'=>'7', 'cols'
            => '7'], 'label_attr' => ['class'=> 'fw-bold']])
            ->add('marque', TextType::class, ['attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=>
            'fw-bold']])
            ->add('image', TextType::class, ['attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=>
            'fw-bold']])
            ->add('produitType', EntityType::class, [
                'class' => ProduitType::class,'attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=>
                'fw-bold'],
                'choice_label' => 'libelle',
                ])
                ->add('envoyer', SubmitType::class, ['attr' => ['class'=> 'btn bg-primary text-white m-4' ],
                'row_attr' => ['class' => 'text-center'],])

                ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
