<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Topic;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TopicController extends Controller {

  /**
   * @Route("/topic/create")
   */
  public function createAction() {

    $topic = new Topic();
    $topic->setTitle('Title of first topic');
    $topic->setUid(1);
    $topic->setType('discussion');
    $topic->setCreated(new \DateTime('2015-03-12 15:00'));
    $topic->setUpdated(new \DateTime());
    $topic->setStatus(1);

    $em = $this->getDoctrine()->getManager();

    $em->persist($topic);
    $em->flush();

    return new Response('Created topic ' . $topic->getId());

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
