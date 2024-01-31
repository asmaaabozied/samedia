<?php

namespace App\Helpers;


class DTHelper
{

    public static function dtEditButton($link, $title, $permission)
    {

//        if (auth()->user()->hasPermission($permission)) {

        $html = <<< HTML
 <a href="$link" class="update btn-table" ><i class="fa fa-edit""></i> </a>
HTML;

        return $html;
    }

    public static function dtAddCityButton($link, $title, $permission)
    {

//        if (auth()->user()->hasPermission($permission)) {

        $html = <<< HTML

<a  href="$link" class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" data-bs-original-title="">AddCity</a>

HTML;

        return $html;
    }


    public static function dtDeleteButton($link, $title, $permission, $id)
    {
        $csrf = csrf_field();
        $method_field = method_field('delete');
//        if (auth()->user()->hasPermission($permission)) {

        $html = <<< HTML
<form action="$link" method="post" style="display: inline-block" id="deleteForm$id">
$csrf
$method_field
<a type="button" onclick="confirmDelete($id)" id="delete" class="btn-table delete btn  btn-xs 88"
   >
<!--<i data-feather="trash-2"></i>-->
<i class="fa fa-trash""></i>
</a>
</form>
HTML;

        return $html;
//        }
    }


    public static function dtShowButton($link, $title, $permission)
    {

//        if (auth()->user()->hasPermission($permission)) {

        $html = <<< HTML
 <a href="$link" class="btn-table"> <i class="fa fa-eye"></i></a>
HTML;

        return $html;
    }
}
