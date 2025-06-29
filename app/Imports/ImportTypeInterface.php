<?php

namespace App\Imports;


interface ImportTypeInterface
{
   /**
     * Fetch data for import based on parameters.
     *
     * @param array $params
     * @return mixed
     */
    public function fetch();

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
     * @return void
     */
    public function transform($data): void;    
}