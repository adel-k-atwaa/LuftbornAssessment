<?php
namespace App\Traits;

use App\Models\Scopes\ByUserIdScope;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
trait UserRelation
{
   /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ByUserIdScope());
        static::creating(function ($model) {
            if (empty($model->user_id)) {
                $model->user_id = Auth::user()->id;
            }
        });
    }

    /**
     * Get the user associated with the Uuids
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
