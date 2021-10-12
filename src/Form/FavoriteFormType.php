<?php

namespace App\Form;

use App\Entity\Favorites;
use App\Entity\Palette;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FavoriteFormType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('user_id', HiddenType::class)
      // ->add('user_id')
      ->add('color_id', HiddenType::class)
      // ->add('color_id')
      ->add('like', SubmitType::class)
    ;
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => Favorites::class,
    ]);
  }
}
