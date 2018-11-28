<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Server
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $game_id
 * @property string $ip
 * @property string $port
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server wherePort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereUpdatedAt($value)
 */
class Server extends Model
{
    //
}
