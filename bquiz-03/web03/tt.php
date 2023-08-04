<?php

echo serialize([0]);
echo serialize([2,3]);
echo serialize([4,5,6]);
echo serialize([10,11,12,13]);
echo serialize([1]);
echo serialize([11,12]);
echo serialize([1,2,3,4]);
echo serialize([1,2,13,14]);

// 直接在瀏覽器執行/localhost/tt.php，顯示結果畫面如下：
// a:1:{i:0;i:0;}
// a:2:{i:0;i:2;i:1;i:3;}
// a:3:{i:0;i:4;i:1;i:5;i:2;i:6;}
// a:4:{i:0;i:10;i:1;i:11;i:2;i:12;i:3;i:13;}
// a:1:{i:0;i:1;}a:2:{i:0;i:11;i:1;i:12;}
// a:4:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;}
// a:4:{i:0;i:1;i:1;i:2;i:2;i:13;i:3;i:14;}