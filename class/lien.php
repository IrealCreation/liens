<?php 

class Lien {
    public int $id;

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
}