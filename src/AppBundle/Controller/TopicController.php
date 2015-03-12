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
   * @Route("/list")
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
   * @Route("/show/{id}")
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
   * @Route("/create")
   */
  public function createAction(Request $request) {

    $topic = new Topic();

    $form = $this->createForm(new TopicType(), $topic);

    $form->handleRequest($request);

    if ($form->isValid()) {

      // $discussion = new Discussion();

      $topic = $form->getData();
      $topic->setUid(1);
      $topic->setStatus(1);

      $em = $this->getDoctrine()->getManager();
      $em->persist($topic);
      $em->flush();

      ladybug_dump($topic);

      // $discussion = $topic->getDiscussion();
      // $discussion->setTid($topic->getId());

      // $em->persist($discussion);
      // $em->flush();


      $request->getSession()->getFlashBag()->add(
        'notice',
        'Your topic was saved!'
      );
    }

    // return new Response('Created topic ' . $topic->getId());
    //
    return $this->render('Topic/create.html.twig', array(
      'form' => $form->createView(),
    ));

  }

  /**
   * @Route("/update/{id}")
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
