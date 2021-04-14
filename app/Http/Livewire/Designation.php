<?php

namespace App\Http\Livewire;

use App\Repository\Interfaces\DesignationRepositoryInterface;
use Livewire\Component;

class Designation extends Component
{
    protected $designationInterface;

    public $name, $acronym, $desc;

    public $updateMode = false;



    public function mount(DesignationRepositoryInterface $designationRepository, $designation = null)
    {
        $this->designationInterface = $designationRepository;
    }


    public function render()
    {
        $designations = $this->designationInterface->get();
        return view('livewire.designation',['designations' => $designations]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->acronym = '';
        $this->desc = '';
    }

}
