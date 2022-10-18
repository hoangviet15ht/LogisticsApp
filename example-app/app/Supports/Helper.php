<?php

namespace App\Supports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Nette\Utils\RegexpException;
use Yajra\Datatables\Datatables;

class Helper
{
    /**
     * get app domain from request
     *
     * @param Request $request
     * @return string|null
     */
    public static function getAppDomainFromRequest(Request $request) : string|null
    {
        $uriPath = $request->path();
        $uriPath = Str::of($uriPath)->trim('/');
        $uriPath->append('/');
        $uriPregMatched = [];
        if (preg_match("/^(customer|transporter|admin|manager)\//", $uriPath, $uriPregMatched)) {
            $prefix = end($uriPregMatched);
            return $prefix;
        }

        throw new RegexpException('Cannot get app domain from the request');
    }

    /**
     * Can check access domain
     *
     * @param string $domain
     * @return bool
     */
    public static function canAccessDomain($domain)
    {
        $currentUser = Auth::user();

        switch ($domain) {
            case DOMAIN_ADMIN:
                return $currentUser->has_admin_permissions;
            case DOMAIN_CUSTOMER:
                return $currentUser->is_customer;
            case DOMAIN_TRANSPORTER:
                return $currentUser->is_transporter;
            case DOMAIN_MANAGER:
                return $currentUser->is_manager;
            default:
                return false;
        }
    }

    // public static function replaceLineFeed($text, $splitter = ',')
    // {
    //     $text = str_replace("\r\n", "\n", $text);
    //     $text = str_replace("\r", "\n", $text);
    //     $text = str_replace("\n", $splitter, $text);

    //     return $text;
    // }

    // format currency
    // public static function formatCurrency(
    //     $money,
    //     $decimals = 0,
    //     $decimal_separator = '.',
    //     $thousands_separator = ',',
    //     $unit = '円'
    // ) {
    //     return number_format($money, $decimals, $decimal_separator, $thousands_separator).$unit;
    // }

    // format date
    // public static function formatDate($date, $format = 'Y-m-d')
    // {
    //     if (empty($date)) {
    //         return '';
    //     }

    //     return date($format, strtotime($date));
    // }

    // // format hour
    // public static function generateHourRange($hour)
    // {
    //     $hour = strlen($hour) == 2 ? $hour : '0'.$hour;

    //     return $hour.':00 - '.$hour.':59';
    // }

    // initial datatable
    // public static function generateDatable($records)
    // {
    //     return DataTables::paginate($records)
    //         ->editColumn('ctr', function ($record) {
    //             return \AppHelper::formatCurrency($record->ctr, 2, '.', ',', '%');
    //         })
    //         ->editColumn('cvr', function ($record) {
    //             return \AppHelper::formatCurrency($record->cvr, 2, '.', ',', '%');
    //         })
    //         ->editColumn('retail', function ($record) {
    //             return \AppHelper::formatCurrency($record->retail, 2);
    //         })
    //         ->editColumn('sales', function ($record) {
    //             return \AppHelper::formatCurrency($record->sales, 2);
    //         })
    //         ->editColumn('cost', function ($record) {
    //             return \AppHelper::formatCurrency($record->cost, 2);
    //         })
    //         ->editColumn('cpa', function ($record) {
    //             return \AppHelper::formatCurrency($record->cpa, 2);
    //         })
    //         ->rawColumns(['ctr', 'cvr', 'retail', 'sales', 'cost', 'cpa']);
    // }
}
