<?php

class ShareAlbum
{
    private $_album_id;
    private $_user_id;

    /**
     * ShareAlbum constructor.
     * @param int $album_id
     * @param int $user_id
     */
    public function __construct($album_id, $user_id)
    {
        $this->_album_id = $album_id;
        $this->_user_id = $user_id;
    }

    /**
     * @param string $email
     */
    public function add()
    {
        $share = Database::queryFirst('SELECT * FROM album_share WHERE user_id = ? AND album_id = ?', [
            $this->_user_id, $this->_album_id
        ]);

        // If the album is already shared to this user
        if ($share != null) {
            redirect('share_album&album_id=' . $this->_album_id .'&error=already_shared');
        }

        Database::exec('INSERT INTO album_share(view, album_id, user_id) VALUES (0, ?, ?)', [
            $this->_album_id, $this->_user_id
        ]);

        redirect('album&id=' . $this->_album_id);
    }

    /**
     * @param int $user_id
     * @return array
     */
    public static function getByUserId($user_id)
    {
        $albumsShared = Database::query('SELECT * FROM album_share, album WHERE album_share.album_id = album.id AND album_share.user_id = ?',[
            $user_id
        ]);
        return $albumsShared;
    }

    /**
     * @param int $album_id
     * @return array
     */
    public static function getUserSharedByAlbumId($album_id)
    {
        $usersShared = Database::query('SELECT * FROM album_share, user WHERE album_id = ? AND album_share.user_id = user.id', [
            $album_id
        ]);
        return $usersShared;
    }

    public function delete()
    {
        Database::exec('DELETE FROM album_share WHERE album_id = ? AND user_id = ?', [
            $this->_album_id, $this->_user_id
        ]);
    }

}