<!-- 익명 게시판 -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>익명 게시판</title>
  </head>
  <body>
    <h1>ALPA 익명 게시판</h1>

    <?php
    $name = "post";

    try{
      $query = "select * from post where field = 0";
      $db = new PDO("mysql:dbname=$name", "root","root");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $rows = $db->query($query);

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
        <h2>게시판 명</h2>
        <tr>
          <th>글번호</th>
          <th>제목</th>
          <th>게시날짜</th>
          <th>게시시간</th>
          <th>조회수</th>
        </tr>

        <?php
          for($i=0; $i<$size; $i++){
            ?>
            <tr>
              <th><?=$i+1?></th>
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
