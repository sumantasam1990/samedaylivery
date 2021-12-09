<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Metro
 *
 * @property int $id
 * @property int $user_id
 * @property int $business_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $slug
 * @method static \Illuminate\Database\Eloquent\Builder|Metro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Metro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Metro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metro whereUserId($value)
 * @mixin \Eloquent
 */
class Metro extends Model
{
    use HasFactory;
    protected $table = 'metros';
    protected $primaryKey = 'id';
}
