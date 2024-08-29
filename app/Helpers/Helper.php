<?php


namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';

        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <tr>
                        <td>' . $menu->id . '</td>
                        <td>' . $char . $menu->name . '</td>
                        <td>' . self::active($menu->active) . '</td>
                        <td>' . $menu->updated_at . '</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/menus/edit/' . $menu->id . '">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow(' . $menu->id . ', \'/admin/menus/destroy\')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                ';

                unset($menus[$key]);

                $html .= self::menu($menus, $menu->id, $char . '|--');
            }
        }

        return $html;
    }

    public static function active($active = 0): string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>'
            : '<span class="btn btn-success btn-xs">YES</span>';
    }
    public static function status($status = 0): string
    {
        return $status == 0 ? '<span class="btn btn-danger btn-xs">Đang giao hàng</span>'
            : '<span class="btn btn-success btn-xs">Giao hàng thành công</span>';
    }

    public static function menus($menus, $parent_id = 0): string
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <li>
                        <a href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">
                            ' . $menu->name . '
                        </a>';

                unset($menus[$key]);

                if (self::isChild($menus, $menu->id)) {
                    $html .= '<ul class="sub-menu">';
                    $html .= self::menus($menus, $menu->id);
                    $html .= '</ul>';
                }

                $html .= '</li>';
            }
        }

        return $html;
    }

    public static function isChild($menus, $id): bool
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }

        return false;
    }


    public static function pro($price, $price_sale)
    {
        if (isset($price) && isset($price_sale)) {
            $pro = round((($price - $price_sale) / $price) * 100);
            return '<div class="new-product-percent">' . $pro . '%' . '</div>';
        }
        return null;
    }

    public static function price($price, $price_sale)
    {
        if ($price > 0 && $price_sale > 0) {
            return number_format($price) . 'đ'; //2
        }
        if ($price > 0 && $price_sale == 0) { //1
            return null;
        }
        if ($price == 0 && $price_sale == 0) { //3
            return null;
        }
    }
    public static function price_sale($price, $price_sale)
    {
        if ($price_sale > 0) {
            return number_format($price_sale) . 'đ'; //2
        }
        if ($price > 0 && $price_sale == 0) {
            return number_format($price) . 'đ'; //1
        }
        if ($price == 0 && $price_sale == 0) { //3
            return '<a href="/lien-he.html" style = "font-family: Roboto , sans-serif; color :#ed0000;margin: 0px 0px 30px 0px">ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤLiên hệ</a>';
        }
    }

    public static function price_sale1($price, $price_sale)
    {
        if ($price_sale > 0) {
            return number_format($price_sale) . 'đ'; //2
        }
        if ($price > 0 && $price_sale == 0) {
            return number_format($price) . 'đ'; //1
        }
        if ($price == 0 && $price_sale == 0) { //3
            return '<div href="/lien-he.html" style = "font-family: Roboto , sans-serif; color :#ed0000;margin: 0px 0px 30px 0px">Liên hệ</div>';
        }
    }

    public static function price2($price, $price_sale)
    {
        if ($price > 0 && $price_sale > 0) {
            return 'Giá Cũ: ' . number_format($price) . 'đ'; //2
        }
        if ($price > 0 && $price_sale == 0) { //1
            return null;
        }
        if ($price == 0 && $price_sale == 0) { //3
            return null;
        }
    }
    public static function price_sale2($price, $price_sale)
    {
        if ($price_sale > 0) {
            return 'Giá KM: ' . number_format($price_sale) . 'đ'; //2
        }
        if ($price > 0 && $price_sale == 0) {
            return 'Giá: ' . number_format($price) . 'đ'; //1
        }
        if ($price == 0 && $price_sale == 0) { //3
            return '<a href="/lien-he.html" style = "font-family: Roboto , sans-serif; color :#ed0000;margin: 0px 0px 30px 0px">Liên hệ</a>';
        }
    }

    public static function price0($price = 0, $priceSale = 0)
    {
        if ($priceSale != 0) return number_format($priceSale);
        if ($price != 0) return number_format($price);
        return '<a href ="lien-he.html">Liên Hệ</a>';
    }
}
