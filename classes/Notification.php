<?php

class Notification
{
    /**
     * @param int $user_id
     */
    public static function removeNotifications($user_id){
        Database::exec('UPDATE album_share SET view = 1 WHERE user_id = ?', [
            $user_id
        ]);
    }
}