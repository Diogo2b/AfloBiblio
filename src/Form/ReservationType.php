<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;

class ReservationType extends AbstractType
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateReservation')
            ->add('dateExpiration')
            ->add('etat');

        // Se o usuário tiver a função ROLE_ADMIN, adicione o campo appUser
        if ($this->security->isGranted('ROLE_ADMIN')) {
            $builder->add('appUser');
        } else {
            // Caso contrário, defina o usuário atual como o valor padrão para appUser
            $builder->add('appUser', null, [
                'data' => $this->security->getUser(),
                'disabled' => true
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
