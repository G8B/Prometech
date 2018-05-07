<?php

    class Produit{
        private $numeroSerie;
        private $nom;
        private $modele;

        /**
         * @param mixed $modele
         */
        public function setModele($modele): void
        {
            $this->modele = $modele;
        }

        /**
         * @return mixed
         */
        public function getNom()
        {
            return $this->nom;
        }

        /**
         * @return mixed
         */
        public function getModele()
        {
            return $this->modele;
        }

        /**
         * @return mixed
         */
        public function getNumeroSerie()
        {
            return $this->numeroSerie;
        }

        /**
         * @param mixed $nom
         */
        public function setNom($nom): void
        {
            $this->nom = $nom;
        }

        /**
         * @param mixed $numeroSerie
         */
        public function setNumeroSerie($numeroSerie): void
        {
            $this->numeroSerie = $numeroSerie;
        }



}