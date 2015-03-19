<?php
class MFacility {
    private $sql;
    private $id;
    private $name;
    private $itemCapacity;
    private $fighterCapacity;
    private $level;
    private $price;
    private $description;
    function __construct ($id) {
        $this->sql = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
        if (is_int($id+0))
        {
            $state = $this->sql->prepare("SELECT * FROM facility WHERE id = :id;");
            $state->bindValue('id', $id, PDO::PARAM_INT);
        }
        $state->execute();
        $facility = $state->fetch(PDO::FETCH_ASSOC);
        $this->id = $id;
        $this->level = $facility['level'];
        $this->price = $facility['price'];
        $this->itemCapacity = $facility['itemCapacity'];
        $this->name = $facility['name'];
        $this->fighterCapacity = $facility['fighterCapacity'];
        $this->description = $facility['description'];
    }
    // Getters
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getLevel() { return $this->level; }
    public function getPrice() { return $this->price; }
    public function getItemcapacity() { return $this->itemCapacity; }
    public function getFightercapacity() { return $this->fighterCapacity; }
    public function getDescription() { return $this->description; }

    // Setters
    public function setName($name)
    {
        $this->name = $name;
        $this->sql->exec('UPDATE facility SET name = \''.$name.'\' WHERE id = '.$this->id.' ;');
    }
    public function setLevel($level)
    {
        $this->level = $level;
        $this->sql->exec('UPDATE facility SET level = \''.$level.'\' WHERE id = '.$this->id.' ;');
    }
    public function setPrice($price)
    {
        $this->price = $price;
        $this->sql->exec('UPDATE facility SET price = \''.$price.'\' WHERE id = '.$this->id.' ;');
    }
    public function setItemcapacity($itemCapacity)
    {
        $this->itemCapacity = $itemCapacity;
        $this->sql->exec('UPDATE facility SET itemCapacity = \''.$itemCapacity.'\' WHERE id = '.$this->id.' ;');
    }
    public function setFightercapacity($fighterCapacity)
    {
        $this->fighterCapacity = $fighterCapacity;
        $this->sql->exec('UPDATE facility SET fighterCapacity = \''.$fighterCapacity.'\' WHERE id = '.$this->id.' ;');
    }
    public function setDescription($description)
    {
        $this->description = $description;
        $this->sql->exec('UPDATE facility SET description = \''.$description.'\' WHERE id = '.$this->id.' ;');
    }
}
