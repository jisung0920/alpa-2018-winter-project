<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Community</title>
    <link rel="stylesheet" href="alpacommunity.css">
  </head>
  <body>
    <h1>ALPA</h1>

    <?php
    $name = "post";

    try{
      // $query = "select * from post";
      // $db = new PDO("mysql:dbname=$name", "root","root");
      // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // $rows = $db->query($query);

      global $size, $post_num, $post_writer, $post_title, $post_date, $post_time, $post_hits;
      $size=0;
      foreach ($rows as $row) {
        $size ++;
        $post_num[] = $row['num'];
        $post_writer[] = $row['writer'];
        $post_title[] = $row['title'];
        $post_date[] = $row['date'];
        $post_time[] = $row['time'];
        $post_hits[] = $row['hits'];
      }

    }catch(PDOException $ex){
      echo "detail :".$ex->getMessage();
    }

    ?>

    <div class="community">
      <table>
        <h2>posts</h2>
        <tr>
          <th class="num">글번호</th>
          <th class="writer">작성자</th>
          <th class="title">제목</th>
          <th class="when">게시날짜</th>
          <th class="when">게시시간</th>
          <th class="num">조회수</th>
        </tr>

        <?php
          for($i=0; $i<$size; $i++){
            ?>
            <tr>
              <th><?=$post_num[$i]?></th>
              <th><?=$post_writer[$i]?></th>
              <th><?=$post_title[$i]?></th>
              <th><?=$post_date[$i]?></th>
              <th><?=$post_time[$i]?></th>
              <th><?=$post_hits[$i]?></th>
            </tr>
            <?php
          }
        ?>
      </table>
    </div>


  </body>
</html>
