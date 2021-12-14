<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Inventory
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $business_id
 * @property int|null $user_id
 * @property int|null $units
 * @property string|null $tracking
 * @property string|null $delivery
 * @property string|null $shipping
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereTracking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereUnits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereUserId($value)
 * @mixin \Eloquent
 */
class Inventory extends Model
{
    use HasFactory;
}
