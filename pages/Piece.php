<?php
    class Piece
    {
        private $ID_piece;
        private $ID_logement;
        public $Nom;
        private $ListeCapteur;


        public function getNom()
        {
            return $this->Nom;
        }

        public function setIDLogement($ID_logement): void
        {
            $this->ID_logement = $ID_logement;
        }


        public function setIDPiece($ID_piece): void
        {
            $this->ID_piece = $ID_piece;
        }

        public function setNom($Nom): void
        {
            $this->Nom = $Nom;
        }

        public function listeCapteur(){
            $bdd = new PDO('mysql:host=localhost;dbname=promethec;charset=utf8', 'root', '');
            $reponse = $bdd->query('SELECT numéroDeSérie FROM positionproduit WHERE ID_pièce = ' .$this->ID_piece);

        }
    }






