<?php

require_once("Logement.php");
    class User
    {
        public $ID;
        private $Nom;
        public $Prenom;
        private $adresseMail;
        private $ListeLogement;

        /**
         * @return mixed
         */

        public function getPrenom()
        {
            return $this->Prenom;
        }


        public function getAdresseMail()
        {
            return $this->adresseMail;
        }


        public function setID($ID): void
        {
            $this->ID = $ID;
        }

        public function getID()
        {
            return $this->ID;
        }


        public function setAdresseMail($adresseMail): void
        {
            $this->adresseMail = $adresseMail;
        }


        public function getListeLogement()
        {
            return $this->ListeLogement;
        }


        public function setNom($Nom): void
        {
            $this->Nom = $Nom;
        }

        public function ListeLogement()
        {
            $bdd = new PDO('mysql:host=localhost;dbname=promethec;charset=utf8', 'root', '');
            $reponse = $bdd->query('SELECT ID_logement FROM occupationlogement WHERE ID_utilisateur = ' .$this->ID);
            while ($donnees = $reponse->fetch()) {
                $Logement = new Logement();
                $Logement->setIDLogement(($donnees['ID_logement']));
                $this->ListeLogement[] = $Logement;

            }
        }

        public function rechercheID()
        {

            $bdd = new PDO('mysql:host=localhost;dbname=promethec;charset=utf8', 'root', '');

            $reponse = $bdd->query('SELECT ID, nom, prenom FROM utilisateurs WHERE email ="'.$this->getAdresseMail().'" '  );
            while ($donnees = $reponse->fetch()) {
                $this->setID($donnees['ID']);
                $this->Nom = $donnees['nom'];
                $this->Prenom = $donnees['prenom'];



            }


        }
        public function genererInfo(){
            $this->rechercheID();

            $this->ListeLogement();
            $Liste = $this->getListeLogement();

            foreach ($Liste as $Logement){
                $Logement->listePiece();
            }


            foreach ($Liste as $Logement){
                $ListePiece = $Logement->getListePiece();
                $k = 0;
                foreach ($ListePiece as $Piece) {
                    $Piece->listeCapteur();




                }

            }

        }
    }










