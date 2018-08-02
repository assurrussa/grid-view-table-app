<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{

    /**
     * @var City
     */
    private $city;

    /**
     * UserController constructor.
     *
     * @param City $city
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }

    /**
     * @param Request $request
     */
    public function search(Request $request)
    {
        $queryString = $request->get('query');
        $data = $this->city->byNameLike($queryString)->limit(100)->get();

        return response()->json([
            'items' => $data->transform(function($item, $index) {
                /** @var City $item */
                return [
                    'label' => $item->name,
                    'id' => $item->id,
                ];
            })
        ]);
    }
}
