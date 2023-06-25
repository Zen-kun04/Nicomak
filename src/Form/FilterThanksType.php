<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class FilterThanksType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('From_User', ChoiceType::class, [
                "choices" => [
                    "Others" => 0,
                    "Me" => 1
                ]
            ])
            ->add('To_User', ChoiceType::class, [
                "choices" => [
                    "Others" => 0,
                    "Me" => 1
                ]
            ])
            ->add('Search', SubmitType::class)
        ;
    }
}
