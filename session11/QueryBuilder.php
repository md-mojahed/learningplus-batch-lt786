<?php

require 'Env.php';
/**
 * Query Builder Class
 */
class QueryBuilder
{
    private $conn;

    public function __construct()
    {
        try {
            [$host, $dbname, $dbuser, $dbpassword] = env(
                ['host', 'dbname', 'dbuser', 'dbpassword']
            );
            $this->conn = new PDO("mysql:host={$host};dbname={$dbname}", $dbuser, $dbpassword);
        } catch (Exception $e) {
            die("Error : {$e->getMessage()} at {$e->getLine()}");
        }
    }

    public function create(string $table, array $columns)
    {
        try {
            $sql = "INSERT INTO {$table}(".join(',', array_keys($columns)).")
                VALUES('".join("','", array_values($columns))."');";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return "Error : {$e->getMessage()} at {$e->getLine()}";
        } catch (Exception $e) {
            return "Error : {$e->getMessage()} at {$e->getLine()}";
        }
    }

    public function insert(string $table, array $columnsArr)
    {
        try {
            $values = [];

            foreach ($columnsArr as $columns) {
                $row = "('";
                $row .= join("','", array_values($columns));
                $row .= "')";
                $values[] = $row;
            }

            $sql = "INSERT INTO {$table}(".join(',', array_keys($columnsArr[0])).")
                VALUES ".join(",", $values).";";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return "Error : {$e->getMessage()} at {$e->getLine()}";
        } catch (Exception $e) {
            return "Error : {$e->getMessage()} at {$e->getLine()}";
        }
    }
}
