<?php

require_once("Actionneur.php");
require_once("Produit.php");
require_once("Capteur.php");
class Piece
    {
        private $ID_piece;
        private $ID_logement;
        private $Nom;
        private $ListeCapteur;

    /**
     * @return mixed
     */
    public function getIDPiece()
    {
        return $this->ID_piece;
    }

    /**
     * @param mixed $ListeCapteur
     */
    public function setListeCapteur($ListeCapteur): void
    {
        $this->ListeCapteur = $ListeCapteur;
    }

        /**
         * @return mixed
         */
        public function getIDLogement()
        {
            return $this->ID_logement;
        }

        /**
         * @return mixed
         */
        public function getListeCapteur()
        {
            return $this->ListeCapteur;
        }


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
            $reponse = $bdd->query('SELECT * FROM produits JOIN positionproduit ON positionproduit.ID_pièce= '.$this->ID_piece.' AND positionproduit.numéroDeSérie = produits.numéroDeSérie');
            while ($donnees = $reponse->fetch()){
                if ($donnees['modèle'] == 'actionneur') {
                    $actionneur = new Actionneur();
                    $actionneur->setModele('actionneur'); $actionneur->setNom($donnees['nom']); $actionneur->setNumeroSerie($donnees['numéroDeSérie']);
                    $this->ListeCapteur[] =$actionneur;
                }

                else {
                    $capteur = new Capteur();
                    $capteur->setModele('capteur'); $capteur->setNom($donnees['nom']); $capteur->setNumeroSerie($donnees['numéroDeSérie']);
                    $this->ListeCapteur[] =$capteur;


                }

            }


        }
    }






