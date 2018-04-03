<?php

require_once("Logement.php");
    class User
    {
        public $ID;
        private $Nom;
        public $Prenom;
        public $adresseMail;
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
            $reponse = $bdd->query('SELECT ID, nom, prénom FROM utilisateurs WHERE mail = " ' .$this->adresseMail. '" ');
            while ($donnees = $reponse->fetch()) {
                $this->ID = $donnees['ID'];
                $this->Nom = $donnees['nom'];
                $this->Prenom = $donnees['prénom'];



            }


        }
    }










