<?php
include_once "DB.php";

class Menu extends DB
{
    public $header = '選單管理';
    protected $add_header = '新增主選單';

    public function __construct()
    {
        parent::__construct('menu');
    }

    public function add_form()
    {
        $this->modal("<tr>
                       <td>主選單名稱：</td>
                        <td><input type='text' name='text'></td>
                    </tr>
                    <tr>
                        <td>選單連結網址：</td>
                        <td><input type='text' name='href'></td>
                    </tr> ", "./api/add.php");
    }

    public function list()
    {
        // $this->backend("./view/menu.php");
        $rows = $this->all(['main_id' => 0]);
        foreach ($rows as $idx => $row) {
            $row['subs'] = $this->count(['main_id' => $row['id']]);
            $rows[$idx] = $row;
        }
        $this->view("./view/menu.php", ['rows' => $rows]);
    }
}