<?php
namespace App\Core\DatabaseConnection;

interface selectConnection {
    public function select(string $sql, array $data = []):array;
    public function selectOne(string $sql, array $data = []):array;
}

interface insertConnection {
    public function insert(string $sql, array $data = [], bool $strict = false):bool;
    public function insertMany(string $sql, array $data = [], bool $strict = false):bool;
}

interface updateConnection {
    public function update(string $sql, array $data = [], bool $strict = false):bool;
    public function updateMany(string $sql, array $data = []):bool;

}

interface deleteConnection {
    public function delete(string $sql, array $data = [], bool $strict = false):bool;
    public function deleteMany(string $sql, array $data = []):bool;
}

interface ConnectionInteface extends 
    selectConnection,
    insertconnection,
    updateConnection,
    deleteconnection
{
    
}