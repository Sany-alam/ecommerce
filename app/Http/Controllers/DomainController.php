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
        ?>
        <table id="domainTable" class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($rows as $row) {
                ?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->name; ?></td>
                    <td><button class="btn btn-warning" onclick="edit_domain(<?php echo $row->id; ?>)">Edit</button></td>
                    <td><button class="btn btn-primary" onclick="delete_domain(<?php echo $row->id; ?>)">Delete</button></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script>
            $('#domainTable').dataTable();
        </script>
        <?php
    }

    public function edit_domain(Request $Request)
    {
        return Domain::where('id',$Request->id)->first();
    }

    public function update_domain(Request $Request)
    {
        Domain::where('id',$Request->id)->update(['name'=>$Request->name]);
    }

    public function delete_domain($id)
    {
        Domain::where('id',$id)->delete();
        return "Succesfully deleted";
    }
}
