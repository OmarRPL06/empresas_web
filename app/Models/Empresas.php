<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    use HasFactory;

    protected $table = 'empresas';
    protected $primaryKey = 'idEmpresa';
    public $timesTamps =  false;
    public $updated_at = false;
    public $created_at = false;
}
