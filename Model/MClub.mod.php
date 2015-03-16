<?php
class MClub {
    private $sql;
    private $id;
    private $name;
    private $capacity;
    private $price;
    private $fee;
    private $description;
    function __construct ($id) {
        $this->sql = new MDBase();
        if (is_int($id+0))
        {
            $state = $this->sql->prepare("SELECT * FROM club WHERE id = :id;");
            $state->bindValue('id', $id, PDO::PARAM_INT);
        }
        $state->execute();
        $club = $state->fetch(PDO::FETCH_ASSOC);
        $this->id = $id;
        $this->price = $club['price'];
        $this->fee = $club['fee'];
        $this->name = $club['name'];
        $this->capacity = $club['capacity'];
        $this->description = $club['description'];
    }
    // Getters
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getFee() { return $this->fee; }
    public function getPrice() { return $this->price; }
    public function getCapacity() { return $this->capacity; }
    public function getDescription() { return $this->description; }

    // Setters
    public function setName($name)
    {
        $this->name = $name;
        $this->sql->exec('UPDATE club SET name = \''.$name.'\' WHERE id = '.$this->id.' ;');
    }
    public function setPrice($price)
    {
        $this->price = $price;
        $this->sql->exec('UPDATE club SET price = \''.$price.'\' WHERE id = '.$this->id.' ;');
    }
    public function setFee($fee)
    {
        $this->fee = $fee;
        $this->sql->exec('UPDATE club SET fee = \''.$fee.'\' WHERE id = '.$this->id.' ;');
    }
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
        $this->sql->exec('UPDATE club SET capacity = \''.$capacity.'\' WHERE id = '.$this->id.' ;');
    }
    public function setDescription($description)
    {
        $this->description = $description;
        $this->sql->exec('UPDATE club SET description = \''.$description.'\' WHERE id = '.$this->id.' ;');
    }
}