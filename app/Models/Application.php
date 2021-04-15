<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Application extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'sectors', 'agreement'];

    /**
     * Cast values to certain types.
     */
    protected $casts = [
        'sectors' => 'array',
        'agreement' => 'boolean',
    ];

    /**
     * The application owner.
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
