<?php
// include "./Controller/Ad.php";
// include "./Controller/Admin.php";
// include "./Controller/Bottom.php";
// include "./Controller/Image.php";
// include "./Controller/Menu.php";
// include "./Controller/Mvim.php";
// include "./Controller/News.php";
// include "./Controller/Title.php";
// include "./Controller/Total.php";

//用PHP函式$_SERVER['DOCUMENT_ROOT']，取出此專案資料夾的絕對路徑根目錄
$BASEDIR=$_SERVER['DOCUMENT_ROOT'];
// echo $BASEDIR;  
//顯示結果應該類似為 E:\112-bquiz\web01

//因為取出來的路徑後面少一個斜線，所以要自己加上去
include_once $BASEDIR."/Controller/Ad.php";
include_once $BASEDIR."/Controller/Admin.php";
include_once $BASEDIR."/Controller/Bottom.php";
include_once $BASEDIR."/Controller/Image.php";
include_once $BASEDIR."/Controller/Menu.php";
include_once $BASEDIR."/Controller/Mvim.php";
include_once $BASEDIR."/Controller/News.php";
include_once $BASEDIR."/Controller/Title.php";
include_once $BASEDIR."/Controller/Total.php";

/**
 * 用來在頁面上顯示格式化的陣列內容
 */
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

/**
 * 簡化header()指令的使用
 */
function to($url)
{
    header("location:" . $url);
}

/**
 * 獨立的sql指令執行，用來處理少數較為複雜的語句，比如聯表查詢或是子查詢的語法
 */
function q($sql)
{
    $pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=db77", 'root', '');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// class Title extends DB{

//     public $header='網站標題管理';

//     public function __construct()
//     {
//         $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
//         // $this->table = $table;
//         $this->table = 'Title';
//         // $this->$header='網站標題管理'  
//     }
// }

// class Ad extends DB{

//     public $header='動態文字管理';

//     public function __construct()
//     {
//         $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
//         // $this->table = $table;
//         $this->table = 'ad';
//         // $this->$header='動態文字管理'  
//     }
// }

// class Total extends DB{

//     public $header='進站人數';

//     public function __construct()
//     {
//         $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
//         // $this->table = $table;
//         $this->table = 'total';
//         // $this->$header='動態文字管理'  
//     }
// }

// class Bottom extends DB{

//     public $header='頁尾版權管理';

//     public function __construct()
//     {
//         $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
//         // $this->table = $table;
//         $this->table = 'bottom';
//         // $this->$header='動態文字管理'  
//     }
// }

//在base.php中先宣告一個資料表的變數出來
//因為base.php會被include到主要的index.php及backend.php中
//所以可以確保每個頁面都能使用到這些變數
//使用首字大寫是為了方便識別這個變數是物件
$Total = new Total;
$Bottom = new Bottom;
$Title = new Title;
$Ad = new Ad;
$Image = new Image;
$Mvim = new Mvim;
$News = new News;
$Admin = new Admin;
$Menu = new Menu;

// $Total = new DB('total');
// $Bottom = new DB('bottom');
// $Title = new DB('title');
// $Ad = new DB('ad');
// $Image = new DB('image');

//測試用
// $total = new DB('total');
// dd($total->find(['id'=>1]));
// echo $total->max('id');
// echo $total->math('min','id');