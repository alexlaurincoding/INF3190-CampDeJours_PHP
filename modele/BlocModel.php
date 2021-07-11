<?php
class BlocModel implements JsonSerializable{
   private $id;
   private $nom;
   private $activites = array();

   function __construct($id, $nom, $activites) {
      $this->id = $id;
      $this->nom = $nom;
      $this->activites = $activites;
   }
   
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

   public function sauvegarder() {
      ProgrammeDAO::creerBloc($this);
   }

   

   /**
    * Get the value of id
    */ 
   public function getId()
   {
      return $this->id;
   }

   /**
    * Set the value of id
    *
    * @return  self
    */ 
   public function setId($id)
   {
      $this->id = $id;

      return $this;
   }

   /**
    * Get the value of nom
    */ 
   public function getNom()
   {
      return $this->nom;
   }

   /**
    * Set the value of nom
    *
    * @return  self
    */ 
   public function setNom($nom)
   {
      $this->nom = $nom;

      return $this;
   }

   /**
    * Get the value of activites
    */ 
   public function getActivites()
   {
      return $this->activites;
   }

   /**
    * Set the value of activites
    *
    * @return  self
    */ 
   public function setActivites($activites)
   {
      $this->activites = $activites;

      return $this;
   }
}