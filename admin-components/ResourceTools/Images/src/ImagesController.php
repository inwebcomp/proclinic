<?php

namespace Admin\ResourceTools\Images;

use App\Models\Image;
use App\Traits\WithImages;
use InWeb\Admin\App\Http\Controllers\Controller;
use InWeb\Admin\App\Http\Requests\ResourceDetailRequest;
use InWeb\Admin\App\Http\Requests\ResourceStoreRequest;

class ImagesController extends Controller
{
    /**
     * @param ResourceDetailRequest $request
     * @return mixed
     */
    public function index(ResourceDetailRequest $request)
    {
        /** @var WithImages $model */
        $model = $request->findModelOrFail();

        return [
            'images' => $model->images
        ];
    }

    /**
     * @param ResourceDetailRequest $request
     * @return mixed
     * @throws \App\Exceptions\ModelIsNotBinded
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @todo Lock uploading when many requests are sent
     */
    public function store(ResourceDetailRequest $request)
    {
        /** @var WithImages $model */
        $model = $request->findModelOrFail();

        $images = [];

        foreach ($request->input('images') as $image) {
            $images[] = $model->images()->add($image['full_urls']['default'], true, $image['name']);
        }

        return [
            'images' => $images
        ];
    }

    /**
     * @param ResourceDetailRequest $request
     * @return mixed
     */
    public function destroy(ResourceDetailRequest $request)
    {
        /** @var WithImages $model */
        $model = $request->findModelOrFail();

        $images = [];

        foreach ($request->input('images') as $image) {
            $model->images()->remove((int) $image);
        }
    }

    /**
     * @param Image $image
     */
    public function main(Image $image)
    {
        $image->setMain();
    }
}
