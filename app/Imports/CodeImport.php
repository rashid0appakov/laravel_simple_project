<?php

namespace App\Imports;

use App\Models\Code;
use Maatwebsite\Excel\Concerns\ToModel;

class CodeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Code([
            'code' => $row[1],
            'name' => $row[2],
            'types' => $row[3],
            'short_code' => str_replace(' ', '', $row[1])
        ]);
    }
}
