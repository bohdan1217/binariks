<?php
/**
 * Created by PhpStorm.
 * User: bogdangordijcuk
 * Date: 2020-01-23
 * Time: 12:12
 */

namespace App\Repositories;
use App\Status as Model;

class StatusRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    protected function getModelClass()
    {
        return Model::class;
    }

    public static function getAllStatus()
    {
        $status =  \DB::table('status')->get();
        return $status;
    }


}
