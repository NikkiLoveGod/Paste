<?php
/**
 * Created by PhpStorm.
 * User: NLG
 * Date: 28.5.2015
 * Time: 13:59
 */

namespace Paste\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Paste extends Model {

    public static function createNew($content, $type = 'text')
    {
        $paste = new Paste;
        $paste->hash = self::createUniqueHash();
        $paste->content = $content;
        $paste->type = $type;

        $paste->save();

        return $paste;
    }

    public static function createUniqueHash()
    {
        $hash = self::createHash();

        while(Paste::where('hash', $hash)->exists()) {
            $hash = self::createHash();
        }

        return $hash;
    }

    public static function createHash()
    {
        return Str::random(6);
    }

    public static function findByHash($hash)
    {
        return self::where('hash', $hash)->first();
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function getType()
    {
        return $this->type;
    }
}