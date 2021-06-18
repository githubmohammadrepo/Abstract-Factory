<?php
namespace App\Core\DatabaseConnection;
abstract class PdoConnection implements ConnectionInteface
{
  static protected $pdo = null;

  private function __construct()
  {
  }

  static public function PdoConnect()
  {
    self::createPdoInit();
    return self::$pdo;
  }
  /**
   * create pdo init
   *
   * @return boolean
   */
  protected static function createPdoInit(): bool
  {

    try {

      if (self::$pdo == null) {
        $host = 'localhost';
        $db   = 'designPattern';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
          \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
          \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
          \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        self::$pdo = new \PDO($dsn, $user, $pass, $options);
        return true;
      } else {
        return true;
      }
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
      return false;
    }
  }


  /**
   * insert by pdo connection
   *
   * @param string $sql
   * @param array $data
   * @param boolean $strict
   * @return void
   */
  public function insert(string $sql, array $data = [], bool $strict = false):bool
  {
    $stmt = $this->pdo->prepare($sql);
    $status_insert = $stmt->execute($data);
    if ($status_insert == true) {
      if ($strict == true) {
        $count = $this->conn->rowCount();
        if ($count) {
          return true;
        } else {
          return false;
        }
      }
    }
    return $status_insert;
  }

  public function insertMany(string $sql, array $data = [], bool $strict = false):bool{
    return true;
  }

  /**
   * select query by pdo connection
   *
   * @param string $sql
   * @param array $data
   * @return void
   */
  public function select(string $sql, array $data = []):array
  {
    $result = array();
    $stmt = self::$pdo->prepare($sql);
    $status_select = $stmt->execute($data);
    if ($status_select == true) {
      $result = $stmt->fetchAll();
    }
    return $result;
  }

  public function selectOne(string $sql, array $data = []):array{
    return [];
  }

  /**
   * update operation by pdo connection
   *
   * @param string $sql
   * @param array $data
   * @param boolean $strict
   * @return void
   */
  public function update(string $sql, array $data = [], bool $strict = false):bool
  {
    $stmt = $this->pdo->prepare($sql);
    $status_update = $stmt->execute($data);
    if ($status_update == true) {
      $count = $stmt->rowCount();
      if ($strict == true) {
        if ($count) {
          return true;
        } else {
          return false;
        }
      }
    }
    return $status_update;
  }

  public function updateMany(string $sql, array $data = []):bool{
    return true;
  }


  public function delete(string $sql, array $data = [], bool $strict = false):bool
  {
    $stmt = $this->pdo->prepare($sql);
    $status_update = $stmt->execute($data);
    if ($status_update == true) {
      $count = $this->pdo->rowCount();
      if ($strict == true) {
        if ($count) {
          return true;
        } else {
          return false;
        }
      }
    }
    return $status_update;
  }

  public function deleteMany(string $sql, array $data = []):bool{
    return true;
  }
}

