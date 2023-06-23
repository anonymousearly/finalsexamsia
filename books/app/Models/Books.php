<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Books extends Model{
        protected $table = 'tblbooks';
        protected $fillable = [
            'book_name','yearpublish','authorid'
        ];

        public $timestamps = false;
        protected $primaryKey = 'book_id';
    }

