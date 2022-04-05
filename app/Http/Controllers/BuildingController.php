<?php

namespace App\Http\Controllers;

use App\Models\Building;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BuildingController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/building",
     * summary="Get all buildings",
     * description="Get all buildings",
     * tags={"building"},

     * @OA\Response(
     *    response=200,
     *    description="Success",
     * ))
     */
    public function index()
    {
        return Building::orderByDesc('created_at')->get();
    }

    /**
     * @OA\Post (
     * path="/api/building",
     * summary="Adds a new building",
     * description="Adds a new building",
     * tags={"building"},
            @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="title",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="location",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="price",
     *                     type="integer"
     *                 ),

     *                 example={"id": 1488, "name": "Penthouse", "location": "Kyiv", "price": 22222}
     *             )
     *         )
     *     ),
     * @OA\Response(
     *    response=200,
     *    description="Success",
     * ))
     */
    public function store(Request $request)
    {
//        $id = Building::max('id');
//
//
//            $from = public_path('tmp/uploads/'.$request->media);
//            $to = public_path('post_images/'.$request->media);
//
//            File::move($from, $to);
//            DB::table('media')->insert(
//                ['building_id' => $id+1, 'name' => $request->media]
//            );
        $file = $request->image;
        $name = uniqid() . '_' . trim($file);
        $file->move('images', $name);
        return Building::create($request->all());
    }
    /**
     * @OA\Get (
     * path="/api/building/{id}",
     * summary="Get single building by ID",
     * description="Get single building by ID",
     * tags={"building"},
     *    @OA\Parameter(
     *         description="Parameter with mutliple examples",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *         @OA\Examples(example="uuid", value="0006faf6-7a61-426c-9034-579f2cfcfa83", summary="An UUID value."),
     *     ),
     * @OA\Response(
     *    response=200,
     *    description="Success",
     * ))
     */
    public function show($id)
    {
        return Building::find($id);
    }
    /**
     * @OA\Put (
     * path="/api/building/{id}",
     * summary="update building",
     * description="update building",
     * tags={"building"},
 *      *     @OA\Parameter(
 *         description="Parameter with mutliple examples",
 *         in="path",
 *         name="id",
 *         required=true,
 *         @OA\Schema(type="string"),
 *         @OA\Examples(example="int", value="1", summary="An int value."),
 *         @OA\Examples(example="uuid", value="0006faf6-7a61-426c-9034-579f2cfcfa83", summary="An UUID value."),
 *     ),

     * @OA\Response(
     *    response=200,
     *    description="Success",
     * ))
     */
    public function update(Request $request, $id)
    {
        $building = Building::findOrFail($id);
        $building->update($request->all());

        return $building;
    }
    /**
     * @OA\Delete (
     * path="/api/building/{id}",
     * summary="delete building",
     * description="delete building",
     * tags={"building"},
     *      *     @OA\Parameter(
     *         description="Parameter with mutliple examples",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *         @OA\Examples(example="uuid", value="0006faf6-7a61-426c-9034-579f2cfcfa83", summary="An UUID value."),
     *     ),

     * @OA\Response(
     *    response=204,
     *    description="Success",
     * ))
     */

    public function delete(Request $request, $id)
    {
        $building = Building::findOrFail($id);
        $building->delete();

        return 204;
    }
}
