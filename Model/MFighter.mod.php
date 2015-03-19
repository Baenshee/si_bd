<?php
class MFighter {
    private $sql;
    private $id;
    private $race;
    private $resilience;
    private $vitality;
    private $jumpingHeight;
    private $speed;
    private $strength;
    private $intellect;
    private $description;
    private $price;
    function __construct ($id) {
        $this->sql = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
        if (is_int($id+0))
        {
            $state = $this->sql->prepare("SELECT * FROM fighter WHERE id = :id;");
            $state->bindValue('id', $id, PDO::PARAM_INT);
        }
        $state->execute();
        $fighter = $state->fetch(PDO::FETCH_ASSOC);
        $this->id = $id;
        $this->race = $fighter['id_race'];
        $this->resilience = $fighter['resilience'];
        $this->vitality = $fighter['vitality'];
        $this->jumpingHeight = $fighter['jumpingHeight'];
        $this->speed = $fighter['speed'];
        $this->strength = $fighter['strength'];
        $this->intellect = $fighter['intellect'];
        $this->description = $fighter['description'];
        $this->price = $fighter['price'];
    }
    // Getters
    public function getId() { return $this->id; }
    public function getRace() { return $this->race; }
    public function getResilience() { return $this->resilience; }
    public function getPrice() { return $this->price; }
    public function getVitality() { return $this->vitality; }
    public function getJumpingheight() { return $this->jumpingHeight; }
    public function getSpeed() { return $this->speed; }
    public function getStrength() { return $this->strength; }
    public function getIntellect() { return $this->intellect; }
    public function getDescription() { return $this->description; }

    // Setters
    public function setRace($race)
    {
        $this->race = $race;
        $this->sql->exec('UPDATE fighter SET race = \''.$race.'\' WHERE id = '.$this->id.' ;');
    }
    public function setResilience($resilience)
    {
        $this->resilience = $resilience;
        $this->sql->exec('UPDATE fighter SET resilience = \''.$resilience.'\' WHERE id = '.$this->id.' ;');
    }
    public function setPrice($price)
    {
        $this->price = $price;
        $this->sql->exec('UPDATE fighter SET price = \''.$price.'\' WHERE id = '.$this->id.' ;');
    }
    public function setVitality($vitality)
    {
        $this->vitality = $vitality;
        $this->sql->exec('UPDATE fighter SET vitality = \''.$vitality.'\' WHERE id = '.$this->id.' ;');
    }
    public function setJumpingheight($jumpingHeight)
    {
        $this->jumpingHeight = $jumpingHeight;
        $this->sql->exec('UPDATE fighter SET jumpingHeight = \''.$jumpingHeight.'\' WHERE id = '.$this->id.' ;');
    }
    public function setSpeed($speed)
    {
        $this->speed = $speed;
        $this->sql->exec('UPDATE fighter SET speed = \''.$speed.'\' WHERE id = '.$this->id.' ;');
    }
    public function setStrength($strength)
    {
        $this->strength = $strength;
        $this->sql->exec('UPDATE fighter SET strength = \''.$strength.'\' WHERE id = '.$this->id.' ;');
    }
    public function setDescription($description)
    {
        $this->description = $description;
        $this->sql->exec('UPDATE fighter SET description = \''.$description.'\' WHERE id = '.$this->id.' ;');
    }
    public function setIntellect($intellect)
    {
        $this->intellect = $intellect;
        $this->sql->exec('UPDATE fighter SET intellect = \''.$intellect.'\' WHERE id = '.$this->id.' ;');
    }
}
