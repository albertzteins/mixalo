<?php

class Campaign
{
  private $id;
  private $campaign_type;
  private $date;
  private $author;
  private $author_site;
  private $author_ip;
  private $votes;
  private $votes_up;
  private $votes_down;
  
  /* Setters */
  function setId($id) { $this->id = $id; }
  function setCampaignType($campaign_type) { $this->campaign_type = $campaign_type; }
  function setDate($date) { $this->date = date(MYSQL_DATETIME, strtotime($date)); }
  function setAuthor($author) { $this->author = $author; }
  function setAuthorSite($author_site) { $this->author_site = $author_site; }
  function setAuthorIP($author_ip) { $this->author_ip = $author_ip; }
  function setVotes($votes) { $this->votes = $votes; }
  function setVotesUp($votes_up) { $this->votes_up = $votes_up; }
  function setVotesDown($votes_down) { $this->votes_down = $votes_down; }
  
  /* Getters */
  function getId() { return $this->id; }
  function getCampaignType() { return $this->campaign_type; }
  function getDate($format = MYSQL_DATETIME) { return date($format, strtotime($this->date)); }
  function getAuthor() { return $this->author; }
  function getAuthorSite()
  {
    if ($this->author_site && substr($this->author_site, 0, 7) != 'http://')
    {
      if (strpos($this->author_site, '.') !== false)
      {
        return 'http://' . $this->author_site;
      }
      else
        return 'http://twitter.com/' . $this->author_site;
        
    }
    else
    {
      return $this->author_site;
    }
  }
  function getAuthorIP() { return $this->author_ip; }
  function getVotes() { return $this->votes; }
  function getVotesUp() { return $this->votes_up; }
  function getVotesDown() { return $this->votes_down; }
  
  function getThumbURI() { return CAMPAIGNS_URI . $this->id . '_t.jpg'; }
  function getImageURI() { return CAMPAIGNS_URI . $this->id . '_n.jpg'; }
  
  /* Methods */
  function save()
  {
    global $db;
    
    $sth = $db->prepare("INSERT INTO " . TABLE_CAMPAIGNS . "
                          (campaign_type, date, author, author_site, author_ip) VALUES
                          (:campaign_type, :date, :author, :author_site, :author_ip)");
    $sth->bindParam(':campaign_type', $this->campaign_type);
    $sth->bindParam(':date', $this->date);
    $sth->bindParam(':author', $this->author);
    $sth->bindParam(':author_site', $this->author_site);
    $sth->bindParam(':author_ip', $this->author_ip);
    $sth->execute();
    
    $this->setId($db->lastInsertId());
    
    return true;
  }
  function update()
  {
    /*
    global $db;
    
    $sth = $db->prepare("UPDATE " . TABLE_CAMPAIGNS . "
                          SET campaign_type = :campaign_type, date = :date, author = :author, author_site = :author_site, author_ip = :author_ip, 
                          WHERE id = :id
                          LIMIT 1");
    $sth->bindParam(':campaign_type', $this->campaign_type);
    $sth->bindParam(':date', $this->date);
    $sth->bindParam(':author', $this->author);
    $sth->bindParam(':author_site', $this->author_site);
    $sth->bindParam(':author_ip', $this->author_ip);
    $sth->bindParam(':id', $this->id);
    $sth->execute();
    
    return true;
    */
  }
  
  /* Static methods */
  static function deleteCampaignWithId($id)
  {
    global $db;
    
    if (is_int($id))
    {
      $sth = $db->prepare("DELETE FROM " . TABLE_CAMPAIGNS . "
                            WHERE id = :id
                            LIMIT 1");
      $sth->bindParam(':id', $id);
      $sth->execute();
      
      if ($sth->rowCount())
        return true;
      else
        return false;
        
    }
    else
    {
      throw new InvalidArgumentException("The id must be an integer.");
    }
  }
  
  static function getCampaignWithId($id)
  {
    global $db;
    
    if (is_int($id))
    {
      $sth = $db->prepare("SELECT id, campaign_type, date, author, author_site, author_ip, votes, votes_up, votes_down
                            FROM " . TABLE_CAMPAIGNS . "
                            WHERE id = :id
                            LIMIT 1");
      $sth->bindParam(':id', $id);
      $sth->execute();
    }
    else
    {
      throw new InvalidArgumentException("The id must be an integer.");
    }
    
    $sth->setFetchMode(PDO::FETCH_CLASS, 'Campaign');
    
    return $sth->fetch();
  }
  
  static function getCampaignsByDate($limit = 40, $offset = 0)
  {
    global $db;
    
    if (is_int($limit))
    {
      $sth = $db->prepare("SELECT id, campaign_type, date, author, author_site, author_ip, votes, votes_up, votes_down
        FROM " . TABLE_CAMPAIGNS . "
        ORDER BY date DESC
        LIMIT :offset, :limit");
      $sth->bindParam(':limit', $limit, PDO::PARAM_INT);
      $sth->bindParam(':offset', $offset, PDO::PARAM_INT);
      $sth->execute();
    }
    // elseif ($limit === 0) 
    // {
    //   $sth = $db->query("SELECT id, campaign_type, date, author, author_site, author_ip, votes, votes_up, votes_down
    //     FROM " . TABLE_CAMPAIGNS . "
    //     ORDER BY date DESC");
    // }
    else
    {
      throw new InvalidArgumentException("The limit must be a number.");
    }
    
    $sth->setFetchMode(PDO::FETCH_CLASS, 'Campaign');
    
    return $sth->fetchAll();
  }
  
  static function getCampaignsByVotes($limit = 40, $offset = 0, $campaign_type = 0)
  {
    global $db;
    
    if ($campaign_type && is_int($campaign_type))
    {
      $sth = $db->prepare("SELECT id, campaign_type, date, author, author_site, author_ip, votes, votes_up, votes_down
        FROM " . TABLE_CAMPAIGNS . "
        WHERE campaign_type = :campaign_type
        ORDER BY votes DESC
        LIMIT :offset, :limit");
      $sth->bindParam(':campaign_type', $campaign_type, PDO::PARAM_INT);
      $sth->bindParam(':offset', $offset, PDO::PARAM_INT);
      $sth->bindParam(':limit', $limit, PDO::PARAM_INT);
      $sth->execute();
    }
    elseif ($campaign_type === 0) 
    {
      $sth = $db->prepare("SELECT id, campaign_type, date, author, author_site, author_ip, votes, votes_up, votes_down
        FROM " . TABLE_CAMPAIGNS . "
        ORDER BY votes DESC
        LIMIT :offset, :limit");
      $sth->bindParam(':offset', $offset, PDO::PARAM_INT);
      $sth->bindParam(':limit', $limit, PDO::PARAM_INT);
      $sth->execute();
    }
    else
    {
      throw new InvalidArgumentException("The campaign type must be an integer.");
    }
    
    $sth->setFetchMode(PDO::FETCH_CLASS, 'Campaign');
    
    return $sth->fetchAll();
  }
  
  static function voteForCampaignWithId($id)
  {
    global $db;
    
    if (is_int($id))
    {
      $sth = $db->prepare("UPDATE " . TABLE_CAMPAIGNS . "
                            SET votes = votes+1
                            WHERE id = :id
                            LIMIT 1");
      $sth->bindParam(':id', $id);
      $sth->execute();
      
      if ($sth->rowCount())
        return true;
      else
        return false;
      
    }
    else
    {
      throw new InvalidArgumentException("The id must be an integer.");
    }
  }
  
  static function getRandomForCampaignType($campaign_type)
  {
    global $db;
    
    $sth = $db->prepare("SELECT COUNT(*)
                          FROM " . TABLE_CAMPAIGNS . "
                          WHERE campaign_type = :campaign_type");
    $sth->bindParam(':campaign_type', $campaign_type);
    $sth->execute();
    
    $count = $sth->fetch(PDO::FETCH_NUM);
    
    $random_row = mt_rand(0, ($count[0] - 1));
    
    $sth = $db->prepare("SELECT id, campaign_type, date, author, author_site, author_ip, votes, votes_up, votes_down
                          FROM " . TABLE_CAMPAIGNS . "
                          WHERE campaign_type = :campaign_type
                          LIMIT :offset, 1");
    $sth->bindParam(':campaign_type', $campaign_type);
    $sth->bindParam(':offset', $random_row, PDO::PARAM_INT);
    $sth->execute();
    
    $sth->setFetchMode(PDO::FETCH_CLASS, 'Campaign');
    
    return $sth->fetch();
  }
  
  static function getRandomFromTopForCampaignType($campaign_type)
  {
    global $db;
    
    $random_row = mt_rand(0, 2);
    
    $sth = $db->prepare("SELECT id, campaign_type, date, author, author_site, author_ip, votes, votes_up, votes_down
                          FROM " . TABLE_CAMPAIGNS . "
                          WHERE campaign_type = :campaign_type
                          ORDER BY votes DESC
                          LIMIT :offset, 1");
    $sth->bindParam(':campaign_type', $campaign_type);
    $sth->bindParam(':offset', $random_row, PDO::PARAM_INT);
    $sth->execute();
    
    $sth->setFetchMode(PDO::FETCH_CLASS, 'Campaign');
    
    return $sth->fetch();
  }
  
}

?>