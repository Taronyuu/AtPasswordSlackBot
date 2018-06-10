<?php

namespace App;

use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Password extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'workspace_id',
        'token',
        'hash',
    ];

    /**
     * decryptedPassword function.
     *
     * @return string
     * @throws \Defuse\Crypto\Exception\EnvironmentIsBrokenException
     * @throws \Defuse\Crypto\Exception\WrongKeyOrModifiedCiphertextException
     * @throws \TypeError
     * @throws \Defuse\Crypto\Exception\BadFormatException
     */
    public function decryptedPassword()
    {
        $key = Key::loadFromAsciiSafeString($this->workspace->token);
        return Crypto::decrypt($this->hash, $key);
    }

    /**
     * workspace function.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
}
