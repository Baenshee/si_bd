<?php
class MNews {
    private $sql;
    private $id;
    private $headline;
    private $content;
    private $id_competition;
    function __construct ($id) {
        $this->sql = new MDBase($_SESSION['USER'],$_SESSION['PASS']);
        if (is_int($id+0))
        {
            $state = $this->sql->prepare("SELECT * FROM news WHERE id = :id;");
            $state->bindValue('id', $id, PDO::PARAM_INT);
        }
        $state->execute();
        $news = $state->fetch(PDO::FETCH_ASSOC);
        $this->id = $id;
        $this->headline = $news['headline'];
        $this->content = $news['content'];
        $this->id_competition = $news['id_competition'];
    }
    // Getters
    public function getId() { return $this->id; }
    public function getHeadline() { return $this->headline; }
    public function getContent() { return $this->content; }
    public function getId_competition() { return $this->id_competition; }

    // Setters
    public function setHeadline($headline)
    {
        $this->headline = $headline;
        $this->sql->exec('UPDATE news SET headline = \''.$headline.'\' WHERE id = '.$this->id.' ;');
    }
    public function setContent($content)
    {
        $this->content = $content;
        $this->sql->exec('UPDATE news SET content = \''.$content.'\' WHERE id = '.$this->id.' ;');
    }
    public function setId_competition($id_competition)
    {
        $this->id_competition = $id_competition;
        $this->sql->exec('UPDATE news SET id_competition = \''.$id_competition.'\' WHERE id = '.$this->id.' ;');
    }
}
