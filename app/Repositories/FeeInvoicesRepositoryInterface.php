<?php


namespace App\Repositories;


interface FeeInvoicesRepositoryInterface
{
   public function index();

   public function show($id);

   public function store($request);
}