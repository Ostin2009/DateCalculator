<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecordResource;
use App\Http\Requests\RecordStoreRequest;
use Illuminate\Http\Request;
use App\Models\Record;
use Carbon\Carbon;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RecordResource::collection(Record::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecordStoreRequest $request)
    {
        
        //$validatedRequest = $request->validated();
        $date1 = Carbon::parse($request->date1);
        $date2 = Carbon::parse($request->date2);

        $diff = $date1->diffAsCarbonInterval($date2, true);

        $record = new Record;
        //$record->date1 = $diff;
        $record->date1 = $request->date1;
        $record->date2 = $request->date2;
        $record->yearsDifference = (integer)$diff->years;
        $record->monthsDifference = (integer)$diff->months;
        $record->daysDifference = (integer)$diff->d;

        $record->save();

        return new RecordResource($record);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
