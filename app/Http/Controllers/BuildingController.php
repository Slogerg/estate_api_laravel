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
//        $request->validate([
//            'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
//        ]);
        if($request->file()) {

            $file_name = time() . '_' . $request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');

//            $request->image = time() . '_' . $request->file->getClientOriginalName();
//            $request->image_path = '/storage/' . $file_path;
//            $request->request->add(['image', time() . '_' . $request->file->getClientOriginalName()]);
//            $request->request->add(['image_path', '/storage/' . $file_path]);
           $request->merge(['image' => time() . '_' . $request->file->getClientOriginalName(),
                'image_path' => '/storage/' . $file_path]);
        }
//dd($request->all());
        return Building::create($request->except(['file']));
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

        if($request->file()) {
            $file_name = time() . '_' . $request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');

//            $request->image = time() . '_' . $request->file->getClientOriginalName();
//            $request->image_path = '/storage/' . $file_path;
//            $request->request->add(['image', time() . '_' . $request->file->getClientOriginalName()]);
//            $request->request->add(['image_path', '/storage/' . $file_path]);
            $request->merge(['image' => time() . '_' . $request->file->getClientOriginalName(),
                'image_path' => '/storage/' . $file_path]);
        }

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
