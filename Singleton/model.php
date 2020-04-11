<?php

require_once "database.php";

class Model
{

    public function __construct($db, $table)
    {
        $this->con = DB::getConnect();
        $this->db = $db;
        $this->table = $table;
        $this->fields = [];
        $this->allFields = '';
        $this->_describe();
    }

    private function _describe()
    {
        $query = "
   SELECT `COLUMN_NAME` 
   FROM `INFORMATION_SCHEMA`.`COLUMNS` 
   WHERE `TABLE_SCHEMA`='$this->db' 
      AND `TABLE_NAME`='$this->table';
  ";
        foreach ($this->con->query($query, PDO::FETCH_ASSOC) as $row) {
            $this->fields[] = $row['COLUMN_NAME'];
        }
        $this->allFileds = implode(', ', $this->fields);
    }

    public function getAll()
    {
        $allFields = implode(', ', $this->fields);
        $query = "SELECT $allFields FROM $this->table ";
        foreach ($this->con->query($query, PDO::FETCH_ASSOC) as $row) {
            print_r(implode(", ", $row));
            echo "<br>";
        }
    }

    public function getAuthor($author)
    {
        if (!empty($author) && is_string($author)) {
            $query = "SELECT * FROM $this->table WHERE `author_name` LIKE '%$author%'";
            foreach ($this->con->query($query, PDO::FETCH_ASSOC) as $row) {
                print_r(implode(", ", $row));
                echo "<br>";
            }
        } else {
            return (print 'Такой информации не существует в базе');
        }
    }

    public function getGenre($genre)
    {
        if (!empty($genre) && is_string($genre)) {
            $query = "SELECT * FROM $this->table WHERE `genre` LIKE '%$genre%'";
            foreach ($this->con->query($query, PDO::FETCH_ASSOC) as $row) {
                print_r(implode(", ", $row));
                echo "<br>";
            }
        } else {
            return (print 'Неверно введены данные!');
        }
    }

    public function alterDrop($column)
    {
        $query = "ALTER TABLE $this->table drop $column";
        $this->con->query($query);
        return true;
    }

    public function alterAdd($column)
    {
        $query = "ALTER TABLE $this->table ADD COLUMN $column";
        $this->con->query($query);
        return true;
    }

    public function rename($oldField, $new)
    {
        $oldField_available = [$this->_describe()];
        if (is_string($oldField) && is_string($new) && in_array($oldField, $oldField_available)) {
            $query = "ALTER TABLE $this->table RENAME COLUMN $oldField_available TO $new";
            $this->con->query($query);
            return true;
        } else {
            return false;
        }
    }


    public function update($whatField, $values, $numId)
    {
        $field_available = [$this->_describe()];
        if (is_string($whatField) && in_array($whatField, $field_available)) {
            $query = "UPDATE $this->table SET $whatField = '$values' WHERE `id` = '$numId'";
            $this->con->query($query);
            return true;
        } else {
            return false;
        }
    }


    public function setInfo($name, $author, $genre)
    {
        $query = "INSERT INTO $this->table SET `name_book` = $name, `author_name` = $author, `genre` = $genre";
        $affectedRows = $this->con->exec($query);
        echo $affectedRows;
    }


}

$model = new Model("books", "books");

$model->getAuthor('Роулинг');
echo "<br>";
$model->getGenre("фэнтези");
echo "<br>";
$model->getAll();

?>