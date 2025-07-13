<?php

namespace App\Imports;


interface ImportTypeInterface
{
   /**
     * Fetch data for import based on parameters.
     *
     * @param array $params
     * @return array
     */
    public function fetch(): array;

    /**
     * Process the fetched data.
     *
     * @param mixed $data
     * @return void
     */
    public function process($data): void;

    /**
     * Transform the fetched data.
     *
     * @param mixed $data
     * @return array
     */
    public function transform(array $data): array;
}