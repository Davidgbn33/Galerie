<?php
namespace App\service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class UploadFile extends AbstractController{

    public function generate_name($length = 20){
        $code = "aze86rt3yu1iop9qsd8f7gh5jklm2w8xc6vbn";
        $result = "";

        while (strlen($result) < 20) {
            $result .= $code[rand(0, strlen($code)-1)];
        }
        return $result;
    }
    public function saveFile($file){
        $extension = $file->guessExtension();
        $filename = $this->generate_name(30).".".$extension;
        $file->move($this->getParameter('image_dir'), $filename);

        return $filename;
    }
    public function updateFile($file, $old_file){
        $file_url = $this->saveFile($file);
        try {
            unlink($this->getParameter('static_dir').$old_file);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $file_url;
    }
    public function saveFileInspi($file){
        $extension = $file->guessExtension();
        $filename = $this->generate_name(30).".".$extension;
        $file->move($this->getParameter('image_dir_inspi'), $filename);

        return $filename;
    }
    public function updateFileInspi($file, $old_file){
        $file_url = $this->saveFile($file);
        try {
            unlink($this->getParameter('image_dir_inspi').$old_file);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $file_url;
    }
    public function saveFileCat($file){
        $extension = $file->guessExtension();
        $filename = $this->generate_name(30).".".$extension;
        $file->move($this->getParameter('image_dir_cat'), $filename);

        return $filename;
    }
    public function updateFileCat($file, $old_file){
        $file_url = $this->saveFile($file);
        try {
            unlink($this->getParameter('image_dir_cat').$old_file);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $file_url;
    }
}