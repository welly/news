<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="comment")
 */
class Comment {

  // private $user;

  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(type="text")
   */
  protected $body;

  /**
   * @ORM\Column(type="datetime")
   */
  protected $created;

  /**
   * @ORM\Column(type="datetime")
   */
  protected $updated;

  /**
   * @ORM\Column(type="boolean")
   */
  protected $status;

  /**
   * @ORM\ManyToOne(targetEntity="Topic", inversedBy="comments")
   * @ORM\JoinColumn(name="topic_id", referencedColumnName="id")
   * @var [type]
   */
  protected $topic;

  public function __construct() {
    $this->created = new \Datetime();
    $this->updated = new \Datetime();
    $this->status = TRUE;
  }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Comment
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Comment
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Comment
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Comment
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set topic
     *
     * @param \AppBundle\Entity\Topic $topic
     * @return Comment
     */
    public function setTopic(\AppBundle\Entity\Topic $topic = null)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return \AppBundle\Entity\Topic
     */
    public function getTopic()
    {
        return $this->topic;
    }
}
