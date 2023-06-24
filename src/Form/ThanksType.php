<?php

namespace App\Form;

use App\Entity\Thanks;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ThanksType extends AbstractType
{

    private $user;

    public function __construct(Security $security) {
        $this->user = $security->getUser();
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $this->user;
        $toUser = $options['to_user'];
        $builder
        ->add('To_User', EntityType::class, [
            'class' => User::class,
            'choice_label' => "email",
            'query_builder' => function (EntityRepository $er) use ($user) {
                return $er->createQueryBuilder('e')
                    ->where('e != :a')
                    ->setParameter('a', $user);
            },
            'data' => $toUser
        ])
            ->add('Reason')
            ->add('Update_thanks', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Thanks::class,
            'to_user' => null,
        ]);
    }
}
