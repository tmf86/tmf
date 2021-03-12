<?php


namespace Model;


class Formation extends Model
{
    protected $table = "formation";

    /**
     * @return array
     */
    public function show_all()
    {
        return $this->all();
    }

    /**
     * @return string
     */
    public function forma_url()
    {
        return "cours.php?id=$this->id_forma";
    }

}