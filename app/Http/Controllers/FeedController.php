<?php

namespace App\Http\Controllers;

use App\MainSettings;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    //Файл фида будет располагаться в директории public_html и будет доступен по прямому адресу.
    // Расширение будет в зависимости от метода формирования
    const FILE_NAME = 'feed';

    const SHORT_SHOP_NAME = 'Pizza Pitano';
    const COMPANY_NAME = 'ООО «ТРИА ПЛЮС»';

    private $productModels = [];
    private $productCategoryTitles = [];
    private $path = '';
    public $filename = '';
    public $file = null;

    public function index()
    {
        $this->productModels = MainSettingsController::get_products_modules([]);
        $this->productCategoryTitles = MainSettings::$models;
        $this->path = base_path() . '/public_html';


        return response($this->generateYML(), 200)
            ->header('Content-Type', 'text/xml')
            ->header('charset', 'utf-8')
            ;
    }

    public static function regenerateYMLFeed()
    {
        $item = new self();
        $item->index();

        return $item->filename;
    }

    public static function getYMLfileHref()
    {
        $item = new self();
        return $item->getFile('yml');
    }

    private function getFile($extension = 'yml')
    {
        return $this->path . '/' . self::FILE_NAME . '.' . $extension;
    }

    public function generateYML()
    {
        $extension = 'yml';
        $this->filename = $this->getFile($extension);

        $text = [];

        $text[] = '<?xml version="1.0" encoding="UTF-8"?>';
        $text[] = ('<yml_catalog date="' . date('Y-m-d H:i') . '">');
        $text[] = ('<shop>');
        // Короткое название магазина, должно содержать не более 20 символов
        $text[] = ('<name>' . self::SHORT_SHOP_NAME . '</name>');
        // Полное наименование компании, владеющей магазином
        $text[] = ('<company>' . self::COMPANY_NAME . '</company>');
        // URL главной страницы магазина
        $text[] = ('<url>https://pitano.ru/</url>');
        // Список курсов валют магазина
        $text[] = ('<currencies>');
        $text[] = ('<currency id="RUR" rate="1"/>');
        $text[] = ('</currencies>');
        // Категории:
        $text[] = ('<categories>');
        $categoryId = 1;
        foreach ($this->productCategoryTitles as $key => $category) {
            $text[] = '<category id="' . $categoryId . '">' . $category['title'] . '</category>';
            $categoryId++;
        }
        $text[] = ('</categories>');

        // Тут пропущен блок "delivery-options"

        // Товары:
        $text[] = '<offers>';
        $categoryId = 1;
        foreach ($this->productCategoryTitles as $key => $category) {
            if (!isset($this->productModels[$key])) {
                continue;
            }
            foreach ($this->productModels[$key] as $product) {
                $text[] = '<offer id="' . $categoryId . $product->id . '">';
                $text[] = '<name>' . $product->title . '</name>';
                $text[] = '<url>https://delivery.pitano.ru/?product=' . $this->removeExtraCharacters($product->product_id) . '#' . $key . '</url>';
                $text[] = '<price>' . $product->price . '</price>';
                $text[] = '<currencyId>RUR</currencyId>';
                $text[] = '<categoryId>' . $categoryId . '</categoryId>';
                $text[] = '<picture>https://delivery.pitano.ru/' . $product->image . '</picture>';
                $text[] = '<delivery>true</delivery>';
                $text[] = '<pickup>true</pickup>';
                $text[] = '<store>true</store>';
                $text[] = '<description><![CDATA[' . $this->removeExtraCharacters($product->text) . ']]></description>';
                $text[] = '</offer>';
            }
            $categoryId++;
        }
        $text[] = '</offers>';
        $text[] = '</shop>';
        $text[] = '</yml_catalog>';


        //Открываем файл для записи
        $this->file = fopen($this->filename, 'w+') or die('Не удалось создать файл YML фида');
        // Пишем массив строк в файл
        $this->writeArrayToFile($text);
        //Закрываем файл
        fclose($this->file);

        return file_get_contents($this->filename);
    }

    /**
     * //Удаляет недопустимые символы из строки
     * @param $text
     * @return mixed|string
     */
    private function removeExtraCharacters($text = '')
    {
        $extraCharacters = [':', '_'];

        $text = str_replace($extraCharacters, '', $text);


        return $text;
    }

    private function writeStrToFile($str = '')
    {
        if (!$this->file) {
            die('Файл фида не открыт для записи');
        }
        $endStr = "\r\n";

        fwrite($this->file, $str . $endStr);
    }

    private function writeArrayToFile($arrOfStrings = [])
    {
        if (!$this->file) {
            die('Файл фида не открыт для записи');
        }

        foreach ($arrOfStrings as $string) {
            $this->writeStrToFile($string);
        }
    }


}
