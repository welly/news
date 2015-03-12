<?php

namespace AppBundle\Form\Type;

use AppBundle\Form\Type\DiscussionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TopicType extends AbstractType {

  public function buildForm(FormBuilderInterface $builder, array $option) {

    $builder
      ->add('title', 'text')
      ->add(
        'type', 'choice', array(
          'choices' => array(
            'discussion' => 'Discussion', 'external' => 'External',
          ),
          'expanded' => true
        )
      )
      ->add('discussion', new DiscussionType())
      ->add('save', 'submit', array('label' => 'Create topic'));
  }

  public function getName() {
    return 'topic';
  }

}