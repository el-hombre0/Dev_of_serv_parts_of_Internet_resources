<?php

class product
{
    private $conn;
    private $table_name = "products";

    public $id;
    public $name_of_product;
    public $description;
    public $price;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read(): array
    {
        $result = $this->conn->query(/** @lang MySQL */ "SELECT * FROM $this->table_name");
        $arr = array();
        foreach ($result as $row) {
            $arr[] = $row;
        }
        return $arr;

    }

    public function create(): bool
    {
        $this->clear_fields();
        $query = /** @lang MySQL */
            "INSERT INTO $this->table_name (name_of_product, description, price) VALUES (\"$this->name_of_product\", \"$this->description\", \"$this->price\")";
        if ($this->conn->query($query)) {
            return true;
        }
        return false;
    }

    public function readOne()
    {
        $query = /** @lang MySQL */
            "SELECT * FROM $this->table_name WHERE $this->table_name.id = $this->id";
        $result = $this->conn->query($query);
        foreach ($result as $row) {
            $this->name_of_product = $row["name"];
            $this->description = $row["description"];
            $this->price = $row["price"];
        }
    }

    public function update(): bool
    {
        $this->clear_fields();
        $query = /** @lang MySQL */
            "UPDATE $this->table_name SET name=\"$this->name_of_product\", description=\"$this->description\", price=\"$this->price\" WHERE id=$this->id";
        if ($this->conn->query($query)) {
            return true;
        }
        return false;
    }

    public function delete(): bool
    {
        $this->id = htmlspecialchars(strip_tags($this->id));
        $query = /** @lang MySQL */
            "DELETE FROM $this->table_name WHERE id=$this->id";
        if ($this->conn->query($query)) {
            return true;
        }
        return false;
    }

    /**
     * @return void
     */
    public function clear_fields(): void
    {
        $this->name_of_product = htmlspecialchars(strip_tags($this->name_of_product));
        if ($this->description != null)
            $this->description = htmlspecialchars(strip_tags($this->description));
        $this->price = htmlspecialchars(strip_tags($this->price));
    }
}