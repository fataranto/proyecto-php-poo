<?php 


class Usuario{
  private $nombre;
  private $apellidos;
  private $email;
  private $password;
  private $rol;
  private $imagen;

  //conexión a bbdd
  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }
  

  /**
   * Get the value of nombre
   */
  public function getNombre()
  {
    return $this->nombre;
  }

  /**
   * Set the value of nombre
   */
  public function setNombre($nombre): self
  {
    $this->nombre = $this->db->real_escape_string($nombre);

    return $this;
  }

  /**
   * Get the value of apellidos
   */
  public function getApellidos()
  {
    return $this->apellidos;
  }

  /**
   * Set the value of apellidos
   */
  public function setApellidos($apellidos): self
  {
    $this->apellidos = $this->db->real_escape_string($apellidos);

    return $this;
  }

  /**
   * Get the value of email
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   */
  public function setEmail($email): self
  {
    $this->email = $this->db->real_escape_string($email);

    return $this;
  }

  /**
   * Get the value of password
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password
   */
  public function setPassword($password): self
  {
    $this->password = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);

    return $this;
  }

  /**
   * Get the value of rol
   */
  public function getRol()
  {
    return $this->rol;
  }

  /**
   * Set the value of rol
   */
  public function setRol($rol): self
  {
    $this->rol = $rol;

    return $this;
  }

  /**
   * Get the value of imagen
   */
  public function getImagen()
  {
    return $this->imagen;
  }

  /**
   * Set the value of imagen
   */
  public function setImagen($imagen): self
  {
    $this->imagen = $imagen;

    return $this;
  }

  public function save(){
    $sql = "INSERT INTO usuarios VALUES(null, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null);";
    $save = $this->db->query($sql);

    $result = false;

    if($save){
      $result = true;
    }
    return $result;
  }
}