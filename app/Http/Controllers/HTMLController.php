<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HTMLController extends Controller
{
    public function render(){
      $url = 'https://expopyme.com.ar/mailing/expopyme_2018/';
      $table = '<table>';
      $str = '';
      $views = [

      'aval_federal',
      'bgs-seguros',
      'buspack',
      'cocom',
      'colppy',
      'fibercorp',
      'gema',
      'hr',
      'iadef',
      'inemo',
      'institucional',
      'meemba',
      'nocrm',
      'promote',
      'rpa',
      'salto',
      'vistage',

      ];


      foreach ($views as $key => $value) {
        $html = view('expopyme',["name"=>$value,"url"=>$url])->render();
        $val = $url.$value.'.html';
        $table.='<tr><td>'.$value.'</td>'.'<td><a href="'.$val.'" target="_blank">'.$val.'</a></td></tr>';

         File::put(storage_path('expopyme') . '/'.$value.'.html', $html);
         $str.=$html;
      }
      $table.='</table>';

      // Or
      //$html = view('index')->render();
      return $table . $str;
    }
}
