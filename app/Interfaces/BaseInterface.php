<?php

namespace App\Interfaces;

interface BaseInterface
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
     * Find specific record
     */
    public function findWith($id, array $attributes);

    /**
     * Find specific record with ID
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
     * Delete Record
     */
    public function delete($id);

    /**
     * Return Model
     */
    public function model();

    /**
     * Get Record ID if not exist Create new Record
     */
    public function findOrCreate($data);

    /**
     * Return model relationship with other models
     */
    public function getWithRelation(array $attributes);

    /**
     * Return model relationship with other models
     */
    public function withCountRelation(array $attributes,array $count);

    /**
     * Get Name and ID of the Location
     */
    public function selectNameAndId();

    /**
     * Decode ID received
     */
    public function decodable($id);

    /**
     * Pluck model name and id
     */
    public function pluckNameId();

}
