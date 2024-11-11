<?php

namespace App\Repositories;

use App\Models\Author;
use App\Interfaces\AuthorRepositoryInterface;

class AuthorRepository implements AuthorRepositoryInterface
{
    
    /**
     * Create a new class instance.
     */
    public function __construct(public Author $author) {}
    
    /**
     * Gell all authors
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all() {
        return $this->author->all();
    }
    
    /**
     * Get author by Id
     * @param mixed $id
     * @return mixed
     */
    public function getById($id)
    {
       return $this->author->findOrFail($id);
    }
    
    /**
     * Create a new resource
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
       return $this->author->create($data);
    }
    
    /**
     * Update a resource
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data,$id)
    {
       return $this->author->whereId($id)->update($data);
    }
    
    /**
     * Delete a resource
     * @param mixed $id
     * @return void
     */
    public function delete($id)
    {
       $this->author->destroy($id);
    }
}
