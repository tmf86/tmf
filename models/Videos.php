<?php


namespace Model;


class Videos extends Model
{
    protected $table = "video";
    protected $primaryKeyStr = "id_forma";

    /**
     * @param $id
     * @return array
     */
    public function show_formation_videos($id)
    {
        return $this->find_many($id);
    }
}