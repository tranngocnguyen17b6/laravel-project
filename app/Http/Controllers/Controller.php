<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    // public function paging() {
    // $totalPage = ceil($totalRecords / 5);
    //   $pagingHtml = '';
    //   if ($totalPage > 0) {
    //      $pagingHtml .= '<nav aria-label="Page navigation example"><ul class="pagination">';
    //      for ($i = 1; $i <= $totalPage; $i++) // dùng vòng lặp for để hiển thị ra từng trang một   
    //      {
    //         $pageStyle = '';
    //         if ($i == $currentPage) {
    //            $pageStyle = "active";
    //         }
    //         $fullUrl = $url . "/$i/";
    //         if ($params != '') {
    //            $fullUrl .= $params;
    //         }
    //         $pagingHtml .= "<li class='page-item'><a class='page-link " . $pageStyle . "' href='" . $fullUrl . "'>$i</a></li>";
    //      }
    //      $pagingHtml .= '<ul/></nav>';
    //   }
    //   return $pagingHtml;
    // }
}
