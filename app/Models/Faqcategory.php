<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Faqcategory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Faqcategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faqcategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faqcategory query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|Faqcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faqcategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faqcategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faqcategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faqcategory whereUpdatedAt($value)
 */
class Faqcategory extends Model
{
    use HasFactory;

    protected $table = 'faqscategories';
}
