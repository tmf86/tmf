<?php


namespace Model;


class Account extends Model
{
    protected $table = 'compte';
    protected $primaryKeyStr = 'id_compte';
    protected $foreignkeys = ['membre' => 'mat_membre'];
    protected $foreignTableKeys = ['membre' => 'mat_membre'];

    public function user()
    {
        return $this->setCurrentForeignTable('membre')->one(User::class);
    }
}