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
    /*** @var string */
    private $defaultPath = '/storage/';

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

    /**
     * @param string $path
     * @param string $fileName
     * @return string
     */
    public function save(string $path = '', string $fileName = '')
    {
        if (!empty($path) && !empty($fileName)) {
            return $this->uploadFileWhithoutEmptyParameters($path, $fileName);
        }
        return $this->uploadFileWhithOneParameterEmpty($path, $fileName);
    }

    /**
     * @return string
     */
    public function getDefaultPath(): string
    {
        return $this->defaultPath;
    }

    /**
     * @param string $defaultPath
     * @return $this
     */
    public function setDefaultPath(string $defaultPath)
    {
        $this->defaultPath = $defaultPath;
        return $this;
    }

    /**
     * @param $param1
     * @param $param2
     * @return false|int
     */
    private function getEmptyParameter($param1, $param2)
    {
        if (empty($param1) && !empty($param2)) {
            return 1;
        }
        if (!empty($param1) && empty($param2)) {
            return 2;
        }
        if (empty($param1) && empty($param2)) {
            return 3;
        }
        return false;
    }

    private function uploadFileWhithOneParameterEmpty(string $path, string $fileName)
    {
        switch ($this->getEmptyParameter($path, $fileName)) {
            case 1:
                $this->deteFileIfExist($this->defaultPath, $this->getFileWithExtension($fileName));
                return $this->moveUploadedFile($this->defaultPath, $fileName);
            case 2:
                $fileName = $this->generateUnknownFileName();
                $this->deteFileIfExist($path, $fileName);
                $this->createFileIfNotExist($path);
                return $this->moveUploadedFile($path, $fileName);
            case 3:
                $fileName = $this->generateUnknownFileName();
                $this->deteFileIfExist($this->defaultPath, $fileName);
                return $this->moveUploadedFile($this->defaultPath, $fileName);

        }
        return false;
    }

    private function uploadFileWhithoutEmptyParameters(string $path, $fileName)
    {
        $this->createFileIfNotExist($path);
        $this->deteFileIfExist($path, $this->getFileWithExtension($fileName));
        return $this->moveUploadedFile($path, $this->getFileWithExtension($fileName));
    }

    private function fileExist(...$path)
    {
        return file_exists(sprintf('%s/%s', ROOT_DIRECTORY, implode('', $path)));
    }

    private function generateUnknownFileName()
    {
        return date("Y-H-i-s") . $this->getUserExtension();
    }

    private function deteFileIfExist(...$path)
    {
        if ($this->fileExist(...$path)) {
            unlink(ROOT_DIRECTORY . implode('', $path));
        }
    }

    private function createDirectory(...$path)
    {
        return (mkdir(ROOT_DIRECTORY . implode('', $path), 0777, true));
    }

    private function moveUploadedFile(...$path)
    {
        if ($path[0][strlen($path[0]) - 1] !== '/' && $path[0][strlen($path[0]) - 1] !== '\\') {
            $path[0] = $path[0] . '/';
        }
//        debug(preg_match('#^[a-z]+$#', $path[0]));
        if (move_uploaded_file($this->temporaryName(), ROOT_DIRECTORY . implode('', $path))) {
            return implode('', $path);
        }
        return false;
    }

    private function getFileWithExtension(string $fileName)
    {
        return ($this->getExtension($fileName) === $fileName) ? $fileName . $this->getClientExtension() : $fileName;
    }

    public function createFileIfNotExist(...$path)
    {
        return (!$this->fileExist(...$path)) ? $this->createDirectory(...$path) : false;
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
    public function getClientExtension(): string
    {
        $lastPointPos = strripos($this->origineName(), '.');
        if ($lastPointPos !== 0) {
            return substr($this->origineName(), $lastPointPos);
        }
        return '';
    }
}