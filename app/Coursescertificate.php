<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Coursescertificate
 *
 * @package App
 * @property integer $order
 * @property string $title
 * @property string $slug
 * @property string $image
*/
class Coursescertificate extends Model
{
    use SoftDeletes;

    protected $fillable = ['order', 'title', 'slug', 'image'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        Coursescertificate::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setOrderAttribute($input)
    {
        $this->attributes['order'] = $input ? $input : null;
    }
    
}
