<?php 

interface Controller {

    public static function index();
    public static function create();
    public static function save();
    public static function store();
    public static function edit($id);
    public static function update($id);
    public static function destroy($id);

}
?>