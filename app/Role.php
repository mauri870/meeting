<?php
/**
 * Created by PhpStorm.
 * User: mauri870
 * Date: 29/09/15
 * Time: 07:51
 */

namespace app;


use Parsidev\Entrust\EntrustRole;

class Role extends EntrustRole
{
    public function users()
    {
        return $this->belongsToMany('app\User');
    }
}