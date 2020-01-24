<?php
/**
 * Created by PhpStorm.
 * User: bogdangordijcuk
 * Date: 2020-01-22
 * Time: 20:31
 */

namespace App\Repositories;


abstract class CoreRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass();

    protected function startConditions()
    {
        return clone $this->model;
    }
    public function getEditId($id)
    {
        return $this->startConditions()->find($id);
    }
}
