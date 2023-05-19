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
  public function setNombre($nombre)
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
  public function setApellidos($apellidos)
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
  public function setEmail($email)
  {
    $this->email = $this->db->real_escape_string($email);

    return $this;
  }

  /**
   * Get the value of password
   */
  public function getPassword()
  {
    return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    
  }

  /**
   * Set the value of password
   */
  public function setPassword($password)
  {
    $this->password = $password;

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
  public function setRol($rol)
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
  public function setImagen($imagen)
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

  public function login(){
    $result = false;
    $email = $this->email;
    $password = $this->password;

    // Comprobar si existe el usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = $this->db->query($sql);

    if($login && $login->num_rows == 1){
      $usuario = $login->fetch_object();

      // Verificar la contraseña
      $verify = password_verify($password, $usuario->password);
      
      if($verify){
        $result = $usuario;
      }
    }
    return $result;
  }
}