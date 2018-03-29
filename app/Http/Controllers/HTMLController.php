<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HTMLController extends Controller
{

  /*
  FTP:
Usuario: expopyme
Contraseña: 3zzyoY8W10
URL del Panel de Control: https://www7.baehost.com:2083/
 */

    public function render(){
      $url = 'https://expopyme.com.ar/mailing/expopyme_2018/';
      $table = '<table>';
      $str = '';
      $views = [];
    $directory = "C:/Users/Sergio/Desktop/DATOLA";
    $images = glob("$directory/*.{jpg,png,bmp}", GLOB_BRACE);
    foreach($images as $image)$views[] = explode('.',basename($image))[0];
    //dd($views);

      foreach ($views as $key => $value) {
        $html = view('expopyme',["name"=>$value,"url"=>$url])->render();
        $val = $url.$value.'.html';
        $table.='<tr><td>'.$value.'</td>'.'<td><a href="'.$val.'" target="_blank">'.$val.'</a></td></tr>';

         File::put($directory . '/'.$value.'.html', $html);
         $str.=$html;
      }
      $table.='</table>';

      // Or
      //$html = view('index')->render();
      return $table . $str;
    }
}
