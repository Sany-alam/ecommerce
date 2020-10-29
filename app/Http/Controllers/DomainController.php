<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;

class DomainController extends Controller
{
    public function create_domain(Request $Request)
    {
        if (Domain::create(['name' => $Request->domain])) {
            return "Success fully created";
        }
    }
    public function read_domain()
    {
        $rows = Domain::orderBy('id','DESC')->get();
        $table = '<thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th></th>
            </tr>
            </thead><tbody>';
        foreach ($rows as $row) {
            $table .= '<tr>
            <td>'.$row->id.'</td>
            <td>'.$row->name.'</td>
            <td><button class="btn btn-primary" onclick="edit_domain('.$row->id.')">Edit</button><button class="btn btn-primary" onclick="delete_domain('.$row->id.')">Delete</button></td>
        </tr>';
        }
        $table .='</tbody>';
        return $table;

    }

    public function delete_domain($id)
    {
        Domain::where('id',$id)->delete();
        return "Succesfully deleted";
    }
}
