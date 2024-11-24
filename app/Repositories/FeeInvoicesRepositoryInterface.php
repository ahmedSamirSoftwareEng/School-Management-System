<?php


namespace App\Repositories;


interface FeeInvoicesRepositoryInterface
{
   public function index();

   public function show($id);

   public function edit($id);

   public function update($request);

   public function store($request);

   public function destroy($request);
}