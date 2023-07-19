<?php

namespace App\Traits;

trait WithSorting
{
    public $sortBy = 'id';
    public $sortDirection = 'asc';
 
    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'asc';
 
        $this->sortBy = $field;
    }
 
    public function reverseSort()
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }

     
    protected $queryStringWithSorting = [
        'sortBy' => ['except' => 'id'],
        'sortDirection' => ['except' => 'asc'],
    ];
 
    // or as a method
 
    public function queryStringWithSorting()
    {
        return [
            'sortBy' => ['except' => 'id'],
            'sortDirection' => ['except' => $this->defaultSortDirection()],
        ];
    }
    
    public function bootWithSorting()
    {
        //
    }
 
    public function defaultSortDirection()
    {
        return 'asc';
    }
 
    public function bootedWithSorting()
    {
        //
    }
 
    public function mountWithSorting()
    {
        //
    }
 
    public function updatingWithSorting($name, $value)
    {
        //
    }
 
    public function updatedWithSorting($name, $value)
    {
        //
    }
 
    public function hydrateWithSorting()
    {
        //
    }
 
    public function dehydrateWithSorting()
    {
        //
    }
 
    public function renderingWithSorting()
    {
        //
    }
 
    public function renderedWithSorting($view)
    {
        //
    }
}
