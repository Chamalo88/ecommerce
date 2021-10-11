<?php

namespace Model;

class planning2
{

    protected $id_planning;
    protected $jour;
    protected $cp;
    protected $ville;
    protected $detail_emplacement;
    protected $horaires;
    protected $type_semaine;

    /**
     * Get the value of id_planning
     */
    public function getIdPlanning()
    {
        return $this->id_planning;
    }

    /**
     * Set the value of id_planning
     */
    public function setIdPlanning($id_planning): self
    {
        $this->id_planning = $id_planning;

        return $this;
    }

    /**
     * Get the value of jour
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set the value of jour
     */
    public function setJour($jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get the value of cp
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set the value of cp
     */
    public function setCp($cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get the value of ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     */
    public function setVille($ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of detail_emplacement
     */
    public function getDetailEmplacement()
    {
        return $this->detail_emplacement;
    }

    /**
     * Set the value of detail_emplacement
     */
    public function setDetailEmplacement($detail_emplacement): self
    {
        $this->detail_emplacement = $detail_emplacement;

        return $this;
    }

    /**
     * Get the value of horaires
     */
    public function getHoraires()
    {
        return $this->horaires;
    }

    /**
     * Set the value of horaires
     */
    public function setHoraires($horaires): self
    {
        $this->horaires = $horaires;

        return $this;
    }

    /**
     * Get the value of type_semaine
     */
    public function getTypeSemaine()
    {
        return $this->type_semaine;
    }

    /**
     * Set the value of type_semaine
     */
    public function setTypeSemaine($type_semaine): self
    {
        $this->type_semaine = $type_semaine;

        return $this;
    }
}