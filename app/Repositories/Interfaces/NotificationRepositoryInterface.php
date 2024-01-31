<?php


namespace App\Repositories\Interfaces;


interface NotificationRepositoryInterface
{


    public function getAll($data);

    public function create();

    public function edit($Id);

    public function show($Id);

    public function destroy($notification);

    public function store($request);

    public function update($notification, $request);
}
