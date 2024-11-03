<?php 

class Lien {
    public int $id = 0;
    public string $nom = "";
    public string $couleur = "";
    public string $date_debut = "";
    public string $date_crea = "";

    /**
     * Sélectionne un objet de cette classe en fonction de son id
     *
     * @param integer $id
     * @return Lien|null
     */
    public static function selectById(int $id): ?Lien {
        $sql = "SELECT * FROM lien WHERE id = ?";
        $params = [$id];
        $result = query($sql, $params, true, "Lien");
        if(count($result) == 0)
            return null;
        return $result[0];
    }

    /**
     * Récupère les souvenirs de ce lien
     *
     * @return array<Souvenir>
     */
    public function selectSouvenirs(): array {
        $sql = "SELECT * FROM souvenir WHERE lien_id = ?";
        $params = [$this->id];
        $souvenirs = query($sql, $params, true, "Souvenir");
        return $souvenirs;
    }

    /**
     * Ajoute un objet de cette classe en base de données
     *
     * @return void
     */
    public function insert(): void {

    }

    /**
     * Met à jour un objet de cette classe en base de données
     *
     * @return void
     */
    public function update(): void {

    }
}