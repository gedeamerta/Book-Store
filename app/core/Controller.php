<?php
class Controller 
{
    public function view($view, $data = []) //menggunakan data untuk mengisi apakah nanti pada view nya terdapat data yang ingin dikirim, seperti misalnya terdapat JUDUL 
    {
        require_once 'app/views/'. $view . '.php';
    }

    public function model($model)
    {
        require_once 'app/models/'. $model . '.php';
        return new $model;
    }
}