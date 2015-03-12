<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Entity\Topic;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends Controller {


  /**
   * @Route("/comment/list/{tid}")
   */
  public function listAction($tid) {
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
   * @Route("/comment/create/{tid}")
   */
  public function createAction(Request $request, $tid) {

    $comment = new Comment();

    $form = $this->createForm(new CommentType(), $comment);

    $form->handleRequest($request);

    if ($form->isValid()) {

      // $discussion = new Discussion();

      $comment = $form->getData();
      // $topic->setUid(1);
      // $topic->setStatus(1);

      // $em = $this->getDoctrine()->getManager();
      // $em->persist($topic);
      // $em->flush();

      ladybug_dump($comment);

      $request->getSession()->getFlashBag()->add(
        'notice',
        'Your comment was saved!'
      );
    }

    return $this->render('Comment/create.html.twig', array(
      'form' => $form->createView(),
    ));

  }


}
