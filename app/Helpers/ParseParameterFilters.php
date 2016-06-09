<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Input;

class ParseParameterFilters {

    public static function getFilters() {
        $filters['draw'] = (Input::get('draw') != '') ? Input::get('draw') : 1;
        $search = Input::get('search');
        $filters['search'] = (isset($search['value'])) ? $search['value'] : '';
        $filters['take'] = (Input::get('length') != '') ? Input::get('length') : 10;
        $filters['offset'] = (Input::get('start') != '') ? Input::get('start') : 0;
        $columns = Input::get('columns');
        $currentOrder = (Input::get('order') != '') ? Input::get('order') : '';
        if ($currentOrder != '') {
            $field = $columns[$currentOrder[0]['column']]['data'];
            $dir = (isset($currentOrder[0]['dir'])) ? $currentOrder[0]['dir'] : 'asc';
            $filters['order'] = array(
                $field,
                $dir,
            );
        } else {
            $filters['order'] = null;
        }

        return $filters;
    }

}
