<?php

namespace Service\File;

interface FilesUpload
{
    /**
     * @param string $path
     * @param string $fileName *
     * @return string
     */
    public function save(string $path = '', string $fileName = '');

    /*** @return string */
    public function origineName(): string;

    /**@return string* */
    public function type(): string;

    /*** @return string */
    public function temporaryName(): string;

    /*** @return bool */
    public function asError(): bool;

    /*** @return string */
    public function getClientExtension(): string;

    /*** @return int */
    public function size(): int;
}