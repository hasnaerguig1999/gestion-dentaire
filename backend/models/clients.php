<?php
class clients
{
  // DB stuff
  private $conn;
  private $table = 'clients';

  // Post Properties
  public $id;
  public $firstname;
  public $lastname;
  public $proff;
  public $age;
  public $reff;
  public $CRN;
  public $RDV;

  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  //loginAdmin

  public function loginAdmin()
    {
        $query = "SELECT * FROM admin WHERE reff =:reff";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':reff', $this->reff);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
  
  
    //loginClient

  public function loginClient()
    {
        $query = "SELECT * FROM Clients WHERE reff =:reff";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':reff', $this->reff);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

  // Get Posts
  public function read()
  {
    // Create query
    $query = 'SELECT clients.* ,randezvous.id,randezvous.CRN,randezvous.RDV
      FROM clients
      INNER JOIN randezvous
      ON randezvous.reff = clients.reff
      ORDER BY randezvous.id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  // Get Single Post
  public function read_single()
  {
    // Create query

    $query = "SELECT clients.* ,randezvous.id,randezvous.CRN,randezvous.RDV
          FROM clients
          left JOIN randezvous
          ON randezvous.clientId = clients.id WHERE randezvous.id = ? ";

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // // Bind ID
    $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->id = $row['id'];
    $this->firstname = $row['firstname'];
    $this->lastname = $row['lastname'];
    $this->proff = $row['proff'];
    $this->age = $row['age'];
    $this->reff = $row['reff'];
    $this->CRN = $row['CRN'];
    $this->RDV = $row['RDV'];
  }

  // Create Post
  public function create()
  {
    // Create query
    $query = 'INSERT INTO ' . $this->table . ' SET firstname = :firstname, lastname = :lastname, proff = :proff, age = :age, reff = :reff';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->firstname = htmlspecialchars(strip_tags($this->firstname));
    $this->lastname = htmlspecialchars(strip_tags($this->lastname));
    $this->proff = htmlspecialchars(strip_tags($this->proff));
    $this->age = htmlspecialchars(strip_tags($this->age));
    $this->reff = htmlspecialchars(strip_tags($this->reff));
    // Bind data
    $stmt->bindParam(':firstname', $this->firstname);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':proff', $this->proff);
    $stmt->bindParam(':age', $this->age);
    $stmt->bindParam(':reff', $this->reff);
    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // Update Post
  public function update()
  {
    // Create query
    $query = 'UPDATE ' . $this->table . '
          SET firstname = :firstname, lastname = :lastname, proff = :proff, age = :age, reff = :reff
                                WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->firstname = htmlspecialchars(strip_tags($this->firstname));
    $this->lastname = htmlspecialchars(strip_tags($this->lastname));
    $this->proff = htmlspecialchars(strip_tags($this->proff));
    $this->age = htmlspecialchars(strip_tags($this->age));
    $this->reff = htmlspecialchars(strip_tags($this->reff));
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':firstname', $this->firstname);
    $stmt->bindParam(':proff', $this->proff);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':age', $this->age);
    $stmt->bindParam(':reff', $this->reff);
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // Delete Post
  public function delete()
  {

    // Create query
    $query = 'DELETE FROM clients WHERE id = :id ';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }
}
