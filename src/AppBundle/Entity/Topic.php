<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\TopicRepository")
 */
class Topic {
  protected $title;
  protected $created;
  protected $updated;
  protected $type;
  protected $status;
  private $id;

  /**
   * @Assert\Type(type="AppBundle\Entity\Discussion")
   * @Assert\Valid()
   */
  protected $discussion;
  protected $uid;

  public function __construct() {
    $this->created = new \Datetime();
    $this->updated = new \Datetime();
    $this->status = 1;
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
   * Set uid
   *
   * @param integer $uid
   * @return Topic
   */
  public function setUid($uid)
  {
    $this->uid = $uid;

    return $this;
  }

  /**
   * Get uid
   *
   * @return integer
   */
  public function getUid()
  {
    return $this->uid;
  }

  /**
   * Set title
   *
   * @param string $title
   * @return Topic
   */
  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

  /**
   * Get title
   *
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Set created
   *
   * @param \DateTime $created
   * @return Topic
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
   * @return Topic
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
   * Set type
   *
   * @param string $type
   * @return Topic
   */
  public function setType($type)
  {
    $this->type = $type;

    return $this;
  }

  /**
   * Get type
   *
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }

  /**
   * Set status
   *
   * @param boolean $status
   * @return Topic
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

  public function getDiscussion()
  {
    return $this->discussion;
  }

  public function setDiscussion(Discussion $discussion = null)
  {
    $this->discussion = $discussion;
  }
    /**
     * @var integer
     */
    private $did;


    /**
     * Set did
     *
     * @param integer $did
     * @return Topic
     */
    public function setDid($did)
    {
        $this->did = $did;

        return $this;
    }

    /**
     * Get did
     *
     * @return integer
     */
    public function getDid()
    {
        return $this->did;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;


    /**
     * Add comments
     *
     * @param \AppBundle\Entity\Comment $comments
     * @return Topic
     */
    public function addComment(\AppBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \AppBundle\Entity\Comment $comments
     */
    public function removeComment(\AppBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
