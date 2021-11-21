<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Reclamation;

require_once 'data.php';

class GeneralController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->data = new \stdClass();
    }
    public function getVars()
    {
        $this->data = new \stdClass();
        $this->data->count_msg = 0;
        $this->data->menu = "";
        $this->data->user =  Auth::user();
        $this->data->g_profil = $GLOBALS['g_profil'];
        $this->data->g_type = $GLOBALS['g_type'];
        $this->data->g_etat = $GLOBALS['g_etat'];
        $this->data->g_etatReclamation = $GLOBALS['g_etatReclamation'];
        $this->data->g_etatJustificatif = $GLOBALS['g_etatJustificatif'];
    
        $this->data->profil_id = Auth::user()->profil;
        $this->data->profil = $GLOBALS['g_profil'][Auth::user()->profil];
        $this->data->count_msg  =  Reclamation::all()->where('etat', 1)->count();
        $this->data->template  =  'template';
        if ($this->isPersonnel()) {
            $this->data->template  =  'template1';
        }
    }

    public function security()
    {
        //verif session
        $this->personnel_id = $this->session->get('personnel_id');
        if (!isset($this->personnel_id) || empty($this->personnel_id)) {
            $this->redirect($this->generateUrl('login'))->sendHeaders();
            exit;
        }
        // end verif session
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../web/';
    }

    public function uploadfile($filename, $destinationPath = "", $prefixe = "")
    {
        $request = request();
        $file = $request->file($filename);
        $extension = $file->extension();
        // $new_name = $prefixe . "_" . md5(uniqid()) . '_' . $file->getClientOriginalName();
        // $new_name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $file->getClientOriginalName());
        // dd($new_name);
        $new_name = $prefixe . "_" . md5(uniqid()) . '.' . $extension;
        $file->move($destinationPath, $new_name);
        return $new_name;
    }
    public function downloadAction($type, $filename)
    {
        $request = $this->get('request');
        $path = $this->getUploadRootDir() . $type . "/";
        $content = file_get_contents($path . $filename);

        $response = new Response();

        //set headers
        $response->headers->set('Content-Type', 'mime/type');
        $response->headers->set('Content-Disposition', 'attachment;filename="' . $filename);

        $response->setContent($content);
        return $response;
    }
    public function isAdmin()
    {
        return Auth::user()->profil == 1;
    }
    public function isAgent()
    {
        return Auth::user()->profil == 2;
    }
    public function isPersonnel()
    {
        return Auth::user()->profil == 3;
    }
}
