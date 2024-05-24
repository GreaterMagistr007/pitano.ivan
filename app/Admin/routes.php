<?php

//Route::get('', ['as' => 'admin.dashboard', function () {
//	$content = 'Define your dashboard here.';
//	return AdminSection::view($content, 'Dashboard');
//}]);
//
//Route::get('information', ['as' => 'admin.information', function () {
//	$content = 'Define your information here.';
//	return AdminSection::view($content, 'Information');
//}]);

Route::get('', ['as' => 'admin.dashboard', function () {
    $thisUser = (Auth::user()->is_operator);
    if(isset($thisUser) && $thisUser && $thisUser=='Оператор'){
        return redirect('/admin/orders');
    }
    return redirect('/admin/main_settings');
    $content = "Панель администратора \r\n В левой части страницы Выберите рабочую вкладку";
    return AdminSection::view($content, 'Панель администратора');
}]);
