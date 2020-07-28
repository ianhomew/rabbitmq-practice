<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\SendEmailQueue
 *
 * @property int $id
 * @property string $sent_to
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SendEmailQueue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SendEmailQueue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SendEmailQueue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SendEmailQueue whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SendEmailQueue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SendEmailQueue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SendEmailQueue whereSentTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SendEmailQueue whereUpdatedAt($value)
 */
	class SendEmailQueue extends \Eloquent {}
}

namespace App{
/**
 * App\Posts
 *
 * @property int $id
 * @property string $title 標題
 * @property int $author_id 作者id
 * @property string $content 內容
 * @property string $description 其他描述
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereUpdatedAt($value)
 */
	class Posts extends \Eloquent {}
}

