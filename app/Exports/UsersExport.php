<?php

namespace App\Exports;

use App\Models\Biweeklycall;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UsersExport implements FromCollection, WithHeadings
{
    public function __construct($var = null, $arr = null)
    {
        $this->var = $var;
        $this->arr = $arr;
    }

    public function collection()
    {

        return $this->var->get();
    }
    public function headings(): array
    {
        return $this->arr;
    }
}
