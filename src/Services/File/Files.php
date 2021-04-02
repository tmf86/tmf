<?php


namespace Service\File;


use Contoller\Middleware\Auth;

class Files implements FilesUpload
{
    use Auth;

    /*** @var array */
    private $files;
    /*** @var array */
    private $currentFile;

    public function __construct()
    {
        $this->files = $_FILES;
    }

    /**
     * @param $name
     * @return FilesUpload
     * @throws \Exception
     */
    public function file($name)
    {
        if (array_key_exists($name, $this->files)) {
            $this->currentFile = $this->files[$name];
            return $this;
        }
        throw new \Exception('The Key ask is not exist');
    }

    /**
     * @param $fileName
     * @return false|string
     */
    private function getExtension($fileName)
    {
        $lastPointPos = strripos($fileName, '.');
        if ($lastPointPos !== 0) {
            return substr($fileName, $lastPointPos);
        }
        return $fileName;
    }

    public function save(string $path = '', string $fileName = '') : bool
    {
        $pathIsNotEmpty = !empty($path);
        $fileNameIsNotEmpty = !empty($fileName);
        $fileNameIsEmpty = empty($fileName);
        $pathIsEmpty = empty($path);
        if ($pathIsNotEmpty && $fileNameIsNotEmpty) {
            debug('1');
            if (file_exists(sprintf('%s/%s', ROOT_DIRECTORY, $path))) {
                $fileName = ($this->getExtension($fileName) === $fileName) ? $fileName . $this->getUserExtension() : $fileName;
                return move_uploaded_file($this->temporaryName(), ROOT_DIRECTORY . $path . $fileName);
            }
            if (mkdir($path, 0777, true)) {
                $fileName = ($this->getExtension($fileName) === $fileName) ? $fileName . $this->getUserExtension() : $fileName;
                return move_uploaded_file($this->temporaryName(), ROOT_DIRECTORY . $path . $fileName);
            }
            return false;

        }
        if ($pathIsNotEmpty && $fileNameIsEmpty) {
            debug('2');
            if (file_exists(sprintf('%s/%s', ROOT_DIRECTORY, $path))) {
                return move_uploaded_file($this->temporaryName(), ROOT_DIRECTORY . $path . date("Y-H-i-s") . $this->getUserExtension());
            }
            if (mkdir($path, 0777, true)) {
                return move_uploaded_file($this->temporaryName(), ROOT_DIRECTORY . $path . date("Y-H-i-s") . $this->getUserExtension());
            }
            return false;
        }
        if ($pathIsEmpty && $fileNameIsNotEmpty) {
            debug('3');
            $fileName = ($this->getExtension($fileName) === $fileName) ? $fileName . $this->getUserExtension() : $fileName;
            return move_uploaded_file($this->temporaryName(), ROOT_DIRECTORY . '/storage/' . $fileName);
        }
        if ($pathIsEmpty && $fileNameIsEmpty) {
            return move_uploaded_file($this->temporaryName(), ROOT_DIRECTORY . '/storage/' . date("Y-H-i-s") . $this->getUserExtension());
        }
        return false;

    }

    /*** @return string */
    public function origineName(): string
    {
        // TODO: Implement origineName() method.
        return $this->currentFile['name'];
    }

    /**@return string* */
    public function type(): string
    {
        // TODO: Implement type() method.
        return $this->currentFile['type'];
    }

    /*** @return string */
    public function temporaryName(): string
    {
        // TODO: Implement temporaryName() method.
        return $this->currentFile['tmp_name'];
    }

    /*** @return bool */
    public function asError(): bool
    {
        // TODO: Implement asError() method.
        return $this->currentFile['error'];
    }

    /*** @return int */
    public function size(): int
    {
        // TODO: Implement size() method.
        return $this->currentFile['size'];
    }

    /*** @return string */
    public function getUserExtension(): string
    {
        // TODO: Implement getUserExtension() method.
        return $this->getExtension($this->origineName());
    }
}