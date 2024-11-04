<?php 

class Souvenir {
    public int $id = 0;
    public int $lien_id;
    public string $titre = "";
    public string $date = "";
    public string $date_crea = "";

    public array $textes = [];

    /**
     * Insère l'objet dans la base de données
     *
     * @return void
     */
    public function insert() {
        $sql = 'INSERT INTO souvenir (lien_id, titre, `date`) VALUES (?, ?, ?)';
        $params = [$this->lien_id, $this->titre, $this->date];
        query($sql, $params, false);
    }

    public function update() {
        $sql = 'UPDATE souvenir SET lien_id = ?, titre = ?, `date` = ? WHERE id = ?';
        $params = [$this->lien_id, $this->titre, $this->date, $this->id];
        query($sql, $params, false);
    }

    public function delete() {
        $sql = 'DELETE FROM souvenir WHERE id = ?';
        $params = [$this->id];
        query($sql, $params, false);
    }

    public static function selectById(int $id): ?Souvenir {
        $sql = 'SELECT * FROM souvenir WHERE id = ?';
        $params = [$id];
        $result = query($sql, $params);
        return count($result) == 0 ? null : $result[0];
    }

    public function selectTextes() {
        $sql = 'SELECT *, utilisateur.nom AS utilisateur_nom FROM texte WHERE souvenir_id = ?
            INNER JOIN utilisateur ON texte.utilisateur_id = utilisateur.id';
        $params = [$this->id];
        $textes = query($sql, $params, true, 'Texte');
        $this->textes = $textes;
    }


}