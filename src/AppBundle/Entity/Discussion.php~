<?php

namespace AppBundle\Entity;

class Discussion {
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
   * Set body
   *
   * @param string $body
   * @return Discussion
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
   * @return Discussion
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
   * @return Discussion
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
   * @return Discussion
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
     * @return Discussion
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
