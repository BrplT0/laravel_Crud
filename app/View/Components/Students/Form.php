<?php

namespace App\View\Components\Students;

use Illuminate\View\Component;

class Form extends Component
{
    public $student;
    public $cities;

    public function __construct($student = null, $cities = [])
    {
        $this->student = $student;
        $this->cities = $cities;
    }

    public function render()
    {
        return view('components.students.form');
    }
} 