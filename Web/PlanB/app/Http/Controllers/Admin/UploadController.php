<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\UploadNewFolderRequest;
use App\Services\UploadsManager;
use File;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

class UploadController extends Controller
{
    protected $manager;

    /**
     * UploadController constructor.
     * @param UploadsManager $manager
     */
    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Show page of files / subfolders
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $folder = $request->get('folder');
        $data = $this->manager->folderInfo($folder);
        $data['active']='filemanager';

        return view('admin.upload.index', $data);
    }

    /**
     * Show page of files / subfolders
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function picker(Request $request)
    {
        $folder = $request->get('folder');
        $data = $this->manager->folderInfo($folder);

        return view('admin.upload.picker', $data);
    }

    /**
     * Create a new folder
     * @param UploadNewFolderRequest $request
     * @return $this
     */
    public function createFolder(UploadNewFolderRequest $request)
    {
        $new_folder = $request->get('new_folder');
        $folder = $request->get('folder').'/'.$new_folder;

        $result = $this->manager->createDirectory($folder);

        if ($result === true) {
            return redirect()
                ->back()
                ->withSuccess("Map '$new_folder' aangemaakt.");
        }

        $error = $result ? : "Er is een fout opgetreden bij het aanmaken van de nieuwe map.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    /**
     * Delete a file
     * @param Request $request
     * @return $this
     */
    public function deleteFile(Request $request)
    {
        $del_file = $request->get('del_file');
        $path = $request->get('folder').'/'.$del_file;

        $result = $this->manager->deleteFile($path);

        if ($result === true) {
            return redirect()
                ->back()
                ->withSuccess("Bestand '$del_file' verwijderd.");
        }

        $error = $result ? : "Er is een fout opgetreden bij het verwijderen van het bestand.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    /**
     * Delete a folder
     * @param Request $request
     * @return $this
     */
    public function deleteFolder(Request $request)
    {
        $del_folder = $request->get('del_folder');
        $folder = $request->get('folder').'/'.$del_folder;

        $result = $this->manager->deleteDirectory($folder);

        if ($result === true) {
            return redirect()
                ->back()
                ->withSuccess("Map '$del_folder' verwijderd.");
        }

        $error = $result ? : "Er is een fout opgetreden bij het verwijderen van de map.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    /**
     * Upload new file
     * @param UploadFileRequest $request
     * @return $this|\Illuminate\Http\JsonResponse
     */
    public function uploadFile(UploadFileRequest $request)
    {
        $file = $_FILES['file'];
        $fileName = $request->get('file_name');
        $fileName = $fileName ?: $file['name'];
        $path = str_finish($request->get('folder'), '/') . $fileName;
        $content = File::get($file['tmp_name']);

        $result = $this->manager->saveFile($path, $content);

        if ($result === true) {
            if($request->ajax()){
                $file=$this->manager->fileDetails($path);
                return Response::json(['success' => true,'status'=>"Bestand '$fileName' geüpload.",'file'=>$file]);
            }
            return redirect()
                ->back()
                ->withSuccess("Bestand '$fileName' geüpload.");
        }

        $error = $result ? : "Er is een fout opgetreden bij het uploaden van het bestand.";
        if($request->ajax()){
            return Response::json(['success' => false,'errors'=>[$error]]);
        }
        return redirect()
            ->back()
            ->withErrors([$error]);
    }
}