<?php


namespace App\Admin\Actions;

use App\Models\ParamValue;
use App\Traits\WithMetadata;
use App\Traits\WithParamValues;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use InWeb\Admin\App\Actions\Action;
use InWeb\Admin\App\Fields\ActionFields;
use InWeb\Base\Entity;
use InWeb\Media\Images\Image;
use InWeb\Media\Images\WithImages;
use InWeb\Media\Videos\Video;
use InWeb\Media\Videos\WithVideos;

class Copy extends Action
{
    use SerializesModels;

    public function icon()
    {
        return 'far fa-copy';
    }

    public function name()
    {
        return __('Создать дубликат');
    }

    /**
     * Perform the action on the given models.
     *
     * @param ActionFields $fields
     * @param \Illuminate\Support\Collection $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        if ($models->isNotEmpty()) {
            /** @var Entity $model */
            foreach ($models as $model) {
                //copy attributes
                if ($model->translatable())
                    $new = $model->replicateWithTranslations();
                else
                    $new = $model->replicate();

                /** @var Entity $new */

                //save model before you recreate relations (so it has an id)
                $new->push();

                //reset relations on EXISTING MODEL (this way you can control which ones will be loaded
                $model->relations = [];

                //load relations on EXISTING MODEL
                $model->load($model->relationsToCopy ?? []);

                //re-sync everything
                foreach ($model->relations as $relationName => $values) {
                    $new->{$relationName}()->sync($values);
                }

                // copy metadata
                if (in_array(WithMetadata::class, class_uses_recursive($model))) {
                    /** @var WithMetadata|Entity $model */
                    /** @var WithMetadata|Entity $new */
                    $new->setMetadata($model->metadata->toArray());
                }

                // copy params
                if (in_array(WithParamValues::class, class_uses_recursive($model))) {
                    /** @var WithParamValues|Entity $model */
                    /** @var WithParamValues|Entity $new */
                    $model->paramValues()->each(function(ParamValue $value) use ($new) {
                        $newParamValue = $value->replicate();
                        $newParamValue->associateWith($new, class_basename($new));
                        $newParamValue->save();
                    });
                }

                // copy images
                if (in_array(WithImages::class, class_uses_recursive($model))) {
                    /** @var WithImages|Entity $model */
                    /** @var WithImages|Entity $new */
                    $model->images->each(function (Image $image) use ($new) {
                        $newImage = $new->images()->add($image->getUrl());
                        if ($image->isMain())
                            $newImage->setMain();
                    });
                }

                // copy videos
                if (in_array(WithVideos::class, class_uses_recursive($model))) {
                    /** @var WithVideos|Entity $model */
                    /** @var WithVideos|Entity $new */
                    $model->videos->each(function (Video $video) use ($new) {
                        if ($video->isLocal()) {
                            $content = Storage::disk('public')->path($video->getPath());
                        } else {
                            $content = $video->getUrl(false);
                        }

                        $newVideo = $new->videos()->add($content);

                        // copy images
                        if (in_array(WithImages::class, class_uses_recursive($video))) {
                            /** @var WithImages|Entity $video */
                            /** @var WithImages|Entity $newVideo */
                            $newVideo->images()->addMany($video->images->map(function (Image $image) {
                                return $image->getUrl();
                            }));
                        }
                    });
                }
            }

            $model::clearCache($model);
        }

        // @todo Switch page even if hash changed
        return [
//            'redirect' => Admin::newResourceFromModel($new)->editPath(),
'message' => __('Копия создана'),
        ];
    }
}