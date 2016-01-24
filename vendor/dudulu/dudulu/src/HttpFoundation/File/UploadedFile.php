<?php
/**
 * Created by PhpStorm.
 * User: LatteCake
 * Date: 16/1/23
 * Time: 下午5:02
 * File: UploadedFile.php
 */

namespace Dudulu\HttpFoundation\File;


class UploadedFile extends File
{
    /**
     * Whether the test mode is activated.
     *
     * Local files are used in test mode hence the code should not enforce HTTP uploads.
     *
     * @var bool
     */
    private $test = false;

    /**
     * The original name of the uploaded file.
     *
     * @var string
     */
    private $originalName;

    /**
     * The mime type provided by the uploader.
     *
     * @var string
     */
    private $mimeType;

    /**
     * The file size provided by the uploader.
     *
     * @var string
     */
    private $size;

    /**
     * The UPLOAD_ERR_XXX constant provided by the uploader.
     *
     * @var int
     */
    private $error;

    /**
     * UploadedFile constructor.
     * @param $path
     * @param $originalName
     * @param null $mimeType
     * @param null $size
     * @param null $error
     * @param null $test
     */
    public function __construct($path, $originalName, $mimeType = null, $size = null, $error = null, $test = null)
    {
        $this->originalName = $this->getName($originalName);
        $this->mimeType = $mimeType ?: 'application/octet-stream';
        $this->size = $size;
        $this->error = $error ?: UPLOAD_ERR_OK;
        $this->test = (bool) $test;

        parent::__construct($path, UPLOAD_ERR_OK === $this->error);
    }


}