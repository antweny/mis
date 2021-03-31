<?php

namespace App\Repository\Interfaces;

interface BaseRepositoryInterface
{
    /**
     * Return Collection
     */
    public function get();

    /**
     * Find specific record
     */
    public function find($id);

    /**
     * Find specific record with ID and return
     */
    public function findOrFail($id);


    /**
     * Create new Record
     */
    public function create(array $attributes);


    /**
     * Update existing record
     */
    public function update($id, array $attributes);

    /**
     *
     */
    public function updating($id, array $attributes);

    /**
     * Delete Record
     */
    public function delete($id);


    /**
     * Return Model
     */
    public function model();


    /**
     * Find Record ID if not exist Create new Record
     */
    public function findOrCreate($data);


    /**
     * Return model relationship with other models
     */
    public function relationshipWith(array $attributes);

    /**
     * Return model relationship with other models
     */
    public function relationshipWithPagination(array $attributes,$int);



    /**
     * Return model relationship with other models
     */
    public function relationWithCount(array $attributes,array $count);


    /**
     * Get Name and ID of the Location
     */
    public function selectNameID();


    /**
     * Decode the model records primary ID received
     */
    public function decode($id);


    /**
     * Pluck model name and id
     */
    public function pluckNameID();


    /**
     * Select Paginate Data
     */
    public function paginate($int);



}
