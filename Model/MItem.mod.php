<?php
class MItem {
    private $sql;
    private $id;
    private $level;
    private $price;
    private $potency;
    private $name;
    private $id_effect;
    private $id_facility;
    private $id_itemFamily;
    private $description;
    function __construct ($id) {
        $this->sql = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
        if (is_int($id+0))
        {
            $state = $this->sql->prepare("SELECT * FROM items WHERE id = :id;");
            $state->bindValue('id', $id, PDO::PARAM_INT);
        }
        $state->execute();
        $item = $state->fetch(PDO::FETCH_ASSOC);
        $this->id = $id;
        $this->level = $item['level'];
        $this->price = $item['price'];
        $this->potency = $item['potency'];
        $this->name = $item['name'];
        $this->id_effect = $item['id_effect'];
        $this->id_facility = $item['id_facility'];
        $this->id_itemfamily = $item['id_itemFamily'];
        $this->description = $item['description'];
    }
    // Getters
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getLevel() { return $this->level; }
    public function getPrice() { return $this->price; }
    public function getPotency() { return $this->potency; }
    public function getId_effect() { return $this->id_effect; }
    public function getId_facility() { return $this->id_facility; }
    public function getId_itemfamily() { return $this->id_itemFamily; }
    public function getDescription() { return $this->description; }

    // Setters
    public function setName($name)
    {
        $this->name = $name;
        $this->sql->exec('UPDATE items SET name = \''.$name.'\' WHERE id = '.$this->id.' ;');
    }
    public function setLevel($level)
    {
        $this->level = $level;
        $this->sql->exec('UPDATE items SET level = \''.$level.'\' WHERE id = '.$this->id.' ;');
    }
    public function setPrice($price)
    {
        $this->price = $price;
        $this->sql->exec('UPDATE items SET price = \''.$price.'\' WHERE id = '.$this->id.' ;');
    }
    public function setPotency($potency)
    {
        $this->potency = $potency;
        $this->sql->exec('UPDATE items SET potency = \''.$potency.'\' WHERE id = '.$this->id.' ;');
    }
    public function setId_effect($id_effect)
    {
        $this->id_effect = $id_effect;
        $this->sql->exec('UPDATE items SET id_effect = \''.$id_effect.'\' WHERE id = '.$this->id.' ;');
    }
    public function setId_facility($id_facility)
    {
        $this->id_facility = $id_facility;
        $this->sql->exec('UPDATE items SET id_facility = \''.$id_facility.'\' WHERE id = '.$this->id.' ;');
    }
    public function setId_itemFamily($id_itemFamily)
    {
        $this->id_itemFamily = $id_itemFamily;
        $this->sql->exec('UPDATE items SET id_itemFamily = \''.$id_itemFamily.'\' WHERE id = '.$this->id.' ;');
    }
    public function setDescription($description)
    {
        $this->description = $description;
        $this->sql->exec('UPDATE items SET description = \''.$description.'\' WHERE id = '.$this->id.' ;');
    }
}
