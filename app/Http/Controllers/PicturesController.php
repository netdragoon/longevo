<?php

namespace App\Http\Controllers;

use App\Repository\RepositoryPictures;
use Illuminate\Http\Request;

use App\Http\Requests;

class PicturesController extends Controller
{
    //
    /**
     * @var RepositoryPictures
     */
    private $repository;

    /**
     * PicturesController constructor.
     * @param RepositoryPictures $repository
     */
    public function __construct(RepositoryPictures $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $this->setData('model', $this->repository->all([['id', 'desc']]));
        return view('pictures.index', $this->getData());
    }

    public function store(Request $request)
    {
        //$file = $request->file('pic');
        //var_dump($file->getPathname()); return;
        $pic = $request->file('pic');
        $data['description'] = $request->get('description');
        $data['file'] = file_get_contents($pic->getPathname());
        $data['content_type'] = $pic->getClientMimeType();
        $this->repository->create($data);
        return redirect()->route('pictures.index');
    }

    public function picture(Request $request, $id)
    {
        $model = $this->repository->find((int)$id);
        return response($model->file)
                ->header('Content-Type', $model->content_type);
    }
}
