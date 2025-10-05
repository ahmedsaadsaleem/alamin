<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use dd;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LinkUser extends Component
{
    public Employee $employee;

    // #[Validate('max:60000')]
    public $alamin_code;

    public $email;

    public function save()
    {
        $this->employee->alamin_code = $this->alamin_code;
        $this->employee->save();

        // Employee::where('id', $this->employee->id)->update([
        //     'alamin_code' => $this->code
        // ]);
        
        // return $this->redirect('/employees');

        // return redirect()->route('employees.show', $this->employee->id)->with([
        //     'message' => 'success',
        //     'messageType' => 'success'
        // ]);
        $this->reset('alamin_code');
    }
    public function setEmail()
    {
        $this->email = 'ahmedsaad';
    }

    public function mount(Employee $employee)
    {
        $this->fill(
            $employee->only(['email', 'alamin_code'])
        );
    }
    
    public function render()
    {
        return view('livewire.employees.link-user');
    }
}
