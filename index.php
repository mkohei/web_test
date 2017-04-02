<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>web test</title>
</head>

<body>
    <h1>web test</h1>
    <hr>

    <!-- 入力フォーム -->
    <div style="
        width: 660px;
        border-style: solid; 
        border-width: 1px;
        border-color: #000;
        padding: 10px;
        background-color: #EFE">
        <form method="post" action="URI">
            <b>chat</b> </br>
            <table>
                <tr>
                    <td>name</td>
                    <td> : <input type="text" name="name"/></td>
                </tr>
                <tr>
                    <td>content</td>
                    <td> : <input type="text" name="content" size="50"/></td>
                </tr>
            </table>
            <input type="submit" value="send"/>
            <input type="reset" value="reset"/>
        </form>
    </div>


    <!-- layout space -->
    <div style="padding: 10px;"></div>


    <!-- 
        PHP
         * chat の表示
         * table 形式
     -->
    <?php
        require "php/db.php";
        #require "php/util.php";

        // DB から
        $pdo = get_connect();
        // SQL
        $sql = "SELECT name, content, time FROM chat";
        $smt = $pdo->query($sql);
        $data = $smt->fetchAll();

        // テーブル作成
        print '
        <style type="text/css">
        .table1 {
            border-collapse: collapse;
            border-color: #000;
            width: 700px
        }
        
        .table1 th {
            background-color: #cccccc;
        }
        </style>
        ';
        $columns = array ("name", "content", "time");
        print '<table class="table1" border=1><tr>';
        print '<th width="15%">name</th>';
        print '<th width="60%">content</th>';
        print '<th width="25">time</th>';
        /*
        foreach ($columns as $key) {
            print "<th>".$key."</th>";
        }*/
        print "</tr>";
        foreach ($data as $row) {
            print "<tr>";
            foreach ($columns as $key) {
                print "<td>".$row[$key]."</td>";
            }
            print "</tr>";
        }
        print "</table>";
    ?>
</body>

</html>