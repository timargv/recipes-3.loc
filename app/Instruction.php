<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    //
    protected $table = 'recipe_instructions';
    protected $fillable = ['recipe_id', 'instrument_id', 'instruction'];

    public function recipe() {
        return $this->belongsTo(Recipe::class, 'recipe_id', 'id');
    }

}
