<?php
class MCompetition {
    private $sql;
    private $id;
    private $name;
    private $capacity;
    private $lethality;
    private $startingDate;
    private $endingDate;
    private $description;
    function __construct ($id) {
        $this->sql = new MDBase();
        if (is_int($id+0))
        {
            $state = $this->sql->prepare("SELECT * FROM competition WHERE id = :id;");
            $state->bindValue('id', $id, PDO::PARAM_INT);
        }
        $state->execute();
        $competition = $state->fetch(PDO::FETCH_ASSOC);
        $this->id = $id;
        $this->name = $competition['name'];
        $this->capacity = $competition['capacity'];
        $this->lethality = $competition['lethality'];
        $this->startingDate = $competition['startingDate'];
        $this->endingDate = $competition['endingDate'];
        $this->description = $competition['description'];
    }
    // Getters
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getCapacity() { return $this->capacity; }
    public function getLethality() { return $this->lethality; }
    public function getStartingdate() { return $this->startingDate; }
    public function getEndingdate() { return $this->endingDate; }
    public function getDescription() { return $this->description; }

    // Setters
    public function setName($name)
    {
        $this->name = $name;
        $this->sql->exec('UPDATE competition SET name = \''.$name.'\' WHERE id = '.$this->id.' ;');
    }
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
        $this->sql->exec('UPDATE competition SET capacity = \''.$capacity.'\' WHERE id = '.$this->id.' ;');
    }
    public function setLethality($lethality)
    {
        $this->lethality = $lethality;
        $this->sql->exec('UPDATE competition SET lethality = \''.$lethality.'\' WHERE id = '.$this->id.' ;');
    }
    public function setStartingdate($startingDate)
    {
        $this->startingDate = $startingDate;
        $this->sql->exec('UPDATE competition SET startingDate = \''.$startingDate.'\' WHERE id = '.$this->id.' ;');
    }
    public function setEndingdate($endingDate)
    {
        $this->endingDate = $endingDate;
        $this->sql->exec('UPDATE competition SET endingDate = \''.$endingDate.'\' WHERE id = '.$this->id.' ;');
    }
    public function setDescription($description)
    {
        $this->description = $description;
        $this->sql->exec('UPDATE competition SET description = \''.$description.'\' WHERE id = '.$this->id.' ;');
    }
}