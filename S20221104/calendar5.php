<?php
$season = (isset($_GET['m']) ? $_GET['m'] : date("n"));
switch ($season) {
    case '2':
    case '3':
    case '4':
        $bgUrl = './image/123.jpg';
        break;
    case '5':
    case '6':
    case '7':
        $bgUrl = './image/summerbeach.jpg';
        break;
    case '8':
    case '9':
    case '10':
        $bgUrl = './image/autumnmaple.jpg';
        break;
    default:
        $bgUrl = './image/223.jpg';
        break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            font-weight: bolder;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            /* margin: 50px auto; */
            align-items: center;
        }

        .cal {
            display: flex;
            width: 40%;
            flex-wrap: wrap;
            margin: 0 auto;
            /* justify-content:center; */
            text-align: center;

        }

        .cal .date {
            /* border: 1px solid #000; */
            width: calc(100% / 7);
            height: 40px;
            margin-left: -1px;
            margin-top: -1px;
            padding-top: 8px;
            font-size: x-large;
        }

        .cal1 {
            display: flex;
            width: 15%;
            flex-wrap: wrap;
            margin: 0 auto;
            /* justify-content:center; */
            text-align: center;
        }

        .cal1 .date {
            /* border: 1px solid #000; */
            width: calc(100% / 7);
            height: 20px;
            /* margin-left: -1px;
            margin-top: -1px; */
            /* padding-top: 4px; */
            font-size: small;
  
        }
    </style>
</head>

<body background="<?php echo $bgUrl; ?>">
    <?php
    $cal = [];
    $month = isset($_GET['m']) ? $_GET['m'] : date("m");
    $year = isset($_GET['y']) ? $_GET['y'] : date('Y');
    $prevMonth = $month - 1;
    $nextMonth = $month + 1;

    if ($month == 13) {
        $month = 1;
        $nextMonth = $nextMonth - 12;
        $prevMonth = 0;
        $year++;
    }

    if ($month == 0) {
        $month = 12;
        $prevMonth = $prevMonth + 12;
        $nextMonth = 13;
        $year--;
    }

    ?>



    <div style="display:flex;  justify-content:space-around; align-items:center;margin-top:80px">
        <a href="?y=<?= $year; ?>&m=<?= $prevMonth; ?>">上一月</a>
        <h1><?= $year; ?>年</h1>
        <a href="?y=<?= $year; ?>&m=<?= $nextMonth; ?>">下一月</a>
    </div>

    <div class="container">
        <?php
        function createCalendar($cal, $year, $month)
        {
            $firstDay = $year . '-' . $month . '-1';
            $firstDayWeek = date('w', strtotime($firstDay));
            $monthDays = date('t', strtotime($firstDay));
            $weeks = ceil(($monthDays + $firstDayWeek) / 7);

            for ($i = 0; $i < $firstDayWeek; $i++) {
                $cal[] = '';
            }

            for ($i = 0; $i < $monthDays; $i++) {
                $cal[] = date('Y-m-j', strtotime("+$i days", strtotime($firstDay)));
            }


            $weekTitle = ['日', '一', '二', '三', '四', '五', '六'];
            foreach ($weekTitle as $k => $Wtitle) {
                if ($k == 0 || $k == 6) {
                    echo "<div class='date' style='color:red; '>$Wtitle</div>";
                } else {
                    echo "<div class='date'>$Wtitle</div>";
                }
            }
            foreach ($cal as $i => $day) {
                if ($day != '') {
                    $show = explode('-', $day)[2];
                } else {
                    $show = '';
                }
                if ($i % 7 == 0 || $i % 7 == 6) {
                    if ($day == date('Y-m-j', strtotime('now'))) {
                        echo "<div class='date' style='color:blue;background-color:lightblue;border-radius:10px;'>$show</div>";
                    } else {

                        echo "<div class='date' style='color:red;'>$show</div>";
                    }
                } else {
                    if ($day == date('Y-m-j', strtotime('now'))) {
                        echo "<div class='date' style='color:blue;background-color:lightblue;border-radius:10px;'>$show</div>";
                    } else {
                        echo "<div class='date'>$show</div>";
                    }
                }
            }

            for ($j = $i; $j < ($weeks * 7 - 1); $j++) {
                $show = '';
                echo "<div class='date'>$show</div>";
            }
        }

        ?>

        <div class="cal1">
            <h2 style="width:100%"><?= $prevMonth==0?12:$prevMonth; ?>月</h2>
            <?php
            if($prevMonth==0){
                createCalendar($cal, $year-1, 12);
            }else{
                createCalendar($cal, $year, $prevMonth); 
            } 

             ?>
        </div>

        <div class="cal">
            <h1 style="width:100%"><?= $month; ?>月</h1>
            <?php createCalendar($cal, $year, $month);  ?>
        </div>

        <div class="cal1">
            <h2 style="width:100%"><?= $nextMonth==13?1:$nextMonth;?>月</h2>
            <?php 
            if($nextMonth==13){
                createCalendar($cal, $year+1, 1); 
            }else{
                createCalendar($cal, $year, $nextMonth);  
            }
            ?>
        </div>
        

        <!-- <form action="">
        <br><br>
            <textarea name="meno" id="dayMeno" cols="90" rows="10">memo</textarea>
            <br>
            <input type="submit" value="確 認">
        </form> -->

    </div>
</body>

</html>