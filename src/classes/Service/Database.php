<?php

namespace Service;

use MongoDB\Driver\Exception\ConnectionException;

class Database {

    /** @var string  */
    protected $host;

    /** @var string  */
    protected $dbname;

    /** @var string  */
    protected $username;

    /** @var string  */
    protected $password;


    public function __construct()
    {
        $this->host = getenv('DB_HOST') . ':' . getenv('DB_PORT');
        $this->dbname = getenv('DB_NAME');
        $this->username = getenv('DB_USERNAME');
        $this->password = getenv('DB_PASSWORD');
    }


    /**
     * @param $table
     * @param $data
     * @return array
     */
    public function selectRow($table, $data)
    {
        $conn = \mysqli_connect($this->host, $this->username, $this->password, $this->dbname);

        if ($conn->connect_error) {
            throw new ConnectionException('Connection failed: ' . $conn->connect_error);
        }

        $sql = 'SELECT * FROM '. $table;
        if (!empty($data)) {
            $sql .= ' WHERE ';
            foreach ($data as $column => $value) {
                if ($column != array_keys($data)[0]) {
                    $sql .= ' AND ';
                }

                $sql .= $column . '="' . $value . '"';
            }
        }
        $sql .= ';';

        $result = $conn->query($sql);

        $row = $result->fetch_assoc();

        return $row;
    }

    /**
     * @param $table
     * @param $data
     * @return mixed
     */
    public function create($table, array $data)
    {
        $conn = \mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            throw new ConnectionException('Connection failed: ' . $conn->connect_error);
        }

        $sql = 'INSERT INTO '. $table;
        if (!empty($data)) {
            $sql .= ' (' . implode(', ', array_keys($data));
            $sql .= ') VALUES (';
            foreach ($data as $column => $value) {
                if ($column != array_keys($data)[0]) {
                    $sql .= ', ';
                }

                $sql .= '"' . $value . '"';
            }
            $sql .= ');';
        }

        return $conn->query($sql);
    }

    /**
     * @param $table
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($table, $id, $data)
    {
        $conn = \mysqli_connect($this->host, $this->username, $this->password, $this->dbname);

        if ($conn->connect_error) {
            throw new ConnectionException('Connection failed: ' . $conn->connect_error);
        }

        $sql = 'UPDATE '. $table;
        if (!empty($data)) {
            $sql .= ' SET ';
            foreach ($data as $column => $value) {
                if ($column != array_keys($data)[0]) {
                    $sql .= ', ';
                }

                $sql .= $column . '="' . $value . '"';
            }
            $sql .= ' WHERE id = ' . $id;
        }
        $sql .= ';';

        return $conn->query($sql);
    }
}