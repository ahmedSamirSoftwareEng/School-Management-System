<?php

namespace App\Http\Controllers\Students;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Repositories\FeesRepository;
use App\Http\Requests\StoreFeesRequest;

class FeesController extends Controller
{
  

     protected $Fees;

     public function __construct(FeesRepository $Fees)
    {
        $this->Fees = $Fees;
    }
    public function index()
    {
    return $this->Fees->index();
    }


    public function create()
    {
        return $this->Fees->create();
    }

    public function store(StoreFeesRequest $request)
    {
        return $this->Fees->store($request);
    }
   
    public function edit($id)
    {
        return $this->Fees->edit($id);
    }

    
    public function update(StoreFeesRequest $request)
    {
        return $this->Fees->update($request);
    }

    
    public function destroy(Request $request)
    {
        return $this->Fees->destroy($request);
    }
}
