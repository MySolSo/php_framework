<?php
namespace App\Models;

use Framework\Model;

class User extends Model
{
    protected $table = "0010_user";

    public function getDataForRest(){
        $items = $this->getAll();
        $success = $items == false ? false : true;

//        dump($items);

        $process_data = array();
        foreach ($items as $item) {
            $row = array();

            $row['id'] = '<strong> ' . $item->id . '</strong>';
            $row['name'] = '<strong> ' . $item->user . '</strong>';
            $row['email'] = '<i>' . $item->email . '</i>';
            $row['inserted'] =  $item->DateInserted;

            $process_data[] = $row;
        }
        $output = array(
            'state' => $success,
            'data' => $process_data
        );
        return json_encode($output);
    }
}
