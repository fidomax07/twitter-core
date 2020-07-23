<?php

namespace App\Media;

use App\Media\MimeTypes;
use Spatie\MediaLibrary\Models\Media as BaseMedia;

/**
 * App\Media\Media
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string|null $mime_type
 * @property string $disk
 * @property int $size
 * @property array $manipulations
 * @property array $custom_properties
 * @property array $responsive_images
 * @property int|null $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $extension
 * @property-read string $human_readable_size
 * @property-read string $type
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\MediaLibrary\Models\Media ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media whereCollectionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media whereCustomProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media whereManipulations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media whereResponsiveImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Media\Media whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Media extends BaseMedia
{
    public function type()
    {
        return MimeTypes::type($this->mime_type);
    }
}