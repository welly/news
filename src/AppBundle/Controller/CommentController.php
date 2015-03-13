<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Entity\Topic;
use AppBundle\Form\Type\CommentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
   * @Route("/comment/create")
   */
  public function createAction(Request $request, Topic $topic) {

    $comment = new Comment();

    $form = $this->createForm(new CommentType(), $comment,
      array(
        'action' => $this->generateUrl('comment_create', array('topic' => $topic->getId())),
      )
    );

    $form->handleRequest($request);

    if ($form->isValid()) {

      $comment = $form->getData();
      $comment->setTopic($topic);

      ladybug_dump($comment);

      $em = $this->getDoctrine()->getManager();
      $em->persist($comment);
      $em->flush();

      $request->getSession()->getFlashBag()->add(
        'notice',
        'Your comment was saved!'
      );

      return new RedirectResponse($this->generateUrl('topic_show', array('id' => $comment->getTopic()->getId())));
    }

    return $this->render('Comment/create.html.twig', array(
      'form' => $form->createView(),
    ));

  }


}
