<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Discussion;
use AppBundle\Entity\Topic;
use AppBundle\Form\Type\TopicType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;

class TopicController extends Controller {

  /**
   * @Route("/topic/list")
   */
  public function listAction() {
    $topics = $this->getDoctrine()
      ->getRepository('AppBundle:Topic')
      ->findAll();

      if (!$topics) {
          throw $this->createNotFoundException(
            'No topics found'
          );
      }

      return $this->render('Topic/list.html.twig', array('topics' => $topics));
  }

  /**
   * @Route("/topic/show/{id}")
   */
  public function showAction($id) {

    $topic = $this->getDoctrine()
      ->getRepository('AppBundle:Topic')
      ->find($id);


    if (!$topic) {
      throw $this->createNotFoundException(
        'No topic found for id ' . $id
      );
    }

    return $this->render('Topic/show.html.twig', array('topic' => $topic));
  }


  /**
   * @Route("/topic/create")
   */
  public function createAction(Request $request) {

    $topic = new Topic();

    $form = $this->createForm(new TopicType(), $topic);

    $form->handleRequest($request);

    if ($form->isValid()) {

      $topic = $form->getData();

      $em = $this->getDoctrine()->getManager();
      $em->persist($topic);
      $em->flush();

      $request->getSession()->getFlashBag()->add(
        'notice',
        'Your topic was saved!'
      );
    }

    return $this->render('Topic/create.html.twig', array(
      'form' => $form->createView(),
    ));

  }

  /**
   * @Route("/topic/update/{id}")
   */
  public function updateAction($id) {

    $em = $this->getDoctrine()->getManager();
    $topic = $em->getRepository('AppBundle:Topic')->find($id);

    if (!$topic) {
      throw $this->createNotFoundException(
        'No topic found for id ' . $id
      );
    }

    $topic->setTitle('Title of updated topic');
    $topic->setUid(1);
    $topic->setType('discussion');
    $topic->setUpdated(new \DateTime());
    $topic->setStatus(1);

    $em->flush();

    return new Response('Updated topic ' . $topic->getId());

  }


}
