<?php

namespace App\Http\Controllers;

use App\Http\Requests\RESERVARequest;
use App\Http\Controllers\Controller;
use App\Models\RESERVAModel;
use App\Api\ApiMessages;

class RESERVAController extends Controller
{

    private $reservacrud;

    public function __construct(RESERVAModel $reservacrud){
        $this->reservacrud = $reservacrud;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservacrud = $this->reservacrud->paginate('10');

        return response()->json($reservacrud, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RESERVARequest $request)
    {
        $data = $request->all();

        try{

            $reservacrud = $this->reservacrud->create($data);

            return response()->json([
                'data' => [
                    'msg' => 'reserva cadastrada com sucesso!'
                ]
            ], 200);
        }catch (Exception $e) {
            $message = new ApiMessages($e->getMessages());
            return response()->json($message->getMessage(), 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $reservacrud = $this->reservacrud->FindOrFail($id);

            return response()->json([
                'data' => $reservacrud

            ], 200);
        } catch (Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RESERVARequest $request, $id)
    {
        $data = $request->all();

        try{

            $reservacrud = $this->reservacrud->findOrFail($id);
            $reservacrud->update($data);

            return response()->json([
                'data' =>[
                    'msg' => 'reserva atualizada!'
                ]
                ], 200);

        } catch (Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $reservacrud = $this->reservacrud->FindOrFail($id);
            $reservacrud->delete();

            return response()->json([
                'data' => [
                    'msg' => 'reserva deletada com sucesso!'
                ]
            ], 200);
        } catch (Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
