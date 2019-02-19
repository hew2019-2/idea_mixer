<?php
// サニタイズ
function h($value) {
    return htmlspecialchars($value);
}

// PASS IDハッシュ化
//引数1:ソルト 引数2:ストレッチ 引数3:ハッシュ化する文字列
//戻り値:ハッシュ化後の文字列
function hash_value($salt,$stretch,$str){
    for($i=0;$i<$stretch;$i++){			//ハッシュ化
	$hash = md5($salt.$str);
    }
    return $hash;
}

// 引数は幅、高さ、それぞれの閾値、縮小したい辺(幅ならture, 高さならfalse)
// 戻り値は閾値からの倍率
function AjustByRatioFromThreshold ($width, $height, $width_thr, $height_thr, $switch) {
    // 幅、高さどちらも範囲内の場合、倍率は1
    $img_size_late = 1;
    // 幅、高さどちらかでも範囲外の場合
    if ($width > $width_thr || $height > $height_thr) {
        // 幅だけが大きい
        if ($width / $width_thr >= $height / $height_thr) {
            $img_size_late = $width / $width_thr;
        }
        // 高さだけが大きい
        else {
            $img_size_late = $height / $height_thr;
        }
    }

    // $switchがtrueの場合幅,falseの場合は高さを戻す
    if ($switch) {
        return $width / $img_size_late;
    }
    return $height / $img_size_late;
}


// 引数はファイルパス、拡張子
// 戻り値は元画像のデータ
function ImageCreateFromExt ($imagePath, $ext) {
    if ($ext === 'jpg' || $ext === 'jpeg') {
        return imagecreatefromjpeg($imagePath);
    }
    elseif ($ext === 'gif') {
        return imagecreatefromgif($imagePath);
    }
    elseif ($ext === 'png') {
        return imagecreatefrompng($imagePath);
    }
}

// 画像の書き出し(サムネイル作成)をする関数
// 引数は画像イメージID、付与するファイルパス、拡張子
// 戻り値はなし
function ImageExt ($imageID, $imagePath, $ext) {
    if ($ext === 'jpg' || $ext === 'jpeg') {
        imagejpeg($imageID, $imagePath);
    }
    elseif ($ext === 'gif') {
        imagegif($imageID, $imagePath);
    }
    elseif ($ext === 'png') {
        imagepng($imageID, $imagePath);
    }
}

// サムネイルの作成をする関数
// 引数はアップロードするフォルダパス、ID、拡張子、サムネイル画像のx軸とy軸の最大値
// 戻り値は無し
function CreateThumbnail($folderPath, $id, $extension, $widthMax, $heightMax) {
    $filename = 'img'.$id.'.'.$extension;
    $img_size = getimagesize($folderPath.$filename);    // 画像サイズ取得

    /*--- 新規画像ファイルの幅と高さを設定 ---*/
    $img_out_x = AjustByRatioFromThreshold($img_size[0], $img_size[1], $widthMax, $heightMax, true);      // max:150
    $img_out_y = AjustByRatioFromThreshold($img_size[0], $img_size[1], $widthMax, $heightMax, false);     // max:100

    $img_in = ImageCreateFromExt($folderPath.$filename, $extension);
    $img_out = imagecreatetruecolor($img_out_x, $img_out_y);      // メモリ上に画像を新規作成

    // 新規画像の設定
    imagealphablending($img_out, false);
    imagesavealpha($img_out, true);

    // 元画像を新規画像にコピー
    imagecopyresampled($img_out, $img_in, 0, 0, 0, 0, $img_out_x, $img_out_y, $img_size[0], $img_size[1]);

    // 画像の書き出し(サムネイル作成)
    imageExt($img_out, $folderPath.'thumb_'.$filename, $extension);
}
