<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;
    /* mappare la list dalla var TodoList, gli diciamo la tabella vogliamo che si chiami solo list, andare nella table della migration *modifica con lo stesso nome e creare le altre colonne del dbjson per esempio */
    protected $tabe = 'lists';

}
