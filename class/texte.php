<?php 

class Texte {
    public int $id;
    public int $souvenir_id;
    public int $utilisateur_id;
    public ?string $utilisateur_nom;
    public string $contenu;
    public string $date_crea;

    public function insert() {
        $sql = 'INSERT INTO texte (souvenir_id, utilisateur_id, contenu) VALUES (?, ?, ?)';
        $params = [$this->souvenir_id, $this->utilisateur_id, $this->contenu];
        query($sql, $params, false);
    }

    public function update() {
        $sql = 'UPDATE texte SET contenu = ? WHERE id = ?';
        $params = [$this->contenu, $this->id];
        query($sql, $params, false);
    }
}