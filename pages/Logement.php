<?php
require_once("Piece.php");
    class Logement {
        private $ID_Logement;
        private $ListePiece;
        private $adresse;


        public function getIDLogement()
        {
            return $this->ID_Logement;
        }
        public function getListePiece(): array
        {
            return $this->ListePiece;
        }
        public function setIDLogement($ID_Logement): void
        {
            $this->ID_Logement = $ID_Logement;
        }

        public function listePiece(){
            $bdd = new PDO('mysql:host=localhost;dbname=promethec;charset=utf8','root', '');
            $reponse = $bdd->query('SELECT ID, nom FROM pièces WHERE ID_logement = '.$this->ID_Logement);
            while ($donnees = $reponse->fetch()){
                $Piece = new Piece();
                $Piece->setIDLogement($this->ID_Logement);$Piece->setIDPiece($donnees['ID']);$Piece->setNom($donnees['nom']);
                $this->ListePiece[] =$Piece;

                }



            }










    }
