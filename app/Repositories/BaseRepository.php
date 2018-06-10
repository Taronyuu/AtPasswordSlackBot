<?php
namespace App\Repositories;

use App\User;
use App\Workspace;
use App\Password;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository {

    abstract public function model();

}