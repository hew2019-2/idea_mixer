<!DOCTYPE html>
<html lang="ja">
  <head>
  	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TOP</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet" type="text/css">
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="./index.php">Idea Mixer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">新規登録</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">設定</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Features -->
      <div class="row text-center">

        <?php foreach($ideas as list('id'=>$id,'user_id'=>$user_id,'word1'=>$word1,'word2'=>$word2)){ ?>
                <div class="col-4 col-sm-4 col-md-4 col-lg-3 col-xl-3 mb-1">
                  <div class="card">
                    <div class="card-body">
                      <p class=""><?php echo $word1; ?></p>
                      <p class="">✕</p>
                      <p class=""><?php echo $word2; ?></p>
                    </div>
                    <div class="card-footer">
                      <a href="./contribution/contribution_view.php?idea_id='.<?php echo $id; ?>'". class="btn">Join!</a>
                    </div>
                  </div>
                </div>
        <?php } ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-bottom">
      <div class="container">
        <div class="col-3">
          <a class="nav-link" href="./index.php">ホーム</a>
        </div>
        <div class="col-3">
          <a class="nav-link" href="#">検索</a>
        </div>
        <div class="col-3">
          <a class="nav-link" href="#">マイページ</a>
        </div>
        <div class="col-3">
          <a class="nav-link" href="#">グループ</a>
        </div>
      </div>
    </nav>

    <!-- Bootstrap core JavaScript -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

  </body>
</html>
