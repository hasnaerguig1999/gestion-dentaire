<?php
class randez
{
  // DB Stuff
  private $conn;
  private $table = 'randezvous';

  // Properties
  public $clientId;
  public $CRN;
  public $RDV;
  public $reff;
  public $id;


  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Get categories
  public function read()
  {
    // Create query
    $query = "SELECT * FROM randezvous WHERE reff = :reff";

    // Prepare statement
    $stmt = $this->conn->prepare($query);


    // Execute query
    $stmt->execute(["reff"=>$this->reff]);

    return $stmt;
  }

  // Get Single Category
  public function read_single()
  {
    // Create query
    $query = 'SELECT
          id,
          name
        FROM
          ' . $this->table . '
      WHERE id = ?
      LIMIT 0,1';

    //Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // set properties
    $this->id = $row['id'];
    $this->name = $row['name'];
  }


  public function checkRDV()
  {
    // Create query
    $query = "SELECT CRN FROM randezvous WHERE RDV =  :RDV";

    //Prepare statement
    $stmt = $this->conn->prepare($query);

    // // Bind ID
    // $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute(["RDV"=>$this->RDV]);
    
    return $stmt;
  }

  // Create Category
  public function create()
  {
    // Create Query
    $query = 'INSERT INTO ' .
      $this->table . '
    SET
      CRN = :CRN,
      RDV = :RDV ,
      reff = :reff';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->CRN = htmlspecialchars(strip_tags($this->CRN));
    $this->RDV = htmlspecialchars(strip_tags($this->RDV));
    $this->reff = htmlspecialchars(strip_tags($this->reff));
    // Bind data
    $stmt->bindParam(':CRN', $this->CRN);
    $stmt->bindParam(':RDV', $this->RDV);
    $stmt->bindParam(':reff', $this->reff);
    // Execute query
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }

    // Print error if something goes wrong


    // return false;
  }

  // Update Category
  public function update()
  {
    // Create Query
    $query = 'UPDATE ' .
      $this->table . '
    SET
    CRN = :CRN,
    RDV = :RDV WHERE  id= :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->CRN = htmlspecialchars(strip_tags($this->CRN));
    $this->RDV = htmlspecialchars(strip_tags($this->RDV));
    $this->id = htmlspecialchars(strip_tags($this->id));
    // Bind data
    $stmt->bindParam(':CRN', $this->CRN);
    $stmt->bindParam(':RDV', $this->RDV);
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong

    // return false;
  }

  // Delete Category
  public function delete()
  {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind Data
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong


    // return false;
  }
}
