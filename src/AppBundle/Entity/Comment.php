<?php

namespace AppBundle\Entity;

class Comment {

  protected $uid;
  protected $tid;
  protected $pid;
  protected $body;
  protected $created;
  protected $updated;
  protected $status;

  private $id;

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
   * @return Comment
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
   * Set tid
   *
   * @param integer $tid
   * @return Comment
   */
  public function setTid($tid)
  {
      $this->tid = $tid;

      return $this;
  }

  /**
   * Get tid
   *
   * @return integer
   */
  public function getTid()
  {
      return $this->tid;
  }

  /**
   * Set pid
   *
   * @param integer $pid
   * @return Comment
   */
  public function setPid($pid)
  {
      $this->pid = $pid;

      return $this;
  }

  /**
   * Get pid
   *
   * @return integer
   */
  public function getPid()
  {
      return $this->pid;
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
     * @var \AppBundle\Entity\Topic
     */
    private $topic;


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
