<title>laravel pdf system </title>

#step-> 1
*package -command 
composer require barryvdh/laravel
step -> 2
*route/web.php 
Route::get ('/downloadpdf', 'DownloadpdfController@downloadpdf');

step -> 3
DownloadpdfController
public function downloadpdf($id){
      $user = User :: find ($id);
      $pdf =PDF :: loadView ('pdf', compact (user));
      return $pdf ->download ("invoice.pdf");
}