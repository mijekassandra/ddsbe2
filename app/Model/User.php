<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

    class User extends Model{
        //table name
        protected $table = 'tbluser';
        // column sa table
        protected $fillable = [
        'username', 'password'
        ];

        public $timestamps = false;
        protected $primaryKey = 'ID';

        protected $hidden = [
            'password',
        ];
    }