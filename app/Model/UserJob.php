<?php

    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class UserJob extends Model{

        protected $table = 'tbluserjob';

        protected $fillable = [
            'jobid', 'jobname',
        ];

        public $timestamps = false;

        protected $primaryKey = 'jobid';
    }