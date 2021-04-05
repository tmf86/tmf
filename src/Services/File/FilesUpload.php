<?php

namespace Service\File;

interface FilesUpload
{
    /**
     * @param string $path
     * @param string $fileName
     * @return bool
     */
    public function save(string $path = '', string $fileName = ''): bool;

    /*** @return string */
    public function origineName(): string;

    /**@return string* */
    public function type(): string;

    /*** @return string */
    public function temporaryName(): string;

    /*** @return bool */
    public function asError(): bool;

    /*** @return string */
    public function getUserExtension(): string;

    /*** @return int */
    public function size(): int;
}