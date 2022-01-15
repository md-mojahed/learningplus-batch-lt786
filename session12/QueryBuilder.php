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

    public function delete(string $table, array $whereClause)
    {
        try {
            $sql = "DELETE FROM {$table} WHERE ".(count($whereClause) > 0 ? '' : 1);

            for ($i = 0; $i < count(array_keys($whereClause)); $i++) {
                $column = array_keys($whereClause)[$i];
                $clause = $whereClause[$column];

                if ($i == 0) {
                    $sql .= "{$column}='{$clause}'";
                } else {
                    $sql .= " AND {$column}='{$clause}'";
                }
            }

            $query = $this->conn->prepare($sql);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return "Error : {$e->getMessage()} at {$e->getLine()}";
        } catch (Exception $e) {
            return "Error : {$e->getMessage()} at {$e->getLine()}";
        }
    }

    public function update(string $table, array $setClause, array $whereClause)
    {
        try {
            if (count($setClause) < 1) {
                return true;
            }

            $sql = "UPDATE {$table} SET ";

            for ($i = 0; $i < count(array_keys($setClause)); $i++) {
                $column = array_keys($setClause)[$i];
                $clause = $setClause[$column];

                if ($i == count(array_keys($setClause)) - 1) {
                    $sql .= "{$column}='{$clause}'";
                } else {
                    $sql .= "{$column}='{$clause}',";
                }
            }

            $sql .= " WHERE ".(count($whereClause) > 0 ? '' : 1);

            for ($i = 0; $i < count(array_keys($whereClause)); $i++) {
                $column = array_keys($whereClause)[$i];
                $clause = $whereClause[$column];

                if ($i == 0) {
                    $sql .= "{$column}='{$clause}'";
                } else {
                    $sql .= " AND {$column}='{$clause}'";
                }
            }

            $query = $this->conn->prepare($sql);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return "Error : {$e->getMessage()} at {$e->getLine()}";
        } catch (Exception $e) {
            return "Error : {$e->getMessage()} at {$e->getLine()}";
        }
    }

    public function select(string $table, array $columns, array $whereClause, $firstRow = true)
    {
        try {
            $sql = "SELECT  ".(count($columns) > 0 ? '' : '*');

            if (count($columns) > 0) {
                $sql .= join(',', $columns);
            }

            $sql .= " FROM {$table}";

            $sql .= " WHERE ".(count($whereClause) > 0 ? '' : 1);

            for ($i = 0; $i < count(array_keys($whereClause)); $i++) {
                $column = array_keys($whereClause)[$i];
                $clause = $whereClause[$column];

                if ($i == 0) {
                    $sql .= "{$column}='{$clause}'";
                } else {
                    $sql .= " AND {$column}='{$clause}'";
                }
            }

            $query = $this->conn->prepare($sql);
            $query->execute();
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);

            if (count($rows) < 1) {
                return [];
            }

            if ($firstRow) {
                return $rows[0];
            }

            return $rows;
        } catch (PDOException $e) {
            return "Error : {$e->getMessage()} at {$e->getLine()}";
        } catch (Exception $e) {
            return "Error : {$e->getMessage()} at {$e->getLine()}";
        }
    }
}
