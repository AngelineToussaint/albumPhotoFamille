<?php

class Folder
{
    private $_name;
    private $_date;
    private $_album_id;

    /**
     * Folder constructor.
     * @param string $name
     * @param string $date
     * @param int $album_id
     */
    public function __construct($name = null, $date = null, $album_id = null)
    {
        $this->_name = $name;
        $this->_date = $date;
        $this->_album_id = $album_id;
    }

    public function add()
    {
        Database::exec('INSERT INTO folder(name,date, album_id) VALUES (?, ?, ?)',[
            $this->_name, $this->_date, $this->_album_id
        ]);
        redirect('album&id='.$this->_album_id);
    }

    /**
     * @param int $album_id
     * @return array
     */
    public static function getByAlbumId($album_id)
    {
        $folders = Database::query('SELECT * FROM folder WHERE album_id = ?',[
            $album_id
        ]);
        return $folders;
    }
}