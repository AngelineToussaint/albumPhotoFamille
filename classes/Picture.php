<?php

class Picture
{
    private $_title;
    private $_description;
    private $_date;
    private $_picture;
    private $_folder_id;

    /**
     * Picture constructor.
     * @param string $title
     * @param string $description
     * @param int $date
     * @param string $picture
     * @param int $folder_id
     */
    public function __construct($title, $description, $date, $picture, $folder_id)
    {
        $this->_title = $title;
        $this->_description = $description;
        $this->_date = $date;
        $this->_picture = $picture;
        $this->_folder_id = $folder_id;
    }

    /**
     * @param int $album_id
     */
    public function add($album_id)
    {
        $nameFile = upload($this->_picture, 3000000, ['png', 'jpg', 'jpeg']);

        if ($nameFile == false) {
            redirect('add_picture&album_id='. $album_id .'&error=true');
        }

        Database::exec('INSERT INTO picture (title, description, date, picture, folder_id) VALUES (?, ?, ?, ?, ?)',[
            $this->_title, $this->_description, $this->_date, $nameFile, $this->_folder_id
        ]);

        redirect('album&id='. $album_id .'&folder_id='. $this->_folder_id);
    }

    /**
     * @param int $folder_id
     * @return array
     */
    public static function getByFolderId($folder_id)
    {
        $getPictures = Database::query('SELECT * FROM picture WHERE folder_id = ?', [
            $folder_id
        ]);

        return $getPictures;
    }
}