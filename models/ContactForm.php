<?php

namespace app\models;

use ti2018b\phpmvc\db\DbModel;

/**
 * Class ContactForm
 * 
 * @author Aris Saputra <arissaputra362@gmail.com>
 * @package app\models
 */
class ContactForm extends DbModel
{
    // Form membutuhkan field username dan nim
    public string $username = '';
    public string $nim = '';

    // tabel
    public function tableName(): string
    {
        return 'data_user';
    }

    // set field primary key
    public function primaryKey(): string
    {
        return 'id';
    }

    // inisialisasi rules untuk tiap field
    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'nim' => [self::RULE_REQUIRED]
        ];
    }

    // inisialisasi label
    public function labels(): array
    {
        return [
            'username' => 'Masukkan username',
            'nim'   => 'Masukkan nim'
        ];
    }

    // fungsi simpan
    public function save()
    {
        return parent::save();
    }

    // array atibutr
    public function attributes(): array
    {
        return ['username', 'nim'];
    }

    public function send()
    {
        return true;
    }
}
