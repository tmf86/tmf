<?php


namespace Model;


class Account extends Model
{
    protected $table = 'compte';
    protected $primaryKeyStr = 'id_compte';
    protected $foreignkeys = ['membre' => 'mat_menbre'];
    protected $foreignTableKeys = ['membre' => 'mat_menbre'];

    /**
     * @return array|mixed
     */
    public function user()
    {
        return $this->setCurrentForeignTable('menbre')->one(User::class);
    }
}