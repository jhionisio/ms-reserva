<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RESERVAModel extends Model
{
    protected $table = 'table_reserva';

    protected $fillable = [
        'id', 'required',
        'Chegada', 'required',
        'Saida','required',
        'Pessoa-id', 'required',
        'Hotel-id', 'required',];
}
