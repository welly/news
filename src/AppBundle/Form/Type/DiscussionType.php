<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DiscussionType extends AbstractType {

  public function buildForm(FormBuilderInterface $builder, array $option) {
    $builder->add('body');
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver) {
    $resolver->setDefaults(array(
      'data_class' => 'AppBundle\Entity\Discussion',
    ));
  }

  public function getName() {
    return 'discussion';
  }

}