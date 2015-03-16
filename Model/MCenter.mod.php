<?php
class MCenter {
    private $sql;
    private $id;
    private $name;
    private $capacity;
    private $price;
    private $description;
    function __construct ($id) {
        $this->sql = new MDBase();
        if (is_int($id+0))
        {
            $state = $this->sql->prepare("SELECT * FROM center WHERE id = :id;");
            $state->bindValue('id', $id, PDO::PARAM_INT);
        }
        $state->execute();
        $center = $state->fetch(PDO::FETCH_ASSOC);
        $this->id = $id;
        $this->price = $center['price'];
        $this->name = $center['name'];
        $this->capacity = $center['capacity'];
        $this->description = $center['description'];
    }
    // Getters
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getPrice() { return $this->price; }
    public function getCapacity() { return $this->capacity; }
    public function getDescription() { return $this->description; }

    // Setters
    public function setName($name)
    {
        $this->name = $name;
        $this->sql->exec('UPDATE center SET name = \''.$name.'\' WHERE id = '.$this->id.' ;');
    }
    public function setPrice($price)
    {
        $this->price = $price;
        $this->sql->exec('UPDATE center SET price = \''.$price.'\' WHERE id = '.$this->id.' ;');
    }
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
        $this->sql->exec('UPDATE center SET capacity = \''.$capacity.'\' WHERE id = '.$this->id.' ;');
    }
    public function setDescription($description)
    {
        $this->description = $description;
        $this->sql->exec('UPDATE center SET description = \''.$description.'\' WHERE id = '.$this->id.' ;');
    }
}